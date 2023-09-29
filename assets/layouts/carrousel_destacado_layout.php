<?php
include_once("php/database/conexion_PDO.php");
$con = ConexionServer::conexionphp();

$stmt = $con->prepare("SELECT * FROM noticias where destacada = 1");
$stmt->execute();
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
 <!-- Carousel Arreglado y funcionamiento perfecto -->
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php foreach ($images as $index => $image) : ?>
      <li data-target="#myCarousel" data-slide-to= <?= $index  ?> class= <?= !$index ? ' active' : '' ?> ></li>
      <?php endforeach; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php foreach ($images as $index => $image) : ?>
      <div class="item <?= !$index ? ' active' : '' ?>">
        <img src="<?= $image['imagen'] ?>" alt="Los Angeles" style="width:100%;max-height: 400px;">
        <div class="carousel-caption">
          <h3><?= substr($image['titulo'],0,30) ?>...</h3>
          <p><?= substr($image['descripcion'],0,50) ?>...</p>
        </div>
      </div>
      <?php endforeach; ?>  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>