<?php
$bdhost = "localhost";
$bdusuario = "root";
$bdpass = "";
$bdnombre = "TinckerBell";

$conectar = new mysqli($bdhost, $bdusuario, $bdpass, $bdnombre);

if ($conectar->connect_error) {
    die("No hay conexión: " . $conectar->connect_error);
}

$cedula = $_POST["Cedula1"];
$pass = $_POST["Tspass"];
$error = '';

if (empty($cedula) || empty($pass)) {
    echo "Por favor, completa todos los campos.";
    exit; // Detiene la ejecución aquí
} else {
    $query = "SELECT * FROM administrador WHERE Cedula='$cedula' AND Contraseña='$pass'";
    $resultado1 = $conectar->query($query);

    if ($resultado1 && $resultado1->num_rows == 1) {
        header("Location: /CoderEnterprise/ ");
        exit;
    } else {
        $query = "SELECT * FROM usuario WHERE CI='$cedula' AND Contraseña='$pass'";
        $result = $conectar->query($query);

        if ($result && $result->num_rows == 1) {
            header("Location: /CoderEnterprise/Votacion/src/index.php");
            exit;
        } else {
            echo "Usuario o contraseña incorrectos";
            exit; // Detiene la ejecución aquí
     
        }
        
    }
}


?>
