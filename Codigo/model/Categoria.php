<?php
class Categoria
{
    private $table = 'categorias';
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    public function getCategoria(){
        $sql = "SELECT id, nombre FROM $this->table";
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    public function getCategoriaById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoriaByNombre($nombre) {
        $sql = "SELECT * FROM $this->table WHERE nombre = :nombre";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}