<?php
require_once 'CheckLoginController.php';
require_once 'model/Admin.php';
require_once 'model/Usuario.php';

class AdminController Extends CheckLoginController {

    public $view;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "";
    }

    public function viewProfile() {
        $this->view = "profileAdmin";
        $this->page_title = "Admin Profile";

        $this->model = new Usuario();
        $userData = $this->model->getUserDataByEmail($_COOKIE["email_usuario"]);
        return $userData;
    }
}