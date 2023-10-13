<?php
require_once('database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comentario']) && isset($_POST['article_id'])) {
    if (isset($_SESSION['nombre_usuario'])) {
        $article_id = $_POST['article_id'];
        $comentario = $_POST['comentario'];
        $nombre_usuario = $_SESSION['nombre_usuario'];

        // Obtén el ID del usuario
        $sql = "SELECT id FROM usuarios WHERE nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id);
            $stmt->fetch();

            // Inserta el comentario asociado al usuario en la base de datos
            $sql = "INSERT INTO comentarios (usuario_id, noticia_id, comentario) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iis", $user_id, $article_id, $comentario);

            if ($stmt->execute()) {
                header("Location: noticia_completa.php?id=$article_id");
                exit;
            } else {
                echo 'Hubo un error al agregar el comentario. Por favor, inténtalo de nuevo.';
            }
        } else {
            echo 'No se pudo encontrar el ID del usuario.';
        }
    } else {
        echo 'Debes estar logeado para agregar un comentario.';
    }
}

$conn->close();

?>

