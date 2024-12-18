<?php
// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color_fondo = $_POST['color']; // Obtener el color seleccionado
    setcookie('color_fondo', $color_fondo, time() + 86400, "/"); // Guardar cookie por 1 día
} else {
    // Si hay una cookie, usar su valor; si no, usar blanco por defecto
    $color_fondo = $_COOKIE['color_fondo'] ?? 'white';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalizar Color de Fondo</title>
</head>
<body style="background-color: <?php echo $color_fondo; ?>;">

<h1>Selecciona tu color de fondo</h1>

<!-- Formulario para elegir el color -->
<form action="/M7/s6_s7/ejercicio2.php" method="POST">
    <label for="color">Elige un color:</label>
    <select name="color" id="color">
        <option value="white" <?php if ($color_fondo == 'white') echo 'selected'; ?>>Blanco</option>
        <option value="blue" <?php if ($color_fondo == 'blue') echo 'selected'; ?>>Azul</option>
        <option value="green" <?php if ($color_fondo == 'green') echo 'selected'; ?>>Verde</option>
        <option value="yellow" <?php if ($color_fondo == 'yellow') echo 'selected'; ?>>Amarillo</option>
    </select>
    <button type="submit">Cambiar Color</button>
</form>

</body>
</html>
