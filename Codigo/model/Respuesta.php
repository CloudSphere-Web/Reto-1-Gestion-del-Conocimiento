<?php
class Respuesta{
    private $table = 'Respuestas';
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    // Metodo para obtener una respuesta por el ID de la pregunta
    public function getRespuestasById($id) {
        $sql = "SELECT * FROM $this->table WHERE pregunta_id = ?";
        $stmt = $this -> connection -> prepare($sql);

        $stmt->execute([$id]);

        // Obtenemos el resultado como array asociativo
        $respuestas = $stmt->fetch(PDO::FETCH_ASSOC);

        return $respuestas;
    }
}
?>