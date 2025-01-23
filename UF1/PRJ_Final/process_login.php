<?php
session_start();
require_once('config.php'); // Conexión a la base de datos

// Verificar si se envió el formulario de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $contrasenya = filter_var($_POST['contrasenya'], FILTER_SANITIZE_STRING);

    // Consulta SQL segura utilizando prepared statements
    $stmt = $conn->prepare("SELECT id, nom_usuari, contrasenya, rol FROM usuaris WHERE nom_usuari = :usuario");
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->execute();
    
    // Verificar si el usuario existe
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si la contraseña es correcta
        if (password_verify($contrasenya, $row['contrasenya'])) {
            // Iniciar sesión y almacenar datos de usuario
            $_SESSION['usuario'] = $row['nom_usuari'];
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['id'] = $row['id'];

            // Redirigir según el rol
            if ($_SESSION['rol'] == 'Administrador') {
                header("Location: admin.php");
            } else {
                header("Location: usuari.php");
            }
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: login.php?error=1");
        exit();
    }
}
?>
