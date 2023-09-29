<?php
require_once('database.php'); // Asegúrate de incluir la conexión a la base de datos en este archivo

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comentario']) && isset($_POST['article_id'])) {
    $article_id = $_POST['article_id'];
    $comentario = $_POST['comentario'];

    // Validación y sanitización (debes implementar esto adecuadamente)

    $sql = "INSERT INTO comentarios (noticia_id, comentario) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $article_id, $comentario);

    if ($stmt->execute()) {
        header("Location: noticia_completa.php?id=$article_id"); // Redirige de nuevo a la página de la noticia completa
        exit;
    } else {
        echo 'Hubo un error al agregar el comentario. Por favor, inténtalo de nuevo.';
    }

    $stmt->close();
}

$conn->close();
?>
