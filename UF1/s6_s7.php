<?php
// Comprova si s'ha enviat el formulari per canviar el color
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color_fons = $_POST['color']; // Obté el color seleccionat per l'usuari
    setcookie('color_fons', $color_fons, time() + 86400, "/"); // Desa la cookie per 1 dia (86400 segons)
    header("Location: s6_s7.php"); // Redirigeix perquè es recarregui amb la cookie aplicada
    exit;
} else {
    // Comprova si hi ha una cookie que emmagatzema el color de fons
    if (isset($_COOKIE['color_fons'])) {
        $color_fons = $_COOKIE['color_fons']; // Assigna el color de fons des de la cookie
    } else {
        $color_fons = 'white'; // Color de fons per defecte si no hi ha cap cookie
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color de Fons Aplicat</title>
</head>
<body style="background-color: <?php echo $color_fons; ?>;">

    <h1>El color de fons s'ha aplicat!</h1>
    <p>El color de fons actual és: <strong><?php echo ucfirst($color_fons); ?></strong></p>

    <a href="index.php">Torna a canviar el color</a>

</body>
</html>
