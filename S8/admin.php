<?php
session_start();

// Verificar si el usuario está logueado y tiene el rol de 'Administrador'
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    // Si no está logueado o no es un administrador, redirigir al login
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pàgina Administrativa</title>
</head>
<body>
    <h2>Benvingut, <?php echo htmlspecialchars($usuario); ?>! Permís de gestió.</h2>
    
    <!-- Enlace para cerrar sesión -->
    <a href="logout.php">Tancar sessió</a>
</body>
</html>
