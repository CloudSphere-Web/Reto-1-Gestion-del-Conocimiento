<?php
require_once 'CheckLoginController.php';
require_once 'model/Chat.php';
require_once 'model/Usuario.php';

class AyudaController extends CheckLoginController
{
    public $view;
    public $page_title;
    public $chatModel;
    public $usuarioModel;

    public function __construct()
    {
        parent::__construct();
        $this->view = "";
        $this->page_title = "";
    }

    public function viewAyuda() {
        $this->view = "ayuda";
        $this->page_title = "Ayuda";


    }

}