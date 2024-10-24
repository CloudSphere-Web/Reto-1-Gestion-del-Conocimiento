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

    public function getPreguntasByUserId($userId) {
        $sql = "SELECT * FROM $this->table WHERE usuario_id = :usuario_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':usuario_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPreguntaById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRespuestasByPreguntaId($preguntaId) {
        $sql = "SELECT * FROM respuestas WHERE pregunta_id = :pregunta_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':pregunta_id', $preguntaId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPreguntaWithUserDetails($id) {
        $query = "SELECT p.*, u.nombre, u.apellidos, u.foto_perfil, u.puesto 
                  FROM $this->table p 
                  JOIN usuarios u ON p.usuario_id = u.id 
                  WHERE p.id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

} 
?>