<?php

setcookie("nombre", "Ruben", time() + 3600, "/"); // 1 hora de duración
setcookie("fecha_nacimiento", "13-07-1991", time() + 3600, "/");
setcookie("lugar", "Valencia", time() + 3600, "/");

echo "Datos personales guardados en cookies.";
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