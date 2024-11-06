<?php
session_start();

date_default_timezone_set("Europe/Madrid");

require_once 'config/config.php';
require_once 'model/db.php';
require_once 'controller/CheckLoginController.php';

if (!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if (!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

if ($_GET["controller"] !== "usuario" || $_GET["action"] !== "login") {
    $checkLogin = new CheckLoginController();
}

$controller_path = 'controller/' . ucfirst($_GET["controller"]) . 'Controller.php';

if (!file_exists($controller_path)) $controller_path = 'controller/' . constant("DEFAULT_CONTROLLER") . 'Controller.php';

require_once $controller_path;
$controllerName = ucfirst($_GET["controller"]) . 'Controller';
$controller = new $controllerName();

$dataToView["data"] = array();
if (method_exists($controller, $_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();

// Esto es para que el header no salga en el Login ya que no tiene sentido
if ($_GET["controller"] !== "Usuario" && $_GET["action"] !== "login" && $_GET["action"] !== "viewPreguntasUsuario"
    && $_GET["action"] !== "viewRespuestasUsuario" && $_GET["action"] !== "viewListaUsuarios"
    && $_GET["action"] !== "viewFavoritosUsuario" && $_GET["action"] !== "viewMultimediaUsuario"
    && $_GET["action"] !== "viewRegisterUsuarios") {
    require_once 'view/layout/header.php';
}
require_once 'view/' . $_GET["controller"] . '/' . $controller->view . '.html.php';

if ($_GET["controller"] !== "Usuario" && $_GET["action"] !== "login" && $_GET["action"] !== "viewPreguntasUsuario"
    && $_GET["action"] !== "viewRespuestasUsuario" && $_GET["action"] !== "viewListaUsuarios"
    && $_GET["action"] !== "viewFavoritosUsuario" && $_GET["action"] !== "viewMultimediaUsuario"
    && $_GET["action"] !== "viewRegisterUsuarios") {
    require_once 'view/layout/footer.php';
}
?>