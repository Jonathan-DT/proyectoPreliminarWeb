<?php
require('../../assets/layouts/header_layout.php'); 
require_once('../database/database.php'); // Incluye el archivo de conexión a la base de datos

// Comprueba si se ha enviado una consulta de búsqueda
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    // Consulta SQL para buscar noticias que coincidan con el título o la descripción
    $sqli = "SELECT * FROM noticias WHERE titulo LIKE '%$search%' OR descripcion LIKE '%$search%'";
    $result = $conn->query($sqli);
    
    // Muestra los resultados de la búsqueda
    if ($result->num_rows > 0) {
        echo '<div class="container">';
        echo '<h2>Resultados de la búsqueda:</h2>';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['titulo'] . '</h5>';
            echo '<p class="card-text">' . $row['descripcion'] . '</p>';
            echo '<a href="noticia_completa.php?id=' . $row['id'] . '">Leer más</a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<p>No se encontraron resultados.</p>';
        echo '</div>';
    }
    //liberar memoria y cerrar conn
    mysqli_free_result($result);
    $conn->close();
}

require('../script.php');
?>
