<?php
class ConexionServer{
    static function conexionphp()
    {
        /* Este código establece una conexión a una base de datos MySQL utilizando PDO (objetos de
        datos PHP). */
        $server = "localhost";
        $user = "";
        $pass = "";
        $db = "noticiasgamer";
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