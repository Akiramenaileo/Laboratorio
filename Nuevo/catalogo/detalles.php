<?php
session_start();
require 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>{$row['nombre']}</h1>";
        echo "<img src='imagenes/{$row['imagen']}' alt='{$row['nombre']}' width='300' height='300'>";
        echo "<p>{$row['descripcion']}</p>";
        echo "<p><strong>Precio:</strong> $" . number_format($row['precio'], 2) . "</p>";
        echo "<a href='agregar_carrito.php?id={$row['id']}'>Agregar al carrito</a>";
    } else {
        echo "<p>Producto no encontrado.</p>";
    }
} else {
    echo "<p>No se ha seleccionado un producto.</p>";
}
?>
