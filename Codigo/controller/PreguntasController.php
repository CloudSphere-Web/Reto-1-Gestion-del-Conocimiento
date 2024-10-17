<?php
require_once "model/Preguntas.php";

class PreguntasController{
    public $page_title;

    public $view;

    public $model;

    public function __construct(){
        $this -> view = "list";
        $this -> page_title="";
        $this -> page_description="";
        $this -> model = new Preguntas();
    }


}
