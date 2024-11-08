<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "TinckerBell");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener los enlaces de las fotos
$sql = "SELECT NombreCancion, Autor, Duracion, RutaMusica, Foto FROM Cancion";
$resultado = $conexion->query($sql);

?>
