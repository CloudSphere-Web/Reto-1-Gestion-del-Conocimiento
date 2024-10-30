<?php
require_once "model/Usuario.php"; // Asegúrate de que esta ruta sea correcta
require_once "model/Notificacion.php"; // Asegúrate de tener la ruta correcta
require_once 'CheckLoginController.php'; // Controlador para verificar sesión

class NotificacionesController extends CheckLoginController {
    public $page_title;
    public $view;
    public $model;

    public function __construct() {
        parent::__construct();
        $this->view = "";
        $this->page_title = "";
        $this->model = new Notificacion(); // Modelo de notificaciones
        $this->usuarioModel = new Usuario(); // Agrega el modelo de usuario
    }

    public function viewNotifications() {
        $this->view = "notificationList"; // La vista que muestra la lista de notificaciones
        $email = $_COOKIE["email_usuario"];
        $userId = $this->usuarioModel->getUserIdByEmail($email); // Llama al metodo desde el modelo de Usuario

        if ($userId) {
            $notifications = $this->model->getUserNotifications($userId); // Obtiene las notificaciones del usuario
            // Cargar la vista y pasarle las notificaciones
            include 'view/notificaciones/notificationList.html.php'; // Asegúrate de la ruta correcta
        } else {
            // Manejar el caso donde no se encuentra el ID del usuario
            echo "Usuario no encontrado.";
        }
    }

    // Metodo para agregar una nueva notificación (opcional)
    public function addNotification($usuario_id, $tipo, $mensaje) {
        $success = $this->model->createNotification($usuario_id, $tipo, $mensaje);
        if ($success) {
            echo "Notificación creada exitosamente.";
        } else {
            echo "Error al crear la notificación.";
        }
    }

    // Metodo para marcar una notificación como leída
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
