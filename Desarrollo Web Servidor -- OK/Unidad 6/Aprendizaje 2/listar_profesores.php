<?php
require("conexionBD.php");

// Consultar la tabla Profesores
$sql = "SELECT * FROM Profesores";
$resultado = $conn->query($sql);

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
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $fila['id'] ?></td>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['apellidos'] ?></td>
                    <td><?= $fila['asignaturas'] ?></td>
                    <td>
                        <a href="editar_profesor.php?id=<?= $fila['id'] ?>">Editar</a>
                        <a href="eliminar_profesor.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?');">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

        <!-- Botón para agregar un nuevo profesor -->
        <br>
        <a href="agregar_profesor.php">
        <button>Añadir Nuevo Profesor</button>
        </a>
        <br>
        <br>
        <a href="borrar_profesores.php">
        <button>Eliminar todos los Profesores</button>
        </a>
</body>
</html>
<?php
$conn->close();
?>
