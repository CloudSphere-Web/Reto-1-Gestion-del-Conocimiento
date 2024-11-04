<?php
class CheckLoginController {
    public function __construct() {
        $this->checkLogin();
    }

    public function checkLogin() {
        if (!isset($_COOKIE['email_usuario'])) {
            if ($_GET['controller'] !== 'usuario' || $_GET['action'] !== 'login') {
                header('Location: index.php?controller=usuario&action=login');
                exit();
            }
        } else {
            $restrictedActions = ['viewProfileAdmin','viewListaUsuarios', 'editUsuarios', 'registerUsuario'];
            if (in_array($_GET['action'], $restrictedActions) && strtolower($_COOKIE['puesto_usuario']) !== 'admin') {
                header('Location: index.php?controller=preguntas&action=list_paginated');
                exit();
            }
        }
    }
}
?>