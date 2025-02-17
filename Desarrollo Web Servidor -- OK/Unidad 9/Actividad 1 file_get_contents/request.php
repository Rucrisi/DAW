<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $latitud = trim($_POST["latitud"]);
    $longitud = trim($_POST["longitud"]);

    // URL para la API de Wikimedia
    $url = "https://commons.wikimedia.org/w/api.php?action=query&format=json&prop=coordinates|pageimages&generator=geosearch&ggscoord={$latitud}|{$longitud}&ggsradius=1000&ggslimit=5&pithumbsize=800";

    // Realizar la solicitud HTTP usando file_get_contents
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Verificar que la respuesta contiene las imágenes
    if (isset($data["query"])) {
        $imagenes = [];
        foreach ($data["query"]["pages"] as $page) {
            if (isset($page["thumbnail"]["source"])) {
                // Añadir la imagen al array y eliminar las barras invertidas si es necesario
                $imagenes[] = stripslashes($page["thumbnail"]["source"]);
            }
        }

        // Mostrar las imágenes si existen
        if (!empty($imagenes)) {
            echo "<h1 style='text-align: center; font-size: 3em;'>Imágenes de la ciudad</h1>";
            // Abrimos el contenedor flex antes del bucle
            echo "<div style='display: flex; justify-content: center; flex-wrap: nowrap; gap: 20px;'>";

            // Recorremos las imágenes y las mostramos
            foreach ($imagenes as $img) {
                echo "<img src='$img' alt='Imagen de la ciudad' style='width: 400px; height: auto; border-radius: 10px;'>";
            }

            // Cerramos el contenedor flex después del bucle
            echo "</div>";
        } else {
            echo "<p>No se encontraron imágenes.</p>";
        }

    } else {
        echo "<p>No se encontraron resultados para las coordenadas proporcionadas.</p>";
    }
}
?>
