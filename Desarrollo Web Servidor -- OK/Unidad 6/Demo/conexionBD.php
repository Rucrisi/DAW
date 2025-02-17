<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "Instituto";

// Creamos una conexión y la guardamos en la variable $conn

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificamos la conexión

if (!$conn) {

     die("Error en la conexión: " . mysqli_connect_error());

}

echo "Conexión realizada";

?>