<?php
require('header.php'); // Incluye el encabezado común
require_once('database.php'); // Incluye el archivo de conexión a la base de datos

// Comprueba si se ha enviado una consulta de búsqueda
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    // Consulta SQL para buscar noticias que coincidan con el título o la descripción
    $sqli = "SELECT * FROM noticias WHERE titulo LIKE '%$search%' OR descripcion LIKE '%$search%'";
    $result = $conn->query($sqli);
    
    // Muestra los resultados de la búsqueda
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['titulo'] . '</h5>';
        
        $descripcion = $row['descripcion'];
        $primer_punto = strpos($descripcion, '.');
        if ($primer_punto !== false) {
            $descripcion_corta = substr($descripcion, 0, $primer_punto + 1); // Sumamos 1 para incluir el punto
            echo '<p class="card-text">' . $descripcion_corta . '</p>';
        } else {
            // Si no se encuentra un punto, simplemente muestra la descripción completa
            echo '<p class="card-text">' . $descripcion . '</p>';
        }
        
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


// A continuación, puedes agregar la sección de comentarios, registro e inicio de sesión.
// ...
// ...

require('script.php'); // Incluye el pie de página común
?>
