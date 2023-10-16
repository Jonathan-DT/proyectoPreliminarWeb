<?php
require "/var/www/html/noticias/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("/var/www/html/noticias/");
$dotenv->load();
// Configuración de la conexión a la base de datos
$server = $_ENV['DB_SERVER'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db = $_ENV['DB_NAME'];

// Crear conexión
$conn = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
