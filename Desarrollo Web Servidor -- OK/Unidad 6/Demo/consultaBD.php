<?php
	require("conexionBD.php");
	$sql = "SELECT * FROM Alumnos";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	 // datos de cada fila
	 while($row = mysqli_fetch_assoc($result)) {
	 echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " " . $row["apellidos"]. " - Fecha de nacimiento: " . $row["fecha_nacimiento"] . "<br>";
	 }
	} else {
	 echo "No hay resultados.";
	}
?>