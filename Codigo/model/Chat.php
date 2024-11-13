<?php

class Chat {
    private $table = "chat";
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    // Establece la conexión a la base de datos
    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    // Method to insert a new message
//    public function insertMessage($user, $message) {
//        $sql = "INSERT INTO $this->table (user, message, timestamp) VALUES (:user, :message, :timestamp)";
//        $stmt = $this->connection->prepare($sql);
//        $timestamp = date('Y-m-d H:i:s');
//        $stmt->bindParam(':user', $user);
//        $stmt->bindParam(':message', $message);
//        $stmt->bindParam(':timestamp', $timestamp);
//        return $stmt->execute();
//    }

    // Para que solo haya un historial de 50 mensajes
    public function insertMessage($user, $message) {
        // Paso 1: Verificar cuántos mensajes existen actualmente
        $sqlCount = "SELECT COUNT(*) FROM $this->table";
        $stmtCount = $this->connection->prepare($sqlCount);
        $stmtCount->execute();
        $messageCount = $stmtCount->fetchColumn();

        // Paso 2: Si hay 50 mensajes, eliminar el más antiguo
        if ($messageCount >= 50) {
            $sqlDelete = "DELETE FROM $this->table ORDER BY timestamp ASC LIMIT 1";
            $stmtDelete = $this->connection->prepare($sqlDelete);
            $stmtDelete->execute();
        }

        // Paso 3: Insertar el nuevo mensaje
        $sqlInsert = "INSERT INTO $this->table (user, message, timestamp) VALUES (:user, :message, :timestamp)";
        $stmtInsert = $this->connection->prepare($sqlInsert);
        $timestamp = date('Y-m-d H:i:s');
        $stmtInsert->bindParam(':user', $user);
        $stmtInsert->bindParam(':message', $message);
        $stmtInsert->bindParam(':timestamp', $timestamp);
        return $stmtInsert->execute();
    }


    // Method to retrieve all messages
    public function getMessages() {
        $sql = "SELECT * FROM $this->table ORDER BY timestamp ASC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}