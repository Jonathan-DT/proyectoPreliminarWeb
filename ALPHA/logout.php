<?php
session_start();
// Destruir la sesión
session_destroy();
header("Location: index.php"); // Redirigir al usuario a la página principal o a donde desees
?>
