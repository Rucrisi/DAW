<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Almacenar los datos en el archivo
    $usuario = "$nombre | $correo | $contrasena\n";
    file_put_contents('usuarios.txt', $usuario, FILE_APPEND | LOCK_EX);

    // Verificar si el archivo usuarios.txt existe, si no, se creará automáticamente
    $archivo = 'usuarios.txt';
    if (!file_exists($archivo)) {
        // Si el archivo no existe, se crea automáticamente
        file_put_contents($archivo, ''); // Crear archivo vacío
    }
    // Asegúrate de que no haya salidas antes de la redirección
    header('Location: index.php');
    exit;
}
?>

