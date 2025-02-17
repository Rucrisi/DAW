<?php
// Inicializamos variables
$error = "";
$resultado = "";
$fechaNacimiento = "";

// Configuramos el cliente SOAP
$url = "http://localhost/calculoEdad/calculate_age.php";
$uri = "http://localhost/calculoEdad";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));


// Procesamos el formulario
if (isset($_POST['calcular'])) {
    if (!empty($_POST['fecha_nacimiento'])) {
        $fechaNacimiento = $_POST['fecha_nacimiento'];

        try {
            // Llamamos a la función del servicio SOAP
            $edad = $cliente->calcularEdad($fechaNacimiento);
            $resultado = "La edad calculada es: $edad años.";
        } catch (Exception $e) {
            $error = "Error al conectar con el servicio: " . $e->getMessage();
        }
    } else {
        $error = "Por favor, introduce una fecha de nacimiento válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Edad - SOAP</title>
</head>
<body>
    <h1>Calculadora de Edad</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php" method="post">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="<?php echo $fechaNacimiento; ?>" required>
        <button type="submit" name="calcular">Calcular Edad</button>
    </form>

    <p style="color: red;"><?php echo $error; ?></p>
    <p style="font-weight: bold; color: green;"><?php echo $resultado; ?></p>
</body>
</html>
