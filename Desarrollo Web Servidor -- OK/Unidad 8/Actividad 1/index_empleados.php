<?php
require("conexionBD.php");
require_once("clases.php"); // Incluir el archivo de clases

// Consultar la tabla empleados
$sql = "SELECT * FROM empleados";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}

// Crear un array de objetos de empleados
$empleados = [];

while ($fila = $resultado->fetch_assoc()) {
    // Determinar el tipo de empleado según el cargo
    if ($fila['cargo'] === 'Recursos Humanos') {
        $empleados[] = new RecursosHumanos(
            $fila['id'],
            $fila['nombre'],
            $fila['apellidos'],
            $fila['edad'],
            $fila['sueldo_bruto_anual'],
            $fila['sueldo_base']);

    } elseif ($fila['cargo'] === 'Marketing') {
        $empleados[] = new Marketing(
            $fila['id'] ,
            $fila['nombre'],
            $fila['apellidos'],
            $fila['edad'],
            $fila['sueldo_bruto_anual'],
            $fila['sueldo_base']);

    } elseif ($fila['cargo'] === 'Atención al Cliente') {
        $empleados[] = new AtencionAlCliente(
            $fila['id'],
            $fila['nombre'],
            $fila['apellidos'],
            $fila['edad'],
            $fila['sueldo_bruto_anual'],
            $fila['sueldo_base']);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <script>

        function consultarSalario() {
            const idEmpleado = document.getElementById("idEmpleado").value;

            fetch(`ws_salario_bruto.php?id=${idEmpleado}`)
                .then(response => response.json())
                .then(data => {
                    const resultadoDiv = document.getElementById("resultado");
                    if (data.success) {
                        resultadoDiv.innerText = `Salario bruto: ${data.sueldo_bruto_anual} €`;
                    } else {
                        resultadoDiv.innerText = data.error;
                    }
                });
        }
    </script>

</head>
<body>
    <h1>Listado de Empleados</h1>

    <!-- Tabla con el listado de empleados -->
    <table border="1" cellspacing="2" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Sueldo Base</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?= $empleado->id ?></td>
                    <td><?= $empleado->nombre ?></td>
                    <td><?= $empleado->apellidos ?></td>
                    <td><?= get_class($empleado) ?></td>
                    <td><?= $empleado->getSueldoBase() ?></td>
                    <td>
                        <a href="ver_empleado.php?id=<?= $empleado->id ?>">
                            <button>Ver</button>
                        </a>
                        <a href="editar_empleado.php?id=<?= $empleado->id ?>">
                            <button>Editar</button>
                        </a>
                        <a href="eliminar_empleado.php?id=<?= $empleado->id ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
                            <button>Eliminar</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
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
    <h2>Consultar Salario Bruto</h2>
    <p>Ingrese el ID del empleado para consultar su salario bruto anual:</p>
    <input type="text" id="idEmpleado" placeholder="ID del empleado">
    <button onclick="consultarSalario()">Consultar</button>
    <div id="resultado" style="margin-top: 20px; font-weight: bold;"></div>
</body>
</html>

<?php
$conn->close();
?>
