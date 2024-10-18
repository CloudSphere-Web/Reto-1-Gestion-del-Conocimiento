<?php
require_once "model/Pregunta.php";

class PreguntasController {
    public $page_title;
    public $view;
    public $model;

    public function __construct() {
        $this->view = "list";
        $this->page_title = "Lista de Preguntas";
        $this->model = new Pregunta();
    }

    public function list() {
        return $this->model->getPregunta();
    }

    public function list_paginated(){
        $this->view = 'list_paginated';
        $this->page_title = 'Listado de notas paginadas';
        $page=isset($_GET['page'])?$_GET['page']:1;
        return $this->model->getPreguntasPaginated($page);
    }
}
?>