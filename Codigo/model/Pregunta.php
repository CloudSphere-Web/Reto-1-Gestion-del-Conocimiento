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
        $limit = PAGINATION;
        $offset = ($page - 1) * $limit; // Calculate the offset
        $sql = "SELECT p.*, u.foto_perfil 
            FROM " . $this->table . " p
            JOIN usuarios u ON p.usuario_id = u.id
            ORDER BY p.fecha_publicacion DESC, p.hora_publicacion DESC 
            LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $totalPages = $this->getNumperPages();
        return [$stmt->fetchAll(PDO::FETCH_ASSOC), $page, $totalPages];
    }

    private function getNumperPages() {
        $limit=PAGINATION;
        $total=$this->connection->query("SELECT COUNT(*) FROM ".$this->table)->fetchColumn();
        $total=ceil($total/$limit);
        return $total;
    }

    public function getPreguntasByUserId($userId) {
        $sql = "SELECT * FROM $this->table WHERE usuario_id = :usuario_id  ORDER BY fecha_publicacion DESC, hora_publicacion DESC";
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

    public function searchPreguntas($keyword) {
        $keyword = "%$keyword%";
        $sql = "SELECT p.*, u.foto_perfil 
            FROM " . $this->table . " p
            JOIN usuarios u ON p.usuario_id = u.id
            WHERE p.titulo LIKE :keyword OR p.descripcion LIKE :keyword
            ORDER BY p.fecha_publicacion DESC, p.hora_publicacion DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($param) {
        // Sanitize input parameters
        $param = filter_var_array($param, FILTER_SANITIZE_SPECIAL_CHARS);

        // Extract parameters
        $titulo = $param['titulo'] ?? null;
        $descripcion = $param['descripcion'] ?? null;
        $fecha_publicacion = $param['fecha_publicacion'] ?? null;
        $hora_publicacion = $param['hora_publicacion'] ?? null;
        $usuario_id = $param['usuario_id'] ?? null;
        $categoria_id = $param['categoria_id'] ?? null;
        $archivo = $param['archivo'] ?? null;

        // Prepare SQL statement
        $sql = "INSERT INTO " . $this->table . " (titulo, descripcion, fecha_publicacion, hora_publicacion, usuario_id, categoria_id, archivo) 
            VALUES (:titulo, :descripcion, :fecha_publicacion, :hora_publicacion, :usuario_id, :categoria_id, :archivo)";
        $stmt = $this->connection->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_publicacion', $fecha_publicacion);
        $stmt->bindParam(':hora_publicacion', $hora_publicacion);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':categoria_id', $categoria_id);
        $stmt->bindParam(':archivo', $archivo);

        // Execute statement
        $stmt->execute();

        // Return the ID of the last inserted row
        return $this->connection->lastInsertId();
    }

    public function getPreguntasByCategoriaNombre($nombreCategoria) {
        $sql = "SELECT p.*, c.nombre as categoria_nombre, c.descripcion as categoria_descripcion, u.foto_perfil 
            FROM " . $this->table . " p
            JOIN categorias c ON p.categoria_id = c.id
            JOIN usuarios u ON p.usuario_id = u.id
            WHERE c.nombre = :nombreCategoria
            ORDER BY p.fecha_publicacion DESC, p.hora_publicacion DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':nombreCategoria', $nombreCategoria, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPreguntasByFavoriteUser($userId) {
        // Selecciona preguntas de los usuarios favoritos del usuario actual
        $sql = "SELECT p.*, u.foto_perfil 
            FROM " . $this->table . " p
            JOIN usuarios u ON p.usuario_id = u.id
            JOIN favoritos f ON f.usuario_id = :userId AND f.pregunta_id = p.id
            ORDER BY p.fecha_publicacion DESC, p.hora_publicacion DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//    public function getPreguntasByMultimediaByUser($userId) {
//        $sql = "SELECT * FROM " . $this->table . "
//            WHERE usuario_id = :userId AND archivo IS NOT NULL
//            ORDER BY fecha_publicacion DESC, hora_publicacion DESC";
//        $stmt = $this->connection->prepare($sql);
//        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
//        $stmt->execute();
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }

    public function getPreguntasConMultimedia($userId) {
        $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE usuario_id = :user_id AND archivo IS NOT NULL");

        $stmt->execute([':user_id' => $userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>