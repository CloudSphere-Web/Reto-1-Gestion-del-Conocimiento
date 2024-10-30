<?php
require_once "model/Pregunta.php";
require_once "model/Respuesta.php";
require_once "model/Usuario.php";
require_once "model/Categoria.php";
require_once 'CheckLoginController.php';

class PreguntasController extends CheckLoginController {
    public $view;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "list";
        $this->model = new Pregunta();
    }

    public function list()
    {
        return $this->model->getPregunta();
    }

    public function list_paginated()
    {
        $this->view = 'list_paginated';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        return $this->model->getPreguntasPaginated($page);
    }

    public function getPreguntaDetails($id)
    {
        return $this->model->getPreguntaWithUserDetails($id);
    }

    public function getRespuestas($preguntaId)
    {
        $respuestasModel = new Respuesta();
        return $respuestasModel->getRespuestasByPreguntaId($preguntaId);
    }

    public function details()
    {
        $this->view = 'details';
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $pregunta = $this->getPreguntaDetails($id);
        $respuestas = $this->getRespuestas($id);
        return ['pregunta' => $pregunta, 'respuestas' => $respuestas];
    }

    public function search()
    {
        $this->view = 'search';
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        return $this->model->searchPreguntas($keyword);
    }

//    public function create() {
//        $this->view = 'publicar';
//        return;
//    }

    public function loadForm() {
        $this->view = 'publicar';

        $categoriaObj = new Categoria();
        $categorias = $categoriaObj->getCategoria();

        $dataToView = ['categorias' => $categorias, 'response' => false];

        return $dataToView;
    }

    public function save() {
        $dataToView = $this->loadForm(); // Cargar categorías en caso de fallo
        $filePath = null;

        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['archivo']['tmp_name'];
            $fileName = $_FILES['archivo']['name'];
            $uploadFileDir = './uploads/';
            $destPath = $uploadFileDir . $fileName;

            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $filePath = $destPath;
            } else {
                return $dataToView;
            }
        }

        if (!isset($_POST['titulo'], $_POST['descripcion'], $_POST['categoria_id'])) {
            return $dataToView;
        }

        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha_publicacion = date('Y-m-d');
        $hora_publicacion = date('H:i:s');
        $categoria_id = $_POST['categoria_id'];
        $archivo = $filePath;

        $email = $_COOKIE["email_usuario"];
        $usuarioModel = new Usuario();
        $usuario_id = $usuarioModel->getUserIdByEmail($email);

        $param = [
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'fecha_publicacion' => $fecha_publicacion,
            'hora_publicacion' => $hora_publicacion,
            'usuario_id' => $usuario_id,
            'categoria_id' => $categoria_id,
            'archivo' => $archivo
        ];

        try {
            $id = $this->model->save($param);  // Save question and get ID
            header("Location: index.php?controller=preguntas&action=details&id=" . $id);
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listByCategory() {
        $this->view = 'list_by_category_paginated';
        $nombreCategoria = isset($_GET['category']) ? $_GET['category'] : '';

        if (empty($nombreCategoria)) {
            return ['error' => 'Categoría inválida'];
        }

        $preguntas = $this->model->getPreguntasByCategoriaNombre($nombreCategoria);

        $categoriaModel = new Categoria();
        $categoria = $categoriaModel->getCategoriaByNombre($nombreCategoria);

        return ['preguntas' => $preguntas, 'categoria' => $categoria];
    }

    public function responder() {
        $this->view = 'responder';
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $pregunta = $this->getPreguntaDetails($id);
        return ['pregunta' => $pregunta];
    }

    public function saveRespuesta() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id == 0) {
            echo "Error: pregunta_id no válido.";
            return;
        }

        $dataToView = ['error' => false];
        $filePath = null;

        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['archivo']['tmp_name'];
            $fileName = $_FILES['archivo']['name'];
            $uploadFileDir = './uploads/';
            $destPath = $uploadFileDir . $fileName;

            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                print_r($destPath);
                $filePath = $destPath;
                print_r($filePath);
                die();
            } else {
                $dataToView['error'] = 'Error al subir el archivo';
                return $dataToView;
            }
        }

        if (!isset($_POST['contenido'])) {
            $dataToView['error'] = 'El contenido es requerido';
            return $dataToView;
        }

        $contenido = $_POST['contenido'];
        $fecha_publicacion = date('Y-m-d');
        $hora_publicacion = date('H:i:s');
        $pregunta_id = $id;
        $archivo = $filePath;

        $email = $_COOKIE["email_usuario"];
        $usuarioModel = new Usuario();
        $usuario_id = $usuarioModel->getUserIdByEmail($email);

        $param = [
            'contenido' => $contenido,
            'fecha_publicacion' => $fecha_publicacion,
            'hora_publicacion' => $hora_publicacion,
            'usuario_id' => $usuario_id,
            'pregunta_id' => $pregunta_id,
            'archivo' => $archivo
        ];

        try {
            $respuestaModel = new Respuesta();
            $respuestaModel->save($param);

            // Crear la notificación para el autor de la pregunta
            $pregunta = $this->getPreguntaDetails($pregunta_id);
            $autorPreguntaId = $pregunta['usuario_id']; // ID del autor de la pregunta

            if ($autorPreguntaId != $usuario_id) { // No notificar al mismo usuario
                $notificacionModel = new Notificacion();
                $mensaje = "Tu pregunta ha recibido una nueva respuesta de ";

                // Aquí pasamos los IDs correctos
                $notificacionModel->createNotification($usuario_id, $autorPreguntaId, 'respuesta', $mensaje);
            }

            header("Location: index.php?controller=preguntas&action=details&id=" . $id);
            exit();
        } catch (PDOException $e) {
            $dataToView['error'] = "Error al guardar la respuesta: " . $e->getMessage();
            print_r($dataToView['error']);
            die();
            return $dataToView;
        }
    }

    public function questionFavoriteActions() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id == 0) {
            echo "Error: pregunta_id no válido.";
            return;
        }

        $pregunta = $this->getPreguntaDetails($id);
        $usuarioModel = new Usuario();
        $email = $_COOKIE["email_usuario"];
        $usuario_id = $usuarioModel->getUserIdByEmail($email);

        $param = [
            'usuario_id' => $usuario_id,
            'pregunta_id' => $id
        ];

        $this->model->toggleQuestionFavorite($param);
        header("Location: index.php?controller=preguntas&action=details&id=" . $id);
        exit();
    }

    public function questionLikeActions() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id == 0) {
            echo "Error: pregunta_id no válido.";
            return;
        }

        $pregunta = $this->getPreguntaDetails($id);
        $usuarioModel = new Usuario();
        $email = $_COOKIE["email_usuario"];
        $usuario_id = $usuarioModel->getUserIdByEmail($email);

        $param = [
            'usuario_id' => $usuario_id,
            'pregunta_id' => $id
        ];

        $this->model->toggleQuestionLike($param);

        // Crear notificación para el autor de la pregunta
        $autorPreguntaId = $pregunta['usuario_id']; // Obtén el ID del autor de la pregunta
        if ($autorPreguntaId != $usuario_id) { // No notificar al mismo usuario
            $notificacionModel = new Notificacion();
            $mensaje = "Tu pregunta ha recibido un nuevo like de ";
            $notificacionModel->createNotification($usuario_id,$autorPreguntaId, 'like', $mensaje);
        }

        header("Location: index.php?controller=preguntas&action=details&id=" . $id);
        exit();
    }

    public function answerFavoriteActions() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $pregunta_id = isset($_GET['pregunta_id']) ? $_GET['pregunta_id'] : 0;
        if ($id == 0 || $pregunta_id == 0) {
            echo "Error: respuesta_id o pregunta_id no válido.";
            return;
        }

        $usuarioModel = new Usuario();
        $email = $_COOKIE["email_usuario"];
        $usuario_id = $usuarioModel->getUserIdByEmail($email);

        $param = [
            'usuario_id' => $usuario_id,
            'respuesta_id' => $id
        ];

        $this->model->toggleAnswerFavorite($param);
        header("Location: index.php?controller=preguntas&action=details&id=" . $pregunta_id);
        exit();
    }

    public function answerLikeActions() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $pregunta_id = isset($_GET['pregunta_id']) ? $_GET['pregunta_id'] : 0;
        if ($id == 0 || $pregunta_id == 0) {
            echo "Error: respuesta_id o pregunta_id no válido.";
            return;
        }

        $usuarioModel = new Usuario();
        $email = $_COOKIE["email_usuario"];
        $usuario_id = $usuarioModel->getUserIdByEmail($email);

        $param = [
            'usuario_id' => $usuario_id,
            'respuesta_id' => $id
        ];

        $this->model->toggleAnswerLike($param);
        header("Location: index.php?controller=preguntas&action=details&id=" . $pregunta_id);
        exit();
    }

