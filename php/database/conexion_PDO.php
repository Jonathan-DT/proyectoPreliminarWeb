<?php
require "/var/www/html/noticias/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable("/var/www/html/noticias/");
$dotenv->load();

class ConexionServer{
    static function conexionphp()
    {
        /* Este código establece una conexión a una base de datos MySQL utilizando PDO (objetos de
        datos PHP). */
        $server = $_ENV['DB_SERVER'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $db = $_ENV['DB_NAME'];
        try{
            $conexion = new PDO("mysql:hostname=$server;dbname=$db",$user,$pass);
            return $conexion;
        }
        catch(PDOException $error) {
            echo "Error de conexión: " . $error->getMessage();
        }
    }
}
?>