<?php
session_start();
if (isset($_SESSION['usuario'])) {
    // Si el usuario ya está logueado, redirigir al área correspondiente
    if ($_SESSION['rol'] == 'Administrador') {
        header("Location: admin.php");
    } else {
        header("Location: usuari.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color: red;'>Usuario o contraseña incorrectos.</p>";
    }
    ?>
    <form action="process_login.php" method="POST">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        
        <label for="contrasenya">Contraseña:</label>
        <input type="password" id="contrasenya" name="contrasenya" required><br>
        
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
