<?php
// Requiere el archivo de conexión a la base de datos
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id']) && is_numeric($_POST['comment_id'])) {
    // Obtén el ID del comentario a editar
    $comment_id = $_POST['comment_id'];

    // Realiza una consulta SQL para obtener el comentario existente
    $sql = "SELECT * FROM comentarios WHERE noticia_id = $comment_id";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // El comentario existe, obtén sus datos
        $commentData = $result->fetch_assoc();
        $existingComment = $commentData['comentario'];

        // Ahora puedes mostrar un formulario de edición para el comentario
        // Puedes usar el valor de $existingComment en un campo de texto para la edición
        echo '<form method="post" action="guardar_edicion_comentario.php">';
        echo '<input type="hidden" name="comment_id" value="' . $comment_id . '">';
        echo '<textarea name="edited_comment">' . $existingComment . '</textarea>';
        echo '<button type="submit">Guardar Cambios</button>';
        echo '</form>';
    } else {
        echo 'El comentario no existe.';
    }
} else {
    echo 'Solicitud no válida.';
}

// Cierra la conexión a la base de datos
$conn->close();
?>
