<?php
require_once "model/Categoria.php";
require_once 'CheckLoginController.php';

class CategoriaController extends CheckLoginController {
    public $page_title;
    public $view;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "";
        $this->page_title = "";
        $this->model = new Categoria();
    }

    public function list() {
        return $this->model->getCategoria();
    }

}