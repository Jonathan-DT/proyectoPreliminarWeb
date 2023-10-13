<?php include 'base/template_base.php' ?>
<?php startblock('style') ?>
<style>
    .navbar-nav .active > a {
            border: white solid 0.5px;
            border-radius: 5px;
            padding: 5px;
            text-decoration: none;
            color: white;
		}
        .navbar-nav .active > a:hover{
            background-color: #A09491;
        }
        
        .navbar-nav  a {
            border: white solid 0.5px;
            border-radius: 5px;
            padding: 5px;
            text-decoration: none;
            color: white;
		}
        .navbar-nav  a:hover{
            background-color: #A09491;
        }
       
</style>
<?php endblock() ?>
<?php startblock('title') ?>
   news
<?php endblock() ?>

<?php startblock('header') ?>
<nav class="navbar navbar-dark" style="background-color: #1D1919;">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                <a href="/jona/index.php">Home<i class="fa fa-home"></i></a>
            </li>
            <?php
            session_start(); 

            if (isset($_SESSION['user_id'])) {
                // Si el usuario está autenticado, muestra un enlace de cierre de sesión dentro de la lista de navegación
                echo '<li><a href="logout.php" class="btn btn-danger">Cerrar Sesión</a></li>';
            }
            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="/noticias/php/func/search.php">
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
<?php endblock() ?>
