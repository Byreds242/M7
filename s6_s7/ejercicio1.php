
<?php
// Inicia la sesión
session_start();

// Si no existe la variable de sesión, inicialízala
if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 1; // Primera visita
    $mensaje = "¡Bienvenido/a! Esta es tu primera visita durante esta sesión.";
} else {
    // Incrementa el contador de visitas
    $_SESSION['visitas']++;
    $mensaje = "¡Bienvenido/a de nuevo! Esta es tu visita número {$_SESSION['visitas']} durante esta sesión.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
</head>
<body>
    <h1>Contador de Visitas</h1>
    <p><?php echo $mensaje; ?></p>
    <a href="/M7/s6_s7/ejercicio1.php">Actualizar página</a>
</body>
</html>

