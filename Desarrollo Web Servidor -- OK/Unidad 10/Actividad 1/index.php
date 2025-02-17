<?php
// Conexión a la base de datos
$pdo = new PDO("mysql:host=localhost;dbname=moviles", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Obtener los móviles de la base de datos
$stmt = $pdo->query("SELECT * FROM moviles");
$moviles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Móviles</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="alternate" type="application/rss+xml" href="rss.php" title="Catálogo de Móviles RSS">
</head>
<body>
    <header>
        <h1>Catálogo de Móviles</h1>
    </header>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Tamaño</th>
                    <th>Precio (€)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($moviles as $movil): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($movil['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($movil['marca']); ?></td>
                        <td><?php echo htmlspecialchars($movil['tamaño']); ?> pulgadas</td>
                        <td><?php echo htmlspecialchars($movil['precio']); ?>€</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2025 Catálogo de Móviles  <a href="feed.php" target="_blank">-RSS Catalogo Moviles-</a></p>
    </footer>
</body>
</html>
