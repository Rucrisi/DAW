<?php
require("conexionBD_PDO.php");

try {
    // Consultar la tabla Profesores
    $sql = "SELECT * FROM Profesores";
    $stmt = $conn->query($sql); // Ejecutar la consulta
    $profesores = $stmt->fetchAll(); // Obtener todos los registros
} catch (PDOException $e) {
    die("Error al consultar los profesores: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Profesores</title>
</head>
<body>
    <h1>Listado de Profesores</h1>

    <!-- Tabla con el listado de profesores -->
    <table border="1" cellspacing="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Asignaturas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profesores as $profesor): ?>
                <tr>
                    <td><?= $profesor['id'] ?></td>
                    <td><?= $profesor['nombre'] ?></td>
                    <td><?= $profesor['apellidos'] ?></td>
                    <td><?= $profesor['asignaturas'] ?></td>
                    <td>
                        <a href="editar_profesor.php?id=<?= $profesor['id'] ?>">Editar</a>
                        <a href="eliminar_profesor.php?id=<?= $profesor['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botón para agregar un nuevo profesor -->
    <br>
    <a href="agregar_profesor.php">
        <button>Añadir Nuevo Profesor</button>
    </a>
    <br><br>
    <a href="borrar_profesores.php">
        <button>Eliminar todos los Profesores</button>
    </a>
</body>
</html>
