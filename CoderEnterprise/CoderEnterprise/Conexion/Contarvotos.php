<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "TinckerBell");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Calcular el total de votos sumando el atributo Voto de todas las canciones
$consultaTotalVotos = "SELECT SUM(Voto) AS TotalVotos FROM Cancion";
$resultadoTotal = $conexion->query($consultaTotalVotos);
$totalVotos = $resultadoTotal->fetch_assoc()['TotalVotos'];

// Obtener el nombre, autor, votos y porcentaje de cada canción
$consultaCanciones = "
    SELECT NombreCancion, Autor, Voto,
           (Voto / $totalVotos) * 100 AS Porcentaje
    FROM Cancion
    ORDER BY Voto DESC
";
$resultadoCanciones = $conexion->query($consultaCanciones);

// Mostrar resultados
echo "<table>
        <tr>
            <th>Canción</th>
            <th>Autor</th>
            <th>Votos</th>
            <th>Porcentaje</th>
        </tr>";

while ($fila = $resultadoCanciones->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['NombreCancion']}</td>
            <td>{$fila['Autor']}</td>
            <td>{$fila['Voto']}</td>
            <td>" . number_format($fila['Porcentaje'], 2) . "%</td>
          </tr>";
}

echo "</table>";

// Mostrar la canción más votada
$resultadoCanciones->data_seek(0); // Volver al inicio del conjunto de resultados
$cancionMasVotada = $resultadoCanciones->fetch_assoc();
echo "<p>La canción más votada es: " . $cancionMasVotada['NombreCancion'] . 
     " de " . $cancionMasVotada['Autor'] . 
     " con " . $cancionMasVotada['Voto'] . " votos (" . 
     number_format($cancionMasVotada['Porcentaje'], 2) . "%).</p>";

// Cerrar conexión
$conexion->close();
?>
