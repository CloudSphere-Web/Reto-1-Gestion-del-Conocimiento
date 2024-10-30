<?php

class Notificacion {

    private $table = "notificaciones";
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    // Establece la conexión a la base de datos
    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    //Metodo para crear una nueva notificación
    public function createNotification($autor_id, $usuario_id_destinatario, $tipo, $mensaje) {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $visto = 0;  // Notificación no leída por defecto

        $sql = "INSERT INTO notificaciones (autor_id, usuario_id, tipo, mensaje, fecha, hora, visto)
            VALUES (:autor_id, :usuario_id, :tipo, :mensaje, :fecha, :hora, :visto)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':autor_id', $autor_id); // Para el usuario que realiza la acción
        $stmt->bindParam(':usuario_id', $usuario_id_destinatario); // Para el usuario que recibe la notificación
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':visto', $visto);

        // Ejecuta la inserción
        return $stmt->execute();  // Devuelve true si la inserción fue exitosa
    }

    // Metodo para obtener todas las notificaciones de un usuario
    public function getUserNotifications($usuario_id) {
        $sql = "SELECT n.*, u.nombre AS autor_nombre 
            FROM notificaciones n
            JOIN usuarios u ON n.autor_id = u.id
            WHERE n.usuario_id = :usuario_id 
            ORDER BY n.fecha DESC, n.hora DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Devuelve un array de notificaciones
    }



    // Metodo para marcar una notificación como leída
    public function markAsRead($notification_id) {
        $sql = "UPDATE notificaciones SET visto = 1 WHERE id = :notification_id";
        $stmt = $this->connection->prepare($sql);  // Cambia $this->db a $this->connection
        $stmt->bindParam(':notification_id', $notification_id);

        return $stmt->execute();  // Devuelve true si la actualización fue exitosa
    }


}
?>
