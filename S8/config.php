<?php
$host = 'localhost'; // Dirección del servidor de base de datos (por lo general localhost)
$dbname = 'sistema_acces'; // Nombre de la base de datos
$username = 'root'; // Tu nombre de usuario de la base de datos (por defecto en XAMPP es 'root')
$password = ''; // Tu contraseña de la base de datos (por defecto en XAMPP está vacía)

try {
    // Establecer la conexión con la base de datos usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar el modo de error para detectar problemas
} catch (PDOException $e) {
    // En caso de error, mostrar un mensaje
    echo "Conexión fallida: " . $e->getMessage();
}
?>
