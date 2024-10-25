<?php
class Respuesta {
    private $table = 'Respuestas';
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    public function getRespuestasByPreguntaId($preguntaId) {
        // Ajustar la consulta para hacer JOIN con la tabla de Usuarios
        $sql = "SELECT 
                    r.*, 
                    u.nombre, 
                    u.apellidos, 
                    u.foto_perfil, 
                    u.puesto 
                FROM $this->table r
                JOIN Usuarios u ON r.usuario_id = u.id
                WHERE r.pregunta_id = :pregunta_id";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':pregunta_id', $preguntaId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRespuestasByUserId($userId) {
        $sql = "SELECT * FROM $this->table WHERE usuario_id = :usuario_id ORDER BY fecha_publicacion DESC, hora_publicacion DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':usuario_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
