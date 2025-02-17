<?php
// Leer usuarios desde el archivo
$usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h1>Registro de Usuarios</h1>

    <form action="registro.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="correo" placeholder="Correo Electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
    </form>

    <h2>Usuarios Registrados</h2>
    <ul>
        <?php foreach ($usuarios as $usuario): ?>
            <li><?php echo $usuario; ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
