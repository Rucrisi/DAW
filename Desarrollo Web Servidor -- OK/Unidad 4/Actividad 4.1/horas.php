<?php
session_start();

if (!isset($_SESSION['usuario'])) { //Si no hay usuario salta al login
    header('Location: login.php');
    exit;
}

$empleado = $_SESSION['usuario'];
$historial = $empleado['Historial'][0];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Horas Trabajadas</title>
</head>
<body>
    <h1>Horas Trabajadas</h1>
    <ul>
        <?php foreach ($historial as $dia => $horas): ?> <!-- Se crea una lista dependendiendo de la cantidad de valores -->
            <li><?php echo "$dia: $horas horas"; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="principal.php">Volver</a>
</body>
</html>
