<?php
session_start();
require '../conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" href="catalogo.css" />
</head>
<body>
    <h1>Catálogo de Productos</h1>
    <div class='container-items'> 
        <?php
        $sql = "SELECT * FROM elementos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo " <div class='item'>
                            <figure>
                                <img src='../imagenes/{$row['imagen']}' alt='{$row['producto']}' width='150' height='150'>
                            </figure>
                            <div class='info-product'>
                                <h2>{$row['producto']}</h2>
                                <p class='price'>Precio: $" . number_format($row['precio'], 2) . "</p>
                                <a href='detalles.php?id={$row['id']}'>Añadir al carrito</a>
                            </div>
                        </div>";
            }
        } else {
            echo "<p>No hay productos disponibles.</p>";
        }
        ?>
    </div>
</body>
</html>


