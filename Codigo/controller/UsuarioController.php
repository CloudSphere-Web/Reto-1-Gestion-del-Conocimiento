<?php
require_once "model/Usuario.php";
require_once "model/Pregunta.php";
require_once "model/Respuesta.php";
require_once 'CheckLoginController.php';

class UsuarioController extends CheckLoginController {
    public $page_title;
    public $view;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "";
        $this->page_title = "";
        $this->model = new Usuario();
    }

    public function login(){
        $this->view = "login";
        $this->page_title = "Acceso a la p&aacute;gina";
        $this->model->getUserIntoArray($_POST);
        if ($this->model->getUserIntoArray($_POST)){
            header("Location:index.php?controller=preguntas&action=list_paginated");
            exit();
        }
    }

    public function logout() {
        // Unset the cookie by setting its expiration time to the past
        setcookie("email_usuario", "", time() - 3600, "/");
        setcookie("puesto_usuario", "", time() - 3600, "/");

        // Redirect to the login page
        header('Location: index.php?controller=usuario&action=login');
        exit();
    }

    public function viewProfile() {
        $this->view = "profileUsuario";
        $this->page_title = "Profile";
        $userData = $this->model->getUserDataByEmail($_COOKIE["email_usuario"]);
        return $userData;
    }

    public function viewPreguntasUsuario() {
        $this->view = "preguntasUsuario";
        $this->page_title = "Preguntas";

        $email = $_COOKIE["email_usuario"];
        $userId = $this->model->getUserIdByEmail($email);
//        print_r($email);
//        print_r($userId);

        if ($userId) {
            $preguntasModel = new Pregunta();
            $preguntas = $preguntasModel->getPreguntasByUserId($userId);
//            print_r($preguntas);
        } else {
            $preguntas = [];
        }

        return $preguntas;
    }

    public function viewRespuestasUsuario() {
        $this->view = "respuestasUsuario";
        $this->page_title = "Respuestas";

        $email = $_COOKIE["email_usuario"];
        $userId = $this->model->getUserIdByEmail($email);

        if ($userId) {
            $respuestasModel = new Respuesta();
            $respuestas = $respuestasModel->getRespuestasByUserId($userId);
        } else {
            $respuestas = [];
        }

        return $respuestas;
    }

//    public function login() {
//        $this -> page_title = 'Login';
//        $this -> view = 'login';
//        if (!isset($_SESSION['is_logged_in']) ||!$_SESSION['is_logged_in']) {
//            $row = $this -> model -> login($_POST);
//
//            if ($row) {
//                $_SESSION['is_logged_in'] = true;
//                $_SESSION['user_data'] = array(
//                    "id" => $row['id'],
//                    "email" => $row['email'],
//                    "nombre" => $row['nombre'],
//                    "apellidos" => $row['apellidos'],
//                    "puesto" => $row['puesto'],
//                    "email_contacto" => $row['email_contacto'],
//                    "puntaje" => $row['puntaje'],
//                    "foto_perfil" => $row['foto_perfil']
//                );
//                header('Location: index.php?controller=preguntas&action=list_paginated');
//            } else {
//                $_SESSION['is_logged_in'] = false;
//                return;
//            }
//        } header('Location: index.php');
//    }
//
//    public function register() {
//        $this -> view = 'register';
//        $this -> page_title = 'Registro de usuario';
//        $id = $this -> model -> register();
//        if ($id > 0) {
//            header('Location: index.php?controller=usuario&action=login');
//        }
//    }
//
//    public function logout() {
//        unset($_SESSION['is_logged_in']);
//        unset($_SESSION['user_data']);
//        session_destroy();
//        header('Location: index.php');
//    }

}
?>
