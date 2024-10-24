<?php
class Usuario
{
    private $table = 'Usuarios';
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

    public function getUserIntoArray($param){
        $map = array();
        $emailParam = $param["email"] ?? null;
        $contrasennaParam = $param["contrasenna"] ?? null;
        $sql = "SELECT email, contrasenna FROM " . $this->table;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultados as $resultado) {
            $map[$resultado['email']] = $resultado['contrasenna'];
        }
        if (isset($map[$emailParam]) && $map[$emailParam] === $contrasennaParam) {
            setcookie("email_usuario", $emailParam, 0, "/");
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
}
?>
