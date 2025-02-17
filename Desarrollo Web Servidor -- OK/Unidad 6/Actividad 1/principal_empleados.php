<?php
require("conexionBD.php");

// Consultar la tabla empleados
$sql = "SELECT * FROM empleados";
$resultado = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
</head>
<body>
    <h1>Listado de Empleados</h1>

    <!-- Tabla con el listado de empleados -->
    <table border="1" cellspacing="2" cellpadding="5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['apellidos'] ?></td>
                    <td>
                        <a href="ver_empleado.php?id=<?= $fila['id'] ?>">
                            <button>Ver</button>
                        </a>
                        <a href="editar_empleado.php?id=<?= $fila['id'] ?>">
                            <button>Editar</button>
                        </a>
                        <a href="eliminar_empleado.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
                            <button>Eliminar</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

        <!-- Botón para agregar un nuevo empleado -->
        <br>
        <a href="agregar_nuevo_empleado.php">
        <button>Añadir Nuevo Empleado</button>
        </a>
        <br>
        <br>
        <a href="borrar_todos_empleados.php">
        <button>Eliminar todos los Empleados</button>
        </a>
</body>
</html>
<?php
$conn->close();
?>
