<?php
require('header.php');
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id']) && is_numeric($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];

    // Verificar si el usuario está logeado y tiene permiso para eliminar el comentario
    if (isset($_SESSION['nombre_usuario'])) {
        $nombre_usuario = $_SESSION['nombre_usuario'];

        // Consulta la base de datos para obtener el comentario específico
        $sql = "SELECT * FROM comentarios WHERE comentario_id = ? AND nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $comment_id, $nombre_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // El comentario existe y pertenece al usuario logeado, elimínalo
            $sql_delete = "DELETE FROM comentarios WHERE comentario_id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $comment_id);

            if ($stmt_delete->execute()) {
                // Comentario eliminado exitosamente, redirige a la página de la noticia
                header("Location: noticia_completa.php?id=" . $commentData['noticia_id']);
                exit;
            } else {
                echo 'Hubo un error al eliminar el comentario. Por favor, inténtalo de nuevo.';
            }

            $stmt_delete->close();
        } else {
            echo 'No tienes permiso para eliminar este comentario.';
        }
    } else {
        echo 'Debes estar logeado para eliminar un comentario.';
    }
} else {
    echo 'Solicitud no válida.';
}

$conn->close();

require('footer.php');
require('script.php');

?>
