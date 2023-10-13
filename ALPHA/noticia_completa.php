<?php
require('header.php');
require_once('database.php');

// Verificar si se ha iniciado sesión
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

// Obtiene el ID del artículo desde la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $article_id = $_GET['id'];

    // Consulta la base de datos para recuperar el artículo completo
    $sql = "SELECT * FROM noticias WHERE id = $article_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Muestra la noticia
        echo '<main>';
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class=" text-center">';
        echo '<h2 class="news-title">' . $row['titulo'] . '</h2>';
        echo '</div>';
        echo '</div>';

        // Imagen grande que abarque la mayor parte de la pantalla
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-8 text-center">';
        echo '<img src="' . $row['imagen'] . '" class="img-fluid rounded" alt="' . $row['titulo'] . '">';
        echo '</div>';
        echo '</div>';

        // Descripción completa
        echo '<div class="row justify-content-center">';
        echo '<div class="gray-box">'; // Cuadro gris
        echo '<p class="news-description">' . $row['descripcion'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '</div>';
        echo '</main>';

        // Muestra los comentarios
        $sql = "SELECT * FROM comentarios WHERE noticia_id = $article_id ORDER BY fecha DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="container mt-4">';
            echo '<h3>Comentarios:</h3>';
            while ($comentario = $result->fetch_assoc()) {
                echo '<div class="row">';
                echo '<div class="col-md-12">';
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<p class="card-text">' . $comentario['comentario'] . '</p>';
                echo '<p class="card-text">' . $comentario['fecha'] . '</p>';

                // Verificar si el usuario está logeado y el comentario pertenece a él
                if (isset($id) && $id === $comentario['usuario_id']) {
                    // Botón para editar comentario
                    echo '<a class="btn btn-warning btn-sm" href="editar_comentario.php?comment_id=' . $comentario['comentario_id'] . '">Editar</a>';
                    
                    // Botón para eliminar comentario
                    echo '<a class="btn btn-danger btn-sm" href="eliminar_comentario.php?comment_id=' . $comentario['comentario_id'] . '">Eliminar</a>';
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<div class="container mt-4">';
            echo '<p>No hay comentarios aún.</p>';
            echo '</div>';
        }

        // Formulario para agregar comentarios (simplificado)
        echo '<div class="container mt-4">';
        echo '<h3>Agregar Comentario:</h3>';
        echo '<form method="post" action="procesar_comentario.php">';
        echo '<div class="form-group">';
        echo '<textarea class="form-control" name="comentario" rows="4" required></textarea>';
        echo '</div>';
        echo '<input type="hidden" name="article_id" value="' . $article_id . '">';
        echo '<button type="submit" class="btn btn-primary">Agregar Comentario</button>';
        echo '</form>';
        echo '</div>';
    } else {
        echo 'No se encontró la noticia.';
    }
} else {
    echo 'ID de noticia no válido.';
}

$conn->close();

require('footer.php');
require('script.php');
?>
