<?php
require("conexionBD.php");

// Verificar si se envió un identificador
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Convertir el ID a entero para evitar inyección SQL

    // Consulta preparada para evitar inyecciones SQL
    $sql = "SELECT sueldo_bruto_anual FROM empleados WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $empleado = $resultado->fetch_assoc();
        echo json_encode([
            "success" => true,
            "sueldo_bruto_anual" => $empleado['sueldo_bruto_anual']
        ]);
    } else {
        // Respuesta para empleado no encontrado
        echo json_encode([
            "success" => false,
            "error" => "Empleado no encontrado."
        ]);
    }
} else {
    // Respuesta para peticiones inválidas
    echo json_encode([
        "success" => false,
        "error" => "Solicitud inválida. Proporcione un ID válido."
    ]);
}

$conn->close();
?>
