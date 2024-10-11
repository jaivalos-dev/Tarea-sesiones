<?php
require 'config.php';
require 'models/User.php';
require 'controllers/AuthController.php';

$userModel = new User($pdo);
$authController = new AuthController($userModel);

if (isset($_GET['action']) && $_GET['action'] === 'login') {
    $authController->login();
} else {
    header('Location: ./views/login.php');
}
?>
