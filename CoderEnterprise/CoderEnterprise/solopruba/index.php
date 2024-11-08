<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "TinckerBell");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener los enlaces de las fotos
$sql = "SELECT Fotos FROM Cancion";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Visualización de Imágenes</title>
</head>
<body>

<section id="imagenes">
    <?php
    // Comprobar si hay resultados y mostrarlos
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            // Construir la ruta completa de la imagen
            $rutaImagen = __DIR__ . '/archivo/fotos/' . htmlspecialchars($fila['Fotos']);

            // Verificar si el archivo existe
            if (file_exists($rutaImagen)) {
                echo '<img src="/archivo/fotos/' . htmlspecialchars($fila['Fotos']) . '" alt="Imagen de la canción" width="150" height="auto">';
            } else {
                echo '<p>La imagen ' . htmlspecialchars($fila['Foto']) . ' no se encuentra en el servidor.</p>';
            }
        }
    } else {
        echo "<p>No hay imágenes disponibles.</p>";
    }
    ?>
</section>

</body>
</html>

<?php
// Cerrar la conexión
$conexion->close();
?>
