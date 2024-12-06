<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: Formularios/Inicio.php');
    exit;
}
require 'conexion.php';

// Crear nuevo elemento


// Actualizar elemento

    

// Eliminar elemento

?>

<h1>Bienvenido, <?php echo $_SESSION['username']; ?></h1>
<a href="Procesos/logout.php">Cerrar sesión</a>

<h2>Crear elemento</h2>
<form method="POST" enctype="multipart/form-data" action="crud/crear.php">
    <input type="text" name="producto" placeholder="Producto" required><br>
    <input type="number" name="precio" placeholder="Precio" required><br>
    <input type="text" name="categoria" placeholder="Categoria" required><br>
    <textarea name="descripcion" placeholder="Descripción"></textarea><br>
    <input type="file" name="imagen" accept="image/*" required><br>
    <button type="submit" name="crear">Crear</button>
</form>

<h2>Lista de elementos</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>producto</th>
        <th>Precio</th>
        <th>Categoria</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM elementos");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['producto']}</td>
                <td>{$row['precio']}</td>
                <td>{$row['categoria']}</td>
                <td>{$row['descripcion']}</td>
                <td><img src='imagenes/{$row['imagen']}' width='100'></td>
                <td>
                    <form method='POST' enctype='multipart/form-data' action='crud/actualizar.php' style='display:inline-block;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <input type='text' name='producto' value='{$row['producto']}' required>
                        <input type='float' name='precio' value='{$row['precio']}' required>
                        <input type='text' name='categoria' value='{$row['categoria']}' required>
                        <input type='text' name='descripcion' value='{$row['descripcion']}'>
                        <label for='imagen'>Nueva Imagen:</label>
                        <input type='file' name='imagen' accept='image/*'><br><br>
                        <button type='submit' name='actualizar'>Actualizar</button>
                    </form>
                    <a href='crud/eliminar.php?eliminar={$row['id']}'>Eliminar</a>
                </td>
            </tr>";
    }
    ?>
</table>
