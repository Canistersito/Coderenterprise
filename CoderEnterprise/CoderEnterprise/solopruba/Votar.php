<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="Votar.php" method="POST">
    <label for="nombreCancion">Nombre de la Canción:</label>
    <input type="text" name="nombreCancion" required>
    
    <label for="autorCancion">Autor de la Canción:</label>
    <input type="text" name="autorCancion" required>
    
    <button type="submit">Votar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "TinckerBell");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Variables recibidas del formulario o solicitud
    $nombreCancion = $_POST['nombreCancion'];  // Nombre de la canción
    $autorCancion = $_POST['autorCancion'];    // Autor de la canción

    // Comprobar si la canción existe
    $consultaCancion = "SELECT Voto FROM Cancion WHERE NombreCancion = ? AND Autor = ?";
    $stmt = $conexion->prepare($consultaCancion);
    $stmt->bind_param("ss", $nombreCancion, $autorCancion);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Si la canción existe, incrementar el atributo Voto en 1
        $actualizarVoto = "UPDATE Cancion SET Voto = Voto + 1 WHERE NombreCancion = ? AND Autor = ?";
        $stmtUpdate = $conexion->prepare($actualizarVoto);
        $stmtUpdate->bind_param("ss", $nombreCancion, $autorCancion);

        if ($stmtUpdate->execute()) {
            echo "¡Voto registrado exitosamente para la canción $nombreCancion de $autorCancion!";
        } else {
            echo "Error al registrar el voto: " . $stmtUpdate->error;
        }
        $stmtUpdate->close();
    } else {
        // Mostrar mensaje de error solo si la canción no existe después de enviar el formulario
        echo "La canción no existe en la base de datos.";
    }

    $stmt->close();
    $conexion->close();
}
?>

</body>
</html>
