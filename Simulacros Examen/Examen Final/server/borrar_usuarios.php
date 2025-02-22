<?php
session_start();

if (isset($_SESSION['usuarios']) && !empty($_SESSION['usuarios'])) {
    $_SESSION = []; // Vaciar todas las variables de sesión
    session_unset(); // Elimina las variables de sesión
    session_destroy(); // Destruye la sesión completamente

    echo json_encode([
        "status" => "success",
        "message" => "Usuarios eliminados."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No hay usuarios registrados en la sesión."
    ]);
}
?>
