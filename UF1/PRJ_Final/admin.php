<?php
session_start();

// Verificar si el usuario está logueado y tiene el rol de 'Administrador'
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    // Si no está logueado o no es administrador, redirigir al login
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
    $errors[] = "Error al obtener las notas: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pàgina Administrador</title>
</head>
<body>
    <h2>Benvingut, <?php echo htmlspecialchars($usuario); ?>! Permís de gestió.</h2>
    
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
    
    <div>
        <h3>Afegir una nova nota</h3>
        <form method="POST" action="process_note.php">
            <label for="titol">Títol:</label><br>
            <input type="text" id="titol" name="titol" required><br><br>

            <label for="descripcio">Descripció:</label><br>
            <textarea id="descripcio" name="descripcio" rows="4" cols="50" required></textarea><br><br>

            <button type="submit">Afegir Nota</button>
        </form>
    </div>

    <!-- Enlace para cerrar sesión -->
    <a href="logout.php">Tancar sessió</a>
</body>
</html>
