<?php
session_start();

if (!isset($_SESSION['usuario'])) { //Si no hay usuario salta al login
    header('Location: login.php');
    exit;
}

$empleado = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Datos Personales</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $empleado['Nombre']; ?></h1>
    <p><strong>Usuario:</strong> <?php echo $empleado['Usuario']; ?></p>
    <a href="horas.php">Ver Horas Trabajadas</a>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
