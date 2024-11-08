<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "TinckerBell");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Verificar que se hayan subido tanto el archivo de música como la imagen
    if (isset($_FILES['archivo']) && isset($_FILES['foto']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        
        // Subir el archivo de música
        $directorioMusica = 'archivos/musica/';
        if (!is_dir($directorioMusica)) {
            mkdir($directorioMusica, 0777, true);
        }
        
        $archivoTmp = $_FILES['archivo']['tmp_name'];
        $nombreArchivo = basename($_FILES['archivo']['name']);
        $rutaArchivoMusica = $directorioMusica . $nombreArchivo;

        // Subir la imagen
        $directorioImagen = 'archivo/Fotos/';
        if (!is_dir($directorioImagen)) {
            mkdir($directorioImagen, 0777, true);
        }

        $imagenTmp = $_FILES['foto']['tmp_name'];
        $nombreImagen = basename($_FILES['foto']['name']);
        $rutaArchivoImagen = $directorioImagen . $nombreImagen;

        // Mover los archivos a los directorios de destino
        if (move_uploaded_file($archivoTmp, $rutaArchivoMusica) && move_uploaded_file($imagenTmp, $rutaArchivoImagen)) {
            
            // Obtener los detalles de la canción
            $autor =$_POST['autor'];
            $nombreCancion =$_POST['nombrecancion'];
            $duracion =$_POST['duracion'];
            
            // Insertar los datos en la base de datos
            $sql = "INSERT INTO Cancion (NombreCancion, Autor, Duracion, RutaMusica, Foto) 
                    VALUES ('$nombreCancion', '$autor', '$duracion', '$rutaArchivoMusica', '$rutaArchivoImagen')";

            // Ejecutar la consulta
            if ($conexion->query($sql) === TRUE) {
                echo "¡Datos de la canción y la imagen subidos correctamente!";
            } else {
                echo "Error al insertar los datos en la base de datos: " . $conexion->error;
            }
        } else {
            echo "Error al mover los archivos al directorio de destino.";
        }
    } else {
        echo "Error: Debes seleccionar tanto un archivo de música como una imagen.";
    }
}

// Cerrar la conexión
$conexion->close();
?>
