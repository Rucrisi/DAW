<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('empleados.json');
    $empleados = json_decode($json, true)['Empleados']; //Extrae los empleados en un array

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $empleadoEncontrado = null;

    foreach ($empleados as $empleado) { //Busca y compara los datos introducidos con el array extraido
        if ($empleado['Usuario'] === $usuario && $empleado['Contraseña'] === $contrasena) {
            $empleadoEncontrado = $empleado;
            break;
        }
    }

    if ($empleadoEncontrado) {
        $_SESSION['usuario'] = $empleadoEncontrado;

        if (!isset($_COOKIE['count'])) { //Cookie para contar el numero de accesos
            setcookie('count', 1, time() + (86400 * 30), "/"); //La cookie se guardara durante 30 dias
        } else {
            setcookie('count', $_COOKIE['count'] + 1, time() + (86400 * 30), "/");
        }

        header('Location: principal.php'); //Si el usuario existe se lanza la pagina principal
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Bienvenido, acceda a su cuenta</h2>
    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

