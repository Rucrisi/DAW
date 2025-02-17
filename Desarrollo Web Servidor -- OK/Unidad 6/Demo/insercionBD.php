<?php
	require("conexionBD.php");
	if (!isset($_GET['nombre']) || !isset($_GET['apellidos']) || !isset($_GET['fecha_nacimiento'])) {
		exit;
	}
	$sql = "INSERT INTO `alumnos` (`nombre`, `apellidos`, `fecha_nacimiento`) VALUES ('" . $_GET['nombre'] . "', '" . $_GET['apellidos'] . "', '". $_GET['fecha_nacimiento'] . "')";
	if (mysqli_query($conn, $sql)) {
 	echo "Se ha añadido un nuevo alumno.";
	} else {
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>