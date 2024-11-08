<?php
include('Conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinckerBell Music App</title>
    <link rel="stylesheet" href="estilo.css">
    
</head>

<body>
    
    <main id="contenido-principal">
        <header id="encabezado">
            <div class="logo">
                <h2>tinckerbell</h2>
                <p>M u s i c A p p</p>
            </div>
            <div class="home">
                <h2>Votación</h2>
                <input type="text" placeholder="Busca tus canciones favoritas">
                <div class="icono dropdown">
                    <img src="../img/book-bookmark-regular-36.png" alt="Icono guardar">
                    <p>Género</p>
                    <div class="dropdown-content">
                        <a href="#">Rock</a>
                        <a href="#">Pop</a>
                        <a href="#">Reggaeton</a>
                        <a href="#">Salsa</a>
                        <a href="#">Trap</a>
                        <a href="#">Dembou</a>

                    </div>
                </div>
                <form action="/CoderEnterprise/Conexion/Loggout.php">
                    <div class="icono"><button><img src="../img/exit-regular-36.png" alt="Icono historial">
                    
                            <p> Salir</p>
                        </button>
                    </div>
                </form>
                <div class="icono"><img src="../img/calendar-star-regular-36.png" alt="Icono configuración">
                    <p>Eventos</p>
                </div>
            </div>
            <div class="perfil-usuario">
                <img src="../img/usuario.png" alt="Usuario">
                <div>
                    <p id="usuario">Nombre usuario</p>
                    <p>Descripción de usuario</p>
                </div>
            </div>
        </header>
        <article id="contenido">
            <div id="selecciona">
                <h2>Selecciona</h2>
            </div>
            <section id="selecciones">
            <section id="selecciones">
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $rutaImagen = "/CoderEnterprise/Administrador/src/" . htmlspecialchars($fila['Foto']);
                    echo '<div class="tarjeta">';
                    echo '<img src="' . htmlspecialchars($rutaImagen) . '" alt="Imagen de la canción">';
                    echo '<p class="minutos">' . htmlspecialchars($fila['Duracion']) . '</p>';
                    echo '<img class="reloj" src="../img/time-five-regular-24.png" alt="Ícono de reloj">';
                    echo '<p class="nombre">' . htmlspecialchars($fila['NombreCancion']) . ' - ' . htmlspecialchars($fila['Autor']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay canciones disponibles.</p>";
            }
            ?>
        </section>
                </div>
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <img src="'$fila['Foto'].'" width="80" height="auto">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
            </section>
            <div id="recreo">
                <h2>Siguiente recreo en:</h2>
            </div>
            <div id="vivo">
                <button>Votaciones en vivo</button>
                <h2>E N</h2>
                <h2 class="rojo">V I V O</h2>
            </div>
            <section id="votadas">
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
                <div class="tarjeta">
                    <img src="../img/cancion.jpeg" alt="">
                    <p id="minutos">4:17</p>
                    <img id="reloj" src="../img/time-five-regular-24.png" alt="">
                    <p id="nombre">Escuchar Tu Voz - Pablo Olivares</p>
                </div>
            </section>
        </article>
    </main>
    <script>
   
 
 
