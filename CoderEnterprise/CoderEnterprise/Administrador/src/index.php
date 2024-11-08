<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>

<body>
    <article id="contenedor2">
        <header id="encabezado">
            <a href="/CoderEnterprise/Landing/src/index.html" id="flecha">
                <img src="/CoderEnterprise/Administrador/img/flecha.png" alt="flecha">
            </a>
            <div id="cuenta">
                <h1>SUBIR CANCIÓN <br> NUEVA</h1>
            </div>
            <div id="inicio">
                <h2>TinkerBell</h2>
                <div>
                    <p>M u s i c</p>
                    <p>A p p</p>
                </div>
            </div>
        </header>
        <form action="subir.php" method="POST" id="formulario" enctype="multipart/form-data">
            <div class="texts">
                <p id="nombre">Ingresa nombre</p>
                <input type="text" placeholder="Nombre" name="nombrecancion" required>
            </div>
            <div class="texts">
                <p id="autor">Ingresa autor</p>
                <input type="text" placeholder="Autor" name="autor" required>
            </div>
            <div class="texts">
                <p id="duracion">Ingresa duracion</p>
                <input type="text" placeholder="Duración" name="duracion" required>
            </div>
            <div class="texts">
                <p id="musica">Archivo de musica</p>
                <input type="file" name="archivo" required>
            </div>
            <div class="texts">
                <p id="portada">Portada</p>
                <input type="file" name="foto" required>
            </div>
            <div id="boton">
                <button>Subir Canción</button>
            </div>
            <div id="terminos">
                <p>Al presionar 'Crear', aceptas los <a href="">términos y condiciones</a> de esta aplicación</p>
            </div>
        </form>
    </article>
</body>
