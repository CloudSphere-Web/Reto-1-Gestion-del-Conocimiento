<?php
class CheckLoginController {
    public function __construct() {
        $this->checkLogin();
    }

    public function checkLogin() {
//       if (!isset($_COOKIE['email_usuario']) && !isset($_SESSION['is_logged_in'])) {
        if (!isset($_COOKIE['email_usuario'])) {
//            $_SESSION['is_logged_in'] = false;
            header('Location: index.php?controller=usuario&action=login');
            exit();
        }
    }
}
?>