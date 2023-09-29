<?php
include_once("php/database/conexion_PDO.php");
$con = ConexionServer::conexionphp();

$stmt = $con->prepare("SELECT imagen FROM noticias where destacada = 1");
$stmt->execute();
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<div style="padding: 50px;">
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide news-carousel" data-ride="carousel">
            <?php foreach ($images as $index => $image) : ?>
                <div class="carousel-item<?= !$index ? ' active' : '' ?>">
                    <img class="d-block w-100" src="<?= $image['imagen'] ?>" alt />
                </div>
            <?php endforeach; ?>
            <div class="carousel-caption d-none d-md-block">
                <h2 class="news-title"></h2>
                <p class="news-description"></p>
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