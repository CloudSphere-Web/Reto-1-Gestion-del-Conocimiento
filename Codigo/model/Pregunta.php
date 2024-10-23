<?php
class Pregunta{
    private $table = 'Preguntas';
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    public function getPregunta(){
        $sql = "SELECT * FROM $this->table";
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    public function getPreguntasPaginated($page = 1) {
        $limit=PAGINATION;
        $offset = ($page - 1) * $limit; // Calcula el desplazamiento
        $sql = "SELECT * FROM ".$this->table." LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $totalPages = $this->getNumperPages();
        return [$stmt->fetchAll(), $page, $totalPages];
    }

    private function getNumperPages() {
        $limit=PAGINATION;
        $total=$this->connection->query("SELECT COUNT(*) FROM ".$this->table)->fetchColumn();
        $total=ceil($total/$limit);
        return $total;
    }

    public function getPreguntasByUserId() {
        // Asegurarte de que la sesión esté iniciada
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Obtener el ID del usuario desde la sesión
        $userId = $_SESSION['user_id'];
    
        // Preparar la consulta SQL para obtener las preguntas del usuario actual
        $sql = "SELECT * FROM $this->table WHERE user_id = :user_id";
        $stmt = $this->connection->prepare($sql);
    
        // Enlazar el parámetro :user_id con el valor del ID del usuario
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Devolver las preguntas que coincidan con el ID del usuario
        return $stmt->fetchAll();
    }
    
    
} 
?>