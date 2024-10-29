<?php
require_once 'CheckLoginController.php';
require_once 'model/Admin.php';
require_once 'model/Usuario.php';

class AdminController Extends CheckLoginController {

    public $view;
    public $page_title;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "";
        $this->page_title = "";
    }

    public function viewProfile() {
        $this->view = "profileAdmin";
        $this->page_title = "Admin Profile";

        $this->model = new Usuario();
        $userData = $this->model->getUserDataByEmail($_COOKIE["email_usuario"]);
        return $userData;
    }

    public function viewListaUsuarios() {
        $this->view = "listaUsuarios";
        $this->page_title = "Lista de Usuarios";

        $this->model = new Usuario();
        $usuarios = $this->model->getAllUsuarios();

        return $usuarios;
    }

    public function editUsuarios() {
        $this->view = "editUsuarios";
        $this->page_title = "Editar Usuario";
        $this->model = new Usuario();

        if (isset($_GET['id'])) {
            $usuario = $this->model->getUserDetailsById($_GET['id']);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fotoPerfil = $this->fileUpload();
                if (!$fotoPerfil) {
                    $fotoPerfil = $usuario['foto_perfil']; // Si no se ha cargado una nueva, mantiene la actual
                }

                $userData = [
                    'nombre' => $_POST['nombre'],
                    'apellidos' => $_POST['apellidos'],
                    'puesto' => $_POST['puesto'],
                    'email_contacto' => $_POST['email-contacto'],
                    'foto_perfil' => $fotoPerfil
                ];

                $this->model->updateUserDataById($_GET['id'], $userData); // Actualizar usando ID
                header("Location: index.php?controller=admin&action=viewProfile");
                exit();
            }

            return $usuario;
        } else {
            echo "Error: ID not provided.";
            exit();
        }
    }

    private function fileUpload() {
        if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['foto_perfil']['tmp_name'];
            $fileName = $_FILES['foto_perfil']['name'];
            $uploadFileDir = './uploads/';
            $destPath = $uploadFileDir . $fileName;

            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                return $destPath;
            }
        }
        return null;
    }
}