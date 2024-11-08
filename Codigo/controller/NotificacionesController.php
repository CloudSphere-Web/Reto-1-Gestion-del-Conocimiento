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
            // Cargar datos para la vista
            $dataToView = [
                'notifications' => $notifications
            ];
            return $dataToView; // Devuelve los datos para que la vista los maneje
        } else {
            // Manejar el caso donde no se encuentra el ID del usuario
            return ['error' => 'Usuario no encontrado.']; // Puedes manejar este error en la vista
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

    public function deleteNotification($notification_id = null) {
        $email = $_COOKIE["email_usuario"];
        $userId = $this->usuarioModel->getUserIdByEmail($email);

        if ($userId) {
            // Llama al modelo para eliminar todas las notificaciones del usuario
            $success = $this->model->deleteNotification($userId); // Sin pasar el notification_id para eliminar todas

            if ($success) {
                echo "Todas las notificaciones han sido eliminadas.";
                header("Location: index.php?controller=notificaciones&action=viewNotifications");
                exit();
            } else {
                echo "Error al eliminar las notificaciones.";
            }
        } else {
            echo "Error: Usuario no encontrado.";
        }
    }

    public function viewNotification() {
        $notificationId = isset($_GET['id']) ? $_GET['id'] : 0;

        if ($notificationId == 0) {
            echo "Error: notificación no válida.";
            return;
        }

        // Marca la notificación como leída usando el metodo existente
        $this->markNotificationAsRead($notificationId);

        // Obtiene el ID de la pregunta asociada con la notificación
        $notification = $this->model->getNotificationById($notificationId);

        if ($notification && isset($notification['pregunta_id'])) {
            $preguntaId = $notification['pregunta_id'];

            // Redirige a la pregunta relacionada con la notificación
            header("Location: index.php?controller=preguntas&action=details&id=" . $preguntaId);
            exit();
        } else {
            echo "Error: no se encontró la pregunta asociada a la notificación.";
        }
    }

}
?>