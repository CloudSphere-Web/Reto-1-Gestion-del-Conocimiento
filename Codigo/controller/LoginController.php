<?php
require_once "model/Login.php";

class LoginController{
    public $page_title;

    public $view;

    public $model;

    public function __construct(){
        $this -> view = "login";
        $this -> page_title="";
        $this -> page_description="";
        $this -> model = new Login();
    }

}
