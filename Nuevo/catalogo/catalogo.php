<?php
session_start();
require '../conexion.php';

$sql = "SELECT * FROM elementos";
$result = $conn->query($sql);

echo "<h1>Catálogo de Productos</h1>";

if ($result->num_rows > 0) {
    echo "<div class='catalogo-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='producto'>
                <img src='../imagenes/{$row['imagen']}' alt='{$row['producto']}' width='150' height='150'>
                <h3>{$row['producto']}</h3>
                <p>{$row['descripcion']}</p>
                <p>Precio: $" . number_format($row['precio'], 2) . "</p>
                <a href='detalles.php?id={$row['id']}'>Ver más</a>
                <a href=''>Agregar al carrito</a>
              </div>";
    }
    echo "</div>";
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>
