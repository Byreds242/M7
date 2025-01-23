<?php
require_once 'config.php'; // Conexión a la base de datos

// Inicializar variables
$errors = [];
$success = "";
$notes = [];

// Procesar el formulario al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titol = isset($_POST['titol']) ? htmlspecialchars(trim($_POST['titol'])) : '';
    $descripcio = isset($_POST['descripcio']) ? htmlspecialchars(trim($_POST['descripcio'])) : '';

    // Validar campos
    if (empty($titol)) {
        $errors[] = "El camp 'Títol' és obligatori.";
    }
    if (empty($descripcio)) {
        $errors[] = "El camp 'Descripció' és obligatori.";
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errors)) {
        try {
            $stmt = $conn->prepare("INSERT INTO notes (titol, descripcio) VALUES (:titol, :descripcio)");
            $stmt->bindParam(':titol', $titol);
            $stmt->bindParam(':descripcio', $descripcio);
            $stmt->execute();
            $success = "La nota s'ha inserit correctament.";
        } catch (PDOException $e) {
            $errors[] = "Error al inserir la nota: " . $e->getMessage();
        }
    }
}

// Obtener todas las notas para mostrarlas
try {
    $stmt = $conn->query("SELECT * FROM notes ORDER BY data_creacio DESC");
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $errors[] = "Error al obtenir les notes: " . $e->getMessage();
}

// Mostrar mensajes y notas
echo '<div id="messages">';
if (!empty($errors)) {
    echo '<div class="error">' . implode('<br>', $errors) . '</div>';
}
if (!empty($success)) {
    echo '<div class="success">' . $success . '</div>';
}
echo '</div>';

echo '<div id="notes">';
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
echo '</div>';
?>
