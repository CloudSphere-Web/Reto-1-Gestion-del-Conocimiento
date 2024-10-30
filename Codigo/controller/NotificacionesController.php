<?php
require_once "model/Usuario.php";
require_once "model/Notificacion.php";
require_once 'CheckLoginController.php';

class NotificacionesController extends CheckLoginController {
    public $page_title;
    public $view;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "";
        $this->page_title = "";
        $this->model = new Notificacion();
        $this->usuarioModel = new Usuario();
    }

    public function viewNotifications() {
        $this->view = "notificationList";
        $email = $_COOKIE["email_usuario"];
        $userId = $this->usuarioModel->getUserIdByEmail($email);

        if ($userId) {
            $notifications = $this->model->getUserNotifications($userId);
        } else {
            echo "Usuario no encontrado.";
        }
    }

    public function addNotification($usuario_id, $tipo, $mensaje) {
        $success = $this->model->createNotification($usuario_id, $tipo, $mensaje);
        if ($success) {
            echo "Notificación creada exitosamente.";
        } else {
            echo "Error al crear la notificación.";
        }
    }

    public function markNotificationAsRead($notification_id) {
        $success = $this->model->markAsRead($notification_id);
        if ($success) {
            echo "Notificación marcada como leída.";
        } else {
            echo "Error al marcar la notificación como leída.";
        }
    }

    // (Opcional) Metodo para eliminar una notificación
    public function deleteNotification($notification_id) {
        // Metodo que deberías implementar en el modelo Notificacion para eliminar
        // $success = $this->model->deleteNotification($notification_id);
        // if ($success) {
        //     echo "Notificación eliminada.";
        // } else {
        //     echo "Error al eliminar la notificación.";
        // }
    }
}
?>
