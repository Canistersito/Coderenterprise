<?php
$bdhost = "localhost";
$bdusuario = "root";
$bdpass = "";
$bdnombre = "TinckerBell";

$conectar = new mysqli($bdhost, $bdusuario, $bdpass, $bdnombre);

if ($conectar->connect_error) {
    die("Error de conexión: " . $conectar->connect_error);
}

$CI = $_POST["CI"];
$contraseña = $_POST["contraseña"];
$contraseña2 = $_POST["contraseña2"];

if (empty($CI) || empty($contraseña) || empty($contraseña2)) {
    echo "<p>Por favor, completa todos los campos.</p>";
} else {

    $sql = "SELECT * FROM usuario WHERE CI = '$CI' AND Contraseña IS NULL";
    $result = $conectar->query($sql);

    if ($result->num_rows > 0) {
      
        if ($contraseña == $contraseña2) {
          
            $sql_update = "UPDATE usuario SET Contraseña='$contraseña2' WHERE CI='$CI'";
            if ($conectar->query($sql_update) === TRUE) {
                header("Location: /CoderEnterprise/Formulario2/src/index.html");
                exit();
            } else {
                echo "Error al actualizar la contraseña";
            }
        } else {
            echo "Las contraseñas no coinciden";
        }
    } else {
        echo "El CI no existe o ya tiene una contraseña.";
    }
}

$conectar->close();
?>
