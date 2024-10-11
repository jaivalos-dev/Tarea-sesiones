<?php
session_start();

class AuthController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->findUser($username);
    
            if ($user) {
                echo "Usuario encontrado: " . $user['username'] . "\n";
            } else {
                echo "Usuario no encontrado. \n";
                exit;
            }
    
            if ($this->userModel->verifyPassword($password, $user['pass'])) {
                session_start();
                $_SESSION['user'] = $user['username'];
                header('Location: ./views/privada.php');
            } else {
                echo "\nCredenciales incorrectas\n";
            }
        }
    }
    
}
?>
