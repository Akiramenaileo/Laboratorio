<?php
session_start();
require '../conexion.php';

// Número de productos por página
$productos_por_pagina = 6;

// Obtener el número de la página actual desde la URL, por defecto será 1
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_actual < 1) $pagina_actual = 1;

// Calcular el OFFSET para la consulta
$offset = ($pagina_actual - 1) * $productos_por_pagina;

// Obtener el total de productos
$sql_total = "SELECT COUNT(*) as total FROM elementos";
$result_total = $conn->query($sql_total);
$total_productos = $result_total->fetch_assoc()['total'];

// Calcular el número total de páginas
$total_paginas = ceil($total_productos / $productos_por_pagina);

// Consulta para obtener los productos de la página actual
$sql = "SELECT * FROM elementos LIMIT $productos_por_pagina OFFSET $offset";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>

    <link rel="stylesheet" href="ctlg.css" />
</head>
<body>
    <div class="sidebar">
        <ul>
             <img src="../img/Aylen Joyas (1).jpg" alt="Logo">
            <a href="../index.php"><li>Inicio</li></a>
            <a href="../catalogo/catalogo.php"><li>Catalogo</li></a>
            <a href="../usuarios.php"><li>Usuarios</li></a>
            <a href="../crud.php"><li>CRUD</li></a>
            <a href="../Procesos/logout.php"><li>Salir</li></a>
        </ul>
    </div>
    <div class="main">
        <div class="container-navbar">
				<nav class="navbar container">
					<i class="fa-solid fa-bars"></i>
                    
                    
					<ul class="menu">
						<li><h1>Bienvenido <?php echo $_SESSION['username']; ?> al Catálogo de Productos</h1></li>
					
					</ul>

				</nav>
			</div><br><br>
        

        <div class='container-items'> 
            <?php
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

        <!-- Contenedor de paginación -->
        <div class="pagination">
            <?php if ($pagina_actual > 1): ?>
                <a href="?pagina=<?php echo $pagina_actual - 1; ?>">Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <a href="?pagina=<?php echo $i; ?>" 
                <?php if ($i == $pagina_actual) ?>>
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($pagina_actual < $total_paginas): ?>
                <a href="?pagina=<?php echo $pagina_actual + 1; ?>">Siguiente</a>
            <?php endif; ?>
        </div>

    </div>

</body>
</html>
