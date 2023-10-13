<?php require('assets/layouts/header_layout.php'); ?>

<body>
    <?php require('assets/layouts/carrousel_destacado_layout.php'); ?>

    <div style="padding: 150px;">
        <div class="container">
            <div class="row">
                <?php

                require_once('php/database/database.php'); // Incluye el archivo de conexión a la base de datos

                // Consulta SQL para obtener todas las noticias
                $sql = "SELECT * FROM noticias";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Muestra las noticias como tarjetas
                        echo '<div  class="col-md-4">';
                        echo '<div class="card mb-4" >';
                        echo '<img style="max-height: 190px;" src="' . $row['imagen'] . '" class="card-img-top" alt="' . $row['titulo'] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row['titulo'] . '</h5>';
                        echo '<p class="card-text">' . substr($row['descripcion'], 0, 100) . '...</p>'; // Muestra una descripción truncada
                        echo '<a href="php/func/noticia_completa.php?id=' . $row['id'] . '" class="btn">Ver más</a>'; // Agrega el enlace "Ver más" con el ID del artículo
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo 'No se encontraron noticias.';
                }

                // Cierra la conexión a la base de datos
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <?php require('php/script.php'); ?>
</body>
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").delay(2000).fadeOut("slow");
    });
</script>

</html>