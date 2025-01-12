<?php
session_start();

// Verificar si el usuario está logueado y tiene el rol de 'Usuari'
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Usuari') {
    // Si no está logueado o no es un usuario, redirigir al login
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Conexión a la base de datos
require_once 'config.php';

// Obtener todas las notas
try {
    $stmt = $conn->query("SELECT * FROM notes ORDER BY data_creacio DESC");
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Manejo de errores mejorado para evitar errores con pantalla en blanco
    $errors[] = "Error al obtener las notas: " . $e->getMessage();
    echo "<p>Error al cargar las notas.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pàgina d'Usuari</title>
</head>
<body>
    <h2>Benvingut, <?php echo htmlspecialchars($usuario); ?>! Permís de visualització.</h2>
    
    <div>
        <h3>Llista de Notes</h3>
        <div id="notes">
            <?php
            if (empty($notes)) {
                echo '<p>No hi ha notes disponibles.</p>';
            } else {
                foreach ($notes as $note) {
                    echo '<div class="note">';
                    echo '<h3>' . htmlspecialchars($note['titol']) . '</h3>';
                    echo '<p>' . htmlspecialchars($note['descripcio']) . '</p>';
                    echo '<small>Data de creació: ' . htmlspecialchars($note['data_creacio']) . '</small>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    
    <!-- Enlace para cerrar sesión -->
    <a href="logout.php">Tancar sessió</a>
</body>
</html>
