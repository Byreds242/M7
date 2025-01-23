<?php
require_once 'config.php'; // Conexión a la base de datos

// Verificar si la base de datos existe, si no, crearla
try {
    // Crear base de datos si no existe
    $conn->exec("CREATE DATABASE IF NOT EXISTS sistema_acces");
    echo "Base de dades creada correctament.<br>";

    // Seleccionar la base de datos
    $conn->exec("USE sistema_acces");

    // Crear la tabla 'usuaris' si no existe
    $conn->exec("CREATE TABLE IF NOT EXISTS usuaris (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom_usuari VARCHAR(50) NOT NULL UNIQUE,
        contrasenya VARCHAR(255) NOT NULL,
        rol ENUM('Administrador', 'Usuari') NOT NULL
    )");
    echo "Taula 'usuaris' creada correctament.<br>";

    // Comprobar si el usuario 'admin' ya existe
    $query = "SELECT * FROM usuaris WHERE nom_usuari = :nom_usuari";
    $stmt = $conn->prepare($query);
    $stmt->execute([':nom_usuari' => 'admin']);
    $adminExists = $stmt->fetch();

    // Comprobar si el usuario 'usuari' ya existe
    $stmt->execute([':nom_usuari' => 'usuari']);
    $userExists = $stmt->fetch();

    // Si el usuario 'admin' no existe, lo insertamos
    if (!$adminExists) {
        $passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
        $conn->query("INSERT INTO usuaris (nom_usuari, contrasenya, rol) VALUES ('admin', '$passwordAdmin', 'Administrador')");
    }

    // Si el usuario 'usuari' no existe, lo insertamos
    if (!$userExists) {
        $passwordUser = password_hash("user123", PASSWORD_DEFAULT);
        $conn->query("INSERT INTO usuaris (nom_usuari, contrasenya, rol) VALUES ('usuari', '$passwordUser', 'Usuari')");
    }

    echo "Base de dades i usuaris inicials creats correctament.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
