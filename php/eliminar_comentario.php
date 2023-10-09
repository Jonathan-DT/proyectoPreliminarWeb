<?php
// Requiere el archivo de conexión a la base de datos
require_once('database/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id']) && is_numeric($_POST['comment_id'])) {
    // Obtén el ID del comentario a eliminar
    $comment_id = $_POST['comment_id'];
    $article_id = $_POST['article_id'];

    // $host= $_SERVER["HTTP_HOST"];
    // $uri= $_SERVER["REQUEST_URI"];
    // $url = "https://" .  $uri;

    // $url = "https://testurl.com/test/1234?email=abc@test.com&name=sarah";
    // $components = parse_url($url);
    // parse_str($components['query'], $results);
    
    


    // Realiza una consulta SQL para eliminar el comentario
    $sql = "DELETE FROM comentarios WHERE noticia_id = $comment_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: func/noticia_completa.php?id=".$article_id); // Redirige de nuevo a la página de la noticia completa
        exit;
    } else {
        echo 'Error al eliminar el comentario: ' . $conn->error;
    }
} else {
    echo 'Solicitud no válida.';
}

// Cierra la conexión a la base de datos
$conn->close();
?>
