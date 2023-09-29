<?php
// Requiere el archivo de conexión a la base de datos
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id']) && isset($_POST['edited_comment'])) {
    // Obtén los datos enviados desde el formulario de edición
    $comment_id = $_POST['comment_id'];
    $editedComment = $_POST['edited_comment'];

    // Actualiza el comentario en la base de datos
    $sql = "UPDATE comentarios SET comentario = '$editedComment' WHERE noticia_id = $comment_id";
    if ($conn->query($sql) === TRUE) {
        echo 'El comentario se ha actualizado correctamente.';
    } else {
        echo 'Error al actualizar el comentario: ' . $conn->error;
    }
} else {
    echo 'Solicitud no válida.';
}

// Cierra la conexión a la base de datos
$conn->close();
?>
