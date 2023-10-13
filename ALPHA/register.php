<?php

// Include database file
require_once "database.php";

session_start();

if (isset($_SESSION['nombre_usuario'])) {
    header("Location: index.php");
    exit;
}

// Conexión a la base de datos (igual que en el ejemplo anterior)
// ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contraseña"];
    $correo_electronico = $_POST["correo_electronico"];

    // Verifica si el nombre de usuario ya existe en la base de datos
    $check_query = "SELECT id FROM usuarios WHERE nombre_usuario = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $nombre_usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "El nombre de usuario ya está en uso.";
    } else {
        // Inserta el nuevo usuario en la base de datos
        $insert_query = "INSERT INTO usuarios (nombre_usuario, correo_electronico, contraseña) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sss", $nombre_usuario, $correo_electronico, $contrasena);
        
        if ($stmt->execute()) {
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("Location: index.php");
            exit;
        } else {
            $error = "Error al registrar el usuario.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>

    <form method="post">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br>

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" name="correo_electronico" required><br>

        <input type="submit" value="Registrar">
    </form>

    <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
</body>
</html>
