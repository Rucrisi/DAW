<?php
require("conexionBD.php");
require_once("clases.php");

// Verificar si se recibió el ID del empleado
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Consulta segura con parámetros preparados
    $sql = "SELECT * FROM empleados WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $empleadoData = $resultado->fetch_assoc();

    // Validar si se encontró el empleado
    if (!$empleadoData) {
        die("Empleado no encontrado.");
    }

    // Crear un objeto de la clase correspondiente
    switch ($empleadoData['cargo']) {
        case 'Recursos Humanos':
            $empleado = new RecursosHumanos(
                $empleadoData['id'],
                $empleadoData['nombre'],
                $empleadoData['apellidos'],
                $empleadoData['edad'],
                $empleadoData['sueldo_bruto_anual'],
                $empleadoData['sueldo_base']
            );
            break;
        case 'Marketing':
            $empleado = new Marketing(
                $empleadoData['id'],
                $empleadoData['nombre'],
                $empleadoData['apellidos'],
                $empleadoData['edad'],
                $empleadoData['sueldo_bruto_anual'],
                $empleadoData['sueldo_base']
            );
            break;
        case 'Atención al Cliente':
            $empleado = new AtencionAlCliente(
                $empleadoData['id'],
                $empleadoData['nombre'],
                $empleadoData['apellidos'],
                $empleadoData['edad'],
                $empleadoData['sueldo_bruto_anual'],
                $empleadoData['sueldo_base']
            );
            break;
        default:
            die("Cargo no válido.");
    }
} else {
    die("ID no especificado.");
}

// Guardar los cambios al enviar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? $empleadoData['nombre'];
    $apellidos = $_POST['apellidos'] ?? $empleadoData['apellidos'];
    $edad = $_POST['edad'] ?? $empleadoData['edad'];
    $cargo = $_POST['cargo'] ?? $empleadoData['cargo'];
    $sueldo_bruto_anual = $_POST['sueldo_bruto_anual'] ?? $empleadoData['sueldo_bruto_anual'];
    $sueldo_base = $_POST['sueldo_base'] ?? $empleadoData['sueldo_base'];

    // Actualizar los datos del empleado
    $sql = "UPDATE empleados SET nombre = ?, apellidos = ?, edad = ?, cargo = ?, sueldo_bruto_anual = ?, sueldo_base = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsdsi", $nombre, $apellidos, $edad, $cargo, $sueldo_bruto_anual, $sueldo_base, $id);

    if ($stmt->execute()) {
        echo "Empleado actualizado exitosamente.";
    } else {
        echo "Error al actualizar empleado: " . $conn->error;
    }
}

// Aplicar bono
if (isset($_POST['aplicar_bono'])) {
    $empleado->aplicarBono();
    $nuevoSueldoBase = $empleado->getSueldoBase();

    // Actualizar el sueldo base en la base de datos
    $sql = "UPDATE empleados SET sueldo_base = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $nuevoSueldoBase, $id);

    if ($stmt->execute()) {
        echo "<p>Bono aplicado al empleado.</p>";
    } else {
        echo "Error al actualizar el sueldo base con bono: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
</head>
<body>
    <h1>Editar Empleado</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($empleado->nombre) ?>" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?= htmlspecialchars($empleado->apellidos) ?>" required><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" min="18" max="100" value="<?= htmlspecialchars($empleado->edad) ?>" required><br><br>

        <label for="cargo">Cargo:</label><br>
        <select id="cargo" name="cargo" required>
            <option value="Recursos Humanos" <?= $empleadoData['cargo'] === 'Recursos Humanos' ? 'selected' : '' ?>>Recursos Humanos</option>
            <option value="Marketing" <?= $empleadoData['cargo'] === 'Marketing' ? 'selected' : '' ?>>Marketing</option>
            <option value="Atención al Cliente" <?= $empleadoData['cargo'] === 'Atención al Cliente' ? 'selected' : '' ?>>Atención al Cliente</option>
        </select><br><br>

        <label for="sueldo_bruto_anual">Sueldo Bruto Anual:</label><br>
        <input type="number" id="sueldo_bruto_anual" name="sueldo_bruto_anual" step="0.01" min="0" value="<?= htmlspecialchars($empleado->sueldoBrutoAnual) ?>" required><br><br>

        <label for="sueldo_base">Sueldo Base:</label><br>
        <input type="number" id="sueldo_base" name="sueldo_base" step="0.01" min="0" value="<?= htmlspecialchars($empleado->getSueldoBase()) ?>" required><br><br>

        <button type="submit">Guardar Cambios</button><br>
    </form><br>

    <!-- Botón para aplicar el bono -->
    <form method="POST">
        <button type="submit" name="aplicar_bono">Aplicar Bono 10%</button><br>
    </form>

    <!-- Botón para regresar al listado -->
    <br>
    <a href="listado_empleados.php">
        <button>Volver al Listado</button>
    </a>
</body>
</html>

<?php
$conn->close();
?>
