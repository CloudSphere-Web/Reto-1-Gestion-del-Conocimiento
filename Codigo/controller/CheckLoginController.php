<?php
class CheckLoginController {
    public function __construct() {
        $this->checkLogin();
    }

    public function checkLogin() {
        if (!isset($_COOKIE['email_usuario'])) {
            header('Location: index.php?controller=usuario&action=login');
            exit();
        }
    }
}
?>