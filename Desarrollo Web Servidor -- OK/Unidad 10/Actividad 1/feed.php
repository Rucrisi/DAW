<?php
// Conexión a la base de datos
$pdo = new PDO("mysql:host=localhost;dbname=moviles", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Generar RSS
header("Content-Type: application/rss+xml; charset=UTF-8");

echo "<?xml version='1.0' encoding='UTF-8' ?>";
echo "<rss version='2.0'><channel>";
echo "<title>Catálogo de Móviles</title>";
echo "<link>https://tuweb.com/feed</link>";
echo "<description>Listado de móviles disponibles en nuestra tienda</description>";
echo "<lastBuildDate>" . date(DATE_RSS) . "</lastBuildDate>";

$stmt = $pdo->query("SELECT * FROM moviles");
while ($movil = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<item>";
    echo "<title>{$movil['nombre']}</title>";
    echo "<link>https://tuweb.com/movil/{$movil['id']}</link>";
    echo "<description>Marca: {$movil['marca']}, Tamaño: {$movil['tamaño']}, Precio: {$movil['precio']}€</description>";
    echo "<pubDate>" . date(DATE_RSS) . "</pubDate>";
    echo "<guid>https://tuweb.com/movil/{$movil['id']}</guid>";
    echo "</item>";
}
echo "</channel></rss>";