//    public function loadFormRespuesta() {
//        $this->view = 'responder';
//        $preguntaId = isset($_GET['id']) ? $_GET['id'] : 0;
//
//        $categoriaObj = new Categoria();
//        $categorias = $categoriaObj->getCategoria();
//
//        return ['preguntaId' => $preguntaId, 'categorias' => $categorias];
//    }


//    public function create() {
//        $this->view = 'publicar';
//        $filePath = null;
//
//        // Fetch categories
//        $categoriaObj = new Categoria();
//        $categorias = $categoriaObj->getCategoria();
//
//        // Inicializa dataToView
//        $dataToView = ['categorias' => $categorias, 'response' => false];
//
//        // Handle file upload
//        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
//            $fileTmpPath = $_FILES['archivo']['tmp_name'];
//            $fileName = $_FILES['archivo']['name'];
//            $uploadFileDir = './uploads/';
//            $destPath = $uploadFileDir . $fileName;
//
//            if (!is_dir($uploadFileDir)) {
//                mkdir($uploadFileDir, 0777, true);
//            }
//
//            if (move_uploaded_file($fileTmpPath, $destPath)) {
//                $filePath = $destPath;
//            } else {
//                return $dataToView; // Return with failure if upload fails
//            }
//        }
//
//        // Validate form data
//        if (!isset($_POST['titulo'], $_POST['descripcion'], $_POST['categoria_id'])) {
//            return $dataToView; // Return with failure if validation fails
//        }
//
//        // Get form data
//        $titulo = $_POST['titulo'];
//        $descripcion = $_POST['descripcion'];
//        $fecha_publicacion = date('Y-m-d');
//        $hora_publicacion = date('H:i:s');
//        $categoria_id = $_POST['categoria_id'];
//        $archivo_id = $filePath;
//
//        // Get user ID by email
//        $email = $_COOKIE["email_usuario"];
//        $usuarioModel = new Usuario();
//        $usuario_id = $usuarioModel->getUserIdByEmail($email);
//
//        // Prepare parameters
//        $param = [
//            'titulo' => $titulo,
//            'descripcion' => $descripcion,
//            'fecha_publicacion' => $fecha_publicacion,
//            'hora_publicacion' => $hora_publicacion,
//            'usuario_id' => $usuario_id,
//            'categoria_id' => $categoria_id,
//            'archivo_id' => $archivo_id
//        ];
//
//        // Call the model to save the data
//        try {
//            $id = $this->model->save($param);  // Guardar pregunta y obtener el ID
//            $dataToView['response'] = true;
//            $result = $this->model->getPreguntaWithUserDetails($id);  // Obtener detalles de la pregunta guardada
//
//            // Redirigir a la página de la pregunta recién publicada
//            header("Location: index.php?controller=preguntas&action=details&id=" . $id);
//            exit();
//        } catch (PDOException $e) {
//            echo "Error: " . $e->getMessage();
//        }
//
//
//        return $dataToView;
//    }



//    public function details() {
//        $this->view = 'details';
//        $id = isset($_GET['id']) ? $_GET['id'] : 0;
//        $pregunta = $this->getPreguntaDetails($id);
////        $respuestas = $this->getRespuestas($id);
//        return ['pregunta' => $pregunta];
//    }
}
?>