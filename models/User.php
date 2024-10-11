<?php
class User {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function findUser($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function verifyPassword($inputPassword, $storedPassword) {
        // Simple comparación ya que las contraseñas son texto plano
        return $inputPassword === $storedPassword;
    }
}
?>
