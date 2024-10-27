<?php

require_once 'CheckLoginController.php';

class AjustesController extends CheckLoginController {

    public $view;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "";
    }

    public function viewSettings() {
        $this->view = "ajustes";
        $this->page_title = "Ajustes";
        return;
    }
}