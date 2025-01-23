<?php
session_start();
require_once('config.php'); // Conexión a la base de datos

// Verificar si el usuario está logueado y tiene el rol de 'Usuari'
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Usuari') {
    // Si no está logueado o no es un usuario, redirigir al login
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titol = filter_var($_POST['titol'], FILTER_SANITIZE_STRING);
    $descripcio = filter_var($_POST['descripcio'], FILTER_SANITIZE_STRING);

    // Insertar la nueva nota en la base de datos
    try {
        $stmt = $conn->prepare("INSERT INTO notes (titol, descripcio, data_creacio) VALUES (:titol, :descripcio, NOW())");
        $stmt->bindParam(':titol', $titol, PDO::PARAM_STR);
        $stmt->bindParam(':descripcio', $descripcio, PDO::PARAM_STR);
        $stmt->execute();

        // Si la nota se ha agregado correctamente, mostrar un mensaje de éxito y el botón de volver atrás
        echo "<p>Nota agregada correctamente.</p>";
        echo "<button onclick=\"window.history.back();\">Volver</button>";

    } catch (PDOException $e) {
        echo "<p>Error al agregar la nota: " . $e->getMessage() . "</p>";
    }
}
?>
