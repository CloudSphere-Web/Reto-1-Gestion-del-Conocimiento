<?php
class Respuesta {
    private $table = 'respuestas';
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
                JOIN usuarios u ON r.usuario_id = u.id
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

    public function save($param) {
        // Sanitize input parameters
        $param = filter_var_array($param, FILTER_SANITIZE_SPECIAL_CHARS);

        // Extract parameters
        $contenido = $param['contenido'] ?? null;
        $fecha_publicacion = $param['fecha_publicacion'] ?? null;
        $hora_publicacion = $param['hora_publicacion'] ?? null;
        $pregunta_id = $param['pregunta_id'] ?? null;
        $usuario_id = $param['usuario_id'] ?? null;
        $archivo = $param['archivo'] ?? null;

        // Prepare SQL statement
        $sql = "INSERT INTO " . $this->table . " (contenido, fecha_publicacion, hora_publicacion, pregunta_id, usuario_id, archivo) 
            VALUES (:contenido, :fecha_publicacion, :hora_publicacion, :pregunta_id, :usuario_id, :archivo)";
        $stmt = $this->connection->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':fecha_publicacion', $fecha_publicacion);
        $stmt->bindParam(':hora_publicacion', $hora_publicacion);
        $stmt->bindParam(':pregunta_id', $pregunta_id);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':archivo', $archivo);
        print_r($stmt);
        // Execute statement
        $stmt->execute();

        // Return the ID of the last inserted row
        return $this->connection->lastInsertId();
    }

    public function countRespuestasByUserId($userId) {
        $query = "SELECT COUNT(*) FROM respuestas WHERE usuario_id = :userId";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getRespuestaById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteRespuesta($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
