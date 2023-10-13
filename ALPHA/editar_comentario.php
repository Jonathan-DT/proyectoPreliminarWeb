<?php
require('header.php');
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id']) && is_numeric($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];

    // Verificar si el usuario está logeado y tiene permiso para editar el comentario
    if (isset($_SESSION['nombre_usuario'])) {
        $nombre_usuario = $_SESSION['nombre_usuario'];

        // Consulta la base de datos para obtener el comentario específico
        $sql = "SELECT * FROM comentarios WHERE comentario_id = $comment_id AND nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // El comentario existe y pertenece al usuario logeado, obtén sus datos
            $commentData = $result->fetch_assoc();
            $existingComment = $commentData['comentario'];

            // Mostrar el formulario de edición
            echo '<main>';
            echo '<div class="container">';
            echo '<div class="row justify-content-center">';
            echo '<div class="col-md-8">';
            echo '<h3>Editar Comentario:</h3>';
            echo '<form method="post" action="guardar_edicion_comentario.php">';
            echo '<input type="hidden" name="comment_id" value="' . $comment_id . '">';
            echo '<div class="form-group">';
            echo '<textarea class="form-control" name="edited_comment" rows="4">' . $existingComment . '</textarea>';
            echo '</div>';
            echo '<button type="submit" class="btn btn-primary">Guardar Cambios</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</main>';
        } else {
            echo 'No tienes permiso para editar este comentario.';
        }
    } else {
        echo 'Debes estar logeado para editar un comentario.';
    }
} else {
    echo 'Solicitud no válida.';
}

$conn->close();

require('footer.php');
require('script.php');

?>
