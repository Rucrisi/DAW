<?php
session_start();

$_SESSION['nombre'] = 'Ruben';
$_SESSION['fecha_nacimiento'] = '13-07-1991';
$_SESSION['lugar'] = 'Valencia';

echo "Datos personales guardados en la sesión.";
?>
<!DOCTYPE html>
<html>
	<body>
    <br>
	<a href="./nombre.php">Conoce tu nombre</a><br>
    <a href="./fecha.php">Conoce tu fecha de nacimiento</a><br>
    <a href="./lugar.php">Conoce donde vives</a>
	</body>
</html>