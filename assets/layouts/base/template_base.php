<?//php require_once('./assets/library/ti.php') ?>
<?php require_once('/xampp/htdocs/noticias/assets/library/ti.php') // ruta absoluta desde la raíz del servidor?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <?php startblock('style') ?>       
    <?php endblock() ?>
    <title><?php emptyblock('title') ?></title>
</head>
<body>
    <header>
    <?php startblock('header') ?>
    <?php endblock() ?>
    </header>
    <?php startblock('body') ?>
    <?php endblock() ?>
    <footer>
    <?php startblock('footer') ?>
    <?php endblock() ?>
    </footer>
</body>
</html>

