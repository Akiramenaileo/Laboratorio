<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Formularios/Inicio.php");
    exit;
}

echo "¡Bienvenido, " . $_SESSION['username'] . "!";
echo "<br><a href='Procesos/logout.php'>Cerrar sesión</a>";
?>
