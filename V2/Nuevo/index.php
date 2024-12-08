<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Formularios/Inicio.php");
    exit;
}

echo "¡Bienvenido, " . $_SESSION['username'] . "!";
echo "<br><br><a href='crud.php'>Entrar al CRUD</a>";
echo "<br><br><a href='catalogo/catalogo.php'>Catalogo</a>";
echo "<br><br><a href='usuarios.php'>Ver Usuarios</a>";
echo "<br><br><a href='Procesos/logout.php'>Cerrar sesión</a>";
?>
