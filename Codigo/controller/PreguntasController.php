<?php
require_once "model/Pregunta.php";
require_once 'CheckLoginController.php';

class PreguntasController extends CheckLoginController {
    public $view;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "list";
        $this->model = new Pregunta();
    }

    public function list() {
        return $this->model->getPregunta();
    }

    public function list_paginated(){
        $this->view = 'list_paginated';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        return $this->model->getPreguntasPaginated($page);
    }


}
?>