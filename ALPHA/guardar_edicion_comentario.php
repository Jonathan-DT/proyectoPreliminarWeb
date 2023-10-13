<?php
require('header.php');
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id']) && is_numeric($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];

    // Verificar si el usuario está logeado y tiene permiso para editar el comentario
    if (isset($_SESSION['nombre_usuario'])) {
        $nombre_usuario = $_SESSION['nombre_usuario'];

        // Consulta la base de datos para obtener el comentario específico
        $sql = "SELECT * FROM comentarios WHERE comentario_id = ? AND nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $comment_id, $nombre_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $edited_comment = $_POST['edited_comment'];

            // Actualizar el comentario en la base de datos
            $sql_update = "UPDATE comentarios SET comentario = ? WHERE comentario_id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("si", $edited_comment, $comment_id);

            if ($stmt_update->execute()) {
                // Comentario editado exitosamente, redirige a la página de la noticia
                $commentData = $result->fetch_assoc();
                header("Location: noticia_completa.php?id=" . $commentData['noticia_id']);
                exit;
            } else {
                echo 'Hubo un error al editar el comentario. Por favor, inténtalo de nuevo.';
            }

            $stmt_update->close();
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
