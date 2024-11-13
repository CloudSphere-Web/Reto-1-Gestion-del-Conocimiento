<?php
class Usuario
{
    private $table = 'usuarios';
    private $connection;

    public function __construct()
    {
        $this->getConnection();
    }

    public function getConnection()
    {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

//    public function getUserIntoArray($param){
//        $map = array();
//        $emailParam = $param["email"] ?? null;
//        $contrasennaParam = $param["contrasenna"] ?? null;
//        $sql = "SELECT email, contrasenna FROM " . $this->table;
//        $stmt = $this->connection->prepare($sql);
//        $stmt->execute();
//        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        foreach ($resultados as $resultado) {
//            $map[$resultado['email']] = $resultado['contrasenna'];
//        }
//        if (isset($map[$emailParam]) && $map[$emailParam] === $contrasennaParam) {
////            setcookie("email_usuario", $emailParam, 0, "/");
//            setcookie("email_usuario", $emailParam, time() + 3600, "/", "", true, true); // Expira en 1h, httponly y secure
//
//            $_SESSION['is_logged_in'] = true;
//            return true; // Usuario encontrado y validado
//        }
//        return false; // Usuario no encontrado o credenciales incorrectas
//    }

    public function getUserIntoArray($param) {
        $map = array();
        $emailParam = $param["email"] ?? null;
        $contrasennaParam = $param["contrasenna"] ?? null;

        // Incluye 'puesto' en la consulta SQL
        $sql = "SELECT email, contrasenna, puesto FROM " . $this->table;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultados as $resultado) {
            $map[$resultado['email']] = [
                'contrasenna' => $resultado['contrasenna'],
                'puesto' => $resultado['puesto']
            ];
        }

        if (isset($map[$emailParam]) && password_verify($contrasennaParam, $map[$emailParam]['contrasenna'])) {
            // Establece las cookies si el usuario es validado
//            setcookie("email_usuario", $emailParam, time() + 3600, "/", "", true, true); // Expira en 1h, httponly y secure
//            setcookie("puesto_usuario", $map[$emailParam]['puesto'], time() + 3600, "/", "", true, true); // Expira en 1h, httponly y secure

            setcookie("email_usuario", $emailParam, time() + 3600, "/", ""); // Expira en 1h
            setcookie("puesto_usuario", $map[$emailParam]['puesto'], time() + 3600, "/", ""); // Expira en 1h
            
            $_SESSION['is_logged_in'] = true;
            return true; // Usuario encontrado y validado
        }

        return false; // Usuario no encontrado o credenciales incorrectas
    }


    public function getUserDataByEmail($email) {
        if (is_null($email)) return false;
        $sql = "SELECT * FROM " . $this->table . " WHERE email = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function getUserIdByEmail($email) {
        $sql = "SELECT id FROM $this->table WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getUserDetailsById($usuario_id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsuarios() {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUserDataById($id, $userData) {
        $query = "UPDATE $this->table SET nombre = :nombre, apellidos = :apellidos, puesto = :puesto, email_contacto = :email_contacto, foto_perfil = :foto_perfil WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':nombre', $userData['nombre']);
        $stmt->bindParam(':apellidos', $userData['apellidos']);
        $stmt->bindParam(':puesto', $userData['puesto']);
        $stmt->bindParam(':email_contacto', $userData['email_contacto']);
        $stmt->bindParam(':foto_perfil', $userData['foto_perfil']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

//    public function register() {
//        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//
//        if (isset($post['submit'])) {
//            if ($post['email'] == '' || $post['contrasenna'] == '' ||$post['nombre'] == '' || $post['apellidos'] == '' ||
//                $post['puesto'] == '' || $post['email_contacto'] == '' || $post['puntaje'] == '' || $post['foto_perfil'] == '') {
//                return;
//            }
//            $hashedPassword = password_hash($post['contrasenna'], PASSWORD_DEFAULT);
//
//            $stmt = $this -> connection -> prepare('INSERT INTO ' . $this -> table . ' (email, contrasenna, nombre, apellidos, puesto, email_contacto, puntaje, foto_perfil) VALUES(:email, :contrasenna, :nombre, :apellidos, :puesto, :email_contacto, :puntaje, :foto_perfil)');
//            $stmt -> execute([
//                ':email' => $post['email'],
//                ':contrasenna' => $hashedPassword,
//                ':nombre' => $post['nombre'],
//                ':apellidos' => $post['apellidos'],
//                ':puesto' => $post['puesto'],
//                ':email_contacto' => $post['email_contacto'],
//                ':puntaje' => $post['puntaje'],
//                ':foto_perfil' => $post['foto_perfil']
//            ]);
//
//            if ($this -> connection -> lastInsertId()) {
//                return $this -> connection -> lastInsertId();
//            }
//        } return;
//    }
//
//    public function getUserByEmail($email) {
//        if (is_null($email)) return false;
//        $sql = "SELECT * FROM " . $this -> table . " WHERE email = ?";
//        $stmt = $this -> connection -> prepare($sql);
//        $stmt -> execute([$email]);
//        return $stmt -> fetch();
//    }
//
//    public function login($param) {
//        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
//        if (isset($post['submit'])) {
//            $storedUser = $this -> getUserByEmail($post['email']);
//
//            if (isset($storedUser['email']) && password_verify($post['contrasenna'], $storedUser['contrasenna'])) {
//                return $storedUser;
//            }
//        }
//        return;
//    }

    public function insertUserData($userData) {
        $sql = "INSERT INTO $this->table (nombre, apellidos, email, contrasenna, puesto, email_contacto, foto_perfil) VALUES (:nombre, :apellidos, :email, :contrasenna, :puesto, :email_contacto, :foto_perfil)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':nombre', $userData['nombre']);
        $stmt->bindParam(':apellidos', $userData['apellidos']);
        $stmt->bindParam(':email', $userData['email']);
        $stmt->bindParam(':contrasenna', $userData['contrasenna']);
        $stmt->bindParam(':puesto', $userData['puesto']);
        $stmt->bindParam(':email_contacto', $userData['email_contacto']);
        $stmt->bindParam(':foto_perfil', $userData['foto_perfil']);
        $stmt->execute();
    }

    public function deleteUserById($id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

}
?>
