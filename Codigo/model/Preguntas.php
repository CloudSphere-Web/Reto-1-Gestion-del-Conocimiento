<?php
class Preguntas{
    private $table = 'Preguntas';
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }


}
?>