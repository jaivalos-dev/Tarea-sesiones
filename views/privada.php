<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard2</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['user']; ?>!</h2>
    <a href="../controllers/logout.php">Cerrar sesión</a>
</body>
</html>
