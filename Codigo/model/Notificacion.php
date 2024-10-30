<?php

class Notificacion {

    private $table = "notificaciones";
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    public function createNotification($autor_id, $usuario_id_destinatario, $tipo, $mensaje) {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $visto = 0;

        $sql = "INSERT INTO $this->table (autor_id, usuario_id, tipo, mensaje, fecha, hora, visto)
            VALUES (:autor_id, :usuario_id, :tipo, :mensaje, :fecha, :hora, :visto)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':autor_id', $autor_id);
        $stmt->bindParam(':usuario_id', $usuario_id_destinatario);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':visto', $visto);

        return $stmt->execute();
    }

    public function getUserNotifications($usuario_id) {
        $sql = "SELECT n.*, u.nombre AS autor_nombre 
            FROM $this->table n
            JOIN usuarios u ON n.autor_id = u.id
            WHERE n.usuario_id = :usuario_id 
            ORDER BY n.fecha DESC, n.hora DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAsRead($notification_id) {
        $sql = "UPDATE $this->table SET visto = 1 WHERE id = :notification_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':notification_id', $notification_id);

        return $stmt->execute();
    }


}
?>
