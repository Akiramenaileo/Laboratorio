<?php
session_start();
require '../conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="detalles.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">

    <title>DETALLES</title>
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
        <div class="navbar-collapse" id="navbar-toggler">
            <a class="navbar-brand" href="../index.php">
            <img src="../Imagenes/Aylen Joyas (2).jpg" width="65" alt="Logo de la pagina">
            </a>
            <ul class="navbar-nav d-flex justify-content-center align-items-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php"> Inicio </a>
            </li>
            <li class="nav-item">
                  
            <li class="nav-item"><a class="nav-link active" href="../crud.php">CRUD</a></li>
            <li class="nav-item"><a class="nav-link active" href="../catalogo/catalogo.php">Catalogo</a></li>
            <li class="nav-item"><a class="nav-link active" href="../Procesos/logout.php">SALIR</a></li>
                
                </div>
            </li>
           
        </div>
        </div>
    </nav>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM elementos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "  <div class='box'>
                    <div class='innder-box'>
                        <h1>{$row['producto']}</h1>
                        <img src='../imagenes/{$row['imagen']}' alt='{$row['producto']}' width='300' height='300'>
                        <p>{$row['descripcion']}</p>
                        <p><strong>Precio:</strong> $" . number_format($row['precio'], 2) . "</p>
                        <a href=''>Agregar al carrito</a>
                    </div>
                </div>";
    } else {
        echo "<p>Producto no encontrado.</p>";
    }
} else {
    echo "<p>No se ha seleccionado un producto.</p>";
}

?>

</body>
</html>
