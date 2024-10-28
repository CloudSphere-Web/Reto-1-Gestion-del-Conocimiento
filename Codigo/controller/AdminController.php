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
        $usuario = $this->model->getUserDetailsById($_GET['id']);

        return $usuario;
    }
}