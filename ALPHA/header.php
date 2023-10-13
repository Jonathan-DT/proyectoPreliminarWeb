<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer News</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="styles/style.css">
    <style>
		.navbar-nav .active > a {
			background-color: grey ;
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
            <li>
            <ul class="nav navbar-nav ml-auto"> <!-- Alinea los elementos a la derecha -->
            <?php
            // Verificar si la sesión está registrada
            if (isset($_SESSION["nombre_usuario"])) {
                echo '<li><a href="logout.php" class="nav-link">Cerrar Sesión<i class= "fa fa-sign-out"></i> </a></li>';
            } else {
                echo '<li><a href="register.php" class="nav-link">Registrarse<i class= "fa fa-pencil"></i></a></li>';
                echo '<li><a href="login.php" class="nav-link">Iniciar Sesión<i class= "fa fa-sign-in"></i></a></li>';
            }
            ?>
        </ul>
    <a href="xbox.php">
        <i class="fa fa-xbox" ></i>
    </a>
</li>

        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Buscar noticias" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
    </nav>
</header>

