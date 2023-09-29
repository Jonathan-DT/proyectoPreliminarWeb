<?php
// Requiere el archivo de conexión a la base de datos
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id']) && is_numeric($_POST['comment_id'])) {
    // Obtén el ID del comentario a eliminar
    $comment_id = $_POST['comment_id'];

    // Realiza una consulta SQL para eliminar el comentario
    $sql = "DELETE FROM comentarios WHERE noticia_id = $comment_id";
    if ($conn->query($sql) === TRUE) {
        echo 'El comentario se ha eliminado correctamente.';
    } else {
        echo 'Error al eliminar el comentario: ' . $conn->error;
    }
} else {
    echo 'Solicitud no válida.';
}

// Cierra la conexión a la base de datos
$conn->close();
?>
