<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer News</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <style>
		.navbar-nav .active > a {
			background-color: cyan;
		}
	</style>
</head>
<body>
<header>
    <nav class="navbar navbar-dark" style="background-color: #1D1919;">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                <a href="index.php">Home <i class="fa fa-home"></i></a>
            </li>
            <?php
            session_start();

            if (isset($_SESSION['user_id'])) {
                // Si el usuario está autenticado, muestra un enlace de cierre de sesión dentro de la lista de navegación
                echo '<li><a href="logout.php" class="btn btn-danger">Cerrar Sesión</a></li>';
            }
            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Buscar noticias" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>

        <?php
        if (!isset($_SESSION['user_id'])) {
            // Si el usuario no está autenticado, muestra enlaces para registro e inicio de sesión
            echo '<a href="register.php" class="btn btn-primary">Registro</a>';
            echo '<a href="login.php" class="btn btn-primary">Iniciar Sesión</a>';
        }
        ?>
    </div>
    </nav>
</header>

