<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Profesor</title>
</head>
<body>
    <h1>Insertar Profesor</h1>
    <form action="guardar_profesor.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="asignaturas">Asignaturas:</label><br>
        <textarea id="asignaturas" name="asignaturas" rows="4" required></textarea><br><br>

        <button type="submit">Guardar Profesor</button>
    </form>
</body>
</html>
