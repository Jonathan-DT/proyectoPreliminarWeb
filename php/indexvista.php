<?php require('header.php'); ?>
<main>
    <div style="padding: 50px;">
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide news-carousel" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="Imagenes/descargar 1.png" class="d-block w-100" alt="jugadora no es aceptada en valorant">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="news-title">Jugadora no es aceptada en equipo de Valorant</h2>
                <p class="news-description">Algunos jugadores habrían rechazado 'jugar con una mujer', aunque la protagonista de la noticia comenta que no es la tónica habitual en la escena profesional de Valorant.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="Imagenes/torneo-videojuegos-transmision-vivo-adultos-jovenes-pc-linea-multiples-jugadores-jugando-juegos-accion-computadora-streamer-masculino-auriculares-disfrutando-competencia-juegos.jpg" class="d-block w-100" alt="Conoce todo acerca de los torneos">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="news-title">Conoce todo acerca de los torneos</h2>
                <p class="news-description">Descubre los últimos torneos de videojuegos y los mejores jugadores en acción.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
        </div>
    </div>
    </div>
    <div style="padding: 50px;">
    <div class="container">
        <div class="row">
        <?php
        
          require_once('database.php'); // Incluye el archivo de conexión a la base de datos

          // Consulta SQL para obtener todas las noticias
          $sql = "SELECT * FROM noticias";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Muestra las noticias como tarjetas
                echo '<div class="col-md-4">';
                echo '<div class="card mb-4">';
                echo '<img src="' . $row['imagen'] . '" class="card-img-top" alt="' . $row['titulo'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['titulo'] . '</h5>';
                echo '<p class="card-text">' . substr($row['descripcion'], 0, 100) . '...</p>'; // Muestra una descripción truncada
                echo '<a href="noticia_completa.php?id=' . $row['id'] . '" class="btn">Ver más</a>'; // Agrega el enlace "Ver más" con el ID del artículo
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
</main>
    <?php require('script.php'); ?>
</body>
<script type="text/javascript">
$(window).load(function(){
    $(".loader").delay(2000).fadeOut("slow");
});
</script>
</html>