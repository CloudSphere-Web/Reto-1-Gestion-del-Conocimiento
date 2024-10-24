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
        }
    }
}
?>