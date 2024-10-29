<?php

class AyudaController extends CheckLoginController
{
    public $view;
    public $page_title;
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->view = "";
        $this->page_title = "";
    }

    public function viewAyuda()
    {
        $this->view = "ayuda";
        $this->page_title = "Ayuda";
    }

}