<?php
require_once 'CheckLoginController.php';
require_once 'model/Chat.php';
require_once 'model/Usuario.php';

class AyudaController extends CheckLoginController {
    public $view;
    public $page_title;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "";
        $this->page_title = "";
        $this->model = new Chat();
    }

    public function viewAyuda() {
        $this->view = "ayuda";
        $this->page_title = "Ayuda";

        // Obtener los mensajes desde el modelo
        $mensajes = $this->model->getMessages();

        // Obtener detalles del usuario para cada mensaje
        $usuarioModel = new Usuario();
        foreach ($mensajes as &$mensaje) {
            $userDetails = $usuarioModel->getUserDetailsById($mensaje['user']);
            $mensaje['user_details'] = $userDetails;
        }

        // Obtener el correo electrónico del usuario desde la cookie
        $userEmail = isset($_COOKIE['email_usuario']) ? $_COOKIE['email_usuario'] : null;

        // Obtener el ID del usuario a partir del correo electrónico
        $userId = null;
        if ($userEmail) {
            $userId = $usuarioModel->getUserIdByEmail($userEmail);
        }

        // Estructura los datos a retornar a la vista, incluyendo el ID del usuario
        $dataToView = [
            'mensajes' => $mensajes,
            'user_id' => $userId
        ];

        // Pasar los datos a la vista
        return $dataToView;
    }

    public function getMessagesAjax() {
        // Obtener los mensajes desde el modelo
        $mensajes = $this->model->getMessages();

        // Obtener detalles del usuario para cada mensaje
        $usuarioModel = new Usuario();
        foreach ($mensajes as &$mensaje) {
            $userDetails = $usuarioModel->getUserDetailsById($mensaje['user']);
            $mensaje['user_details'] = $userDetails;
        }

        // Obtener el correo electrónico del usuario desde la cookie
        $userEmail = isset($_COOKIE['email_usuario']) ? $_COOKIE['email_usuario'] : null;

        // Obtener el ID del usuario a partir del correo electrónico
        $userId = null;
        if ($userEmail) {
            $userId = $usuarioModel->getUserIdByEmail($userEmail);
        }

        // Estructura los datos a retornar en formato JSON
        $dataToReturn = [
            'mensajes' => $mensajes,
            'user_id' => $userId
        ];

        // Devolver los datos en formato JSON
        echo json_encode($dataToReturn);
        exit;
    }

    public function insertMessage() {
        // Verificar si se ha enviado una solicitud POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el mensaje y el usuario desde la solicitud POST
            $message = isset($_POST['message']) ? $_POST['message'] : '';
            $userEmail = isset($_COOKIE['email_usuario']) ? $_COOKIE['email_usuario'] : null;

            // Verificar que el mensaje y el correo electrónico del usuario no estén vacíos
            if (!empty($message) && !empty($userEmail)) {
                // Obtener el ID del usuario a partir del correo electrónico
                $usuarioModel = new Usuario();
                $userId = $usuarioModel->getUserIdByEmail($userEmail);

                // Insertar el mensaje en la base de datos
                $this->model->insertMessage($userId, $message);
            }
        }

        // Redirigir a la vista de ayuda después de insertar el mensaje
        header('Location: index.php?controller=ayuda&action=viewAyuda');
        exit();
    }





}