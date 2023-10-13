<?php
require("links.php");
require_once "database.php";
session_start();

if (isset($_SESSION['nombre_usuario'])) {
    header("Location: index.php");
    exit;
}

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contraseña"];

    $sql = "SELECT id, nombre_usuario FROM usuarios WHERE nombre_usuario = ? AND contraseña = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre_usuario, $contrasena);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre_usuario);
        $stmt->fetch();

        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['id'] = $id;

        header("Location: index.php");
        exit;
    } else {
        $error = "Nombre de usuario no encontrado o contraseña incorrecta.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="imagenes/descargar (2).png"
                                            style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Trayendote las noticias del mundo del gaming</h4>
                                    </div>
                                    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
                                    <form method="post">
                                        <p>Por favor inicia sesión en tu cuenta</p>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="nombre_usuario" class="form-control"
                                                placeholder=" username" required />
                                            <label class="form-label" for="form2Example11">Username</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" name="contraseña" class "form-control" required />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">Log in</button>
                                        </div>
                                    </form>
                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <a href="register.php" class="btn btn-outline-danger">Create new</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
