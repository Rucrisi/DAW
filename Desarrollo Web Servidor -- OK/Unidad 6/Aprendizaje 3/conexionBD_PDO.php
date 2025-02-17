<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'Instituto';
$username = 'root';
$password = '';

try {
    // Crear la conexión con PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurar PDO para lanzar excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Mensaje opcional para depuración
    // echo "Conexión exitosa con PDO.";
} catch (PDOException $e) {
    // Manejar el error de conexión
    die("Error de conexión: " . $e->getMessage());
}
?>
