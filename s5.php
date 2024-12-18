<?php
// EJERCICIO 1: Procesar datos del formulario (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    echo "<h2>Datos recibidos (POST):</h2>";
    echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
    echo "Correo electrónico: " . htmlspecialchars($email) . "<br>";
    echo "Mensaje: " . nl2br(htmlspecialchars($mensaje)) . "<br><br>";
}

// EJERCICIO 2: Procesar archivo subido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];
    $nombre_archivo = $archivo['name'];
    $tipo_archivo = $archivo['type'];
    $tamano_archivo = $archivo['size'];
    $directorio_destino = "uploads/";

    // Verificar si el archivo es de tipo imagen (JPG, PNG, GIF)
    $tipos_validos = ['image/jpeg', 'image/png', 'image/gif'];

    if (in_array($tipo_archivo, $tipos_validos)) {
        // Mover el archivo subido a la carpeta "uploads"
        $ruta_destino = $directorio_destino . basename($nombre_archivo);
        
        if (move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {
            echo "<h2>Archivo subido con éxito:</h2>";
            echo "Nombre del archivo: " . htmlspecialchars($nombre_archivo) . "<br>";
            echo "Tipo de archivo: " . htmlspecialchars($tipo_archivo) . "<br>";
            echo "Tamaño del archivo: " . number_format($tamano_archivo / 1024, 2) . " KB<br>";
        } else {
            echo "Error al subir el archivo.<br>";
        }
    } else {
        echo "Error: solo se permiten archivos de tipo JPG, PNG y GIF.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 1 y 2</title>
</head>
<body>

    <h1>EJERCICIO 1</h1>

    <!-- Formulario que envía los datos mediante el método POST -->
    <form action="s5.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" required></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>

    <br>

    <!-- Enlace que se generará dinámicamente con los datos del formulario -->
    <a id="enlace-get" href="#">Enviar datos por GET</a>

    <script>
        // capturamos los datos del formulario y construir el enlace GET dinámicamente
        document.querySelector('form').addEventListener('input', function () {
            const nombre = encodeURIComponent(document.getElementById('nombre').value);
            const email = encodeURIComponent(document.getElementById('email').value);
            const mensaje = encodeURIComponent(document.getElementById('mensaje').value);

            const enlace = `s5.php?nombre=${nombre}&email=${email}&mensaje=${mensaje}`;
            document.getElementById('enlace-get').setAttribute('href', enlace);
        });
    </script>

    <hr>

    <h1>EJERCICIO 2</h1>

    <!-- formulario para subir un archivo -->
    <form action="s5.php" method="POST" enctype="multipart/form-data">
        <label for="archivo">Selecciona un archivo:</label>
        <input type="file" id="archivo" name="archivo" required><br><br>
        <button type="submit" name="subir_archivo">Subir archivo</button>
    </form>

    <hr>

    <h1>EJERCICIO 3</h1>

    <!-- informacion del servidor -->
    <?php
    echo "Nombre del servidor: " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "Dirección IP del servidor: " . $_SERVER['SERVER_ADDR'] . "<br>";
    echo "Agente del usuario (navegador): " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
    echo "Ruta del script actual: " . $_SERVER['SCRIPT_NAME'] . "<br>";
    ?>

</body>
</html>
