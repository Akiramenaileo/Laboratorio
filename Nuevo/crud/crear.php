
<?php
require '../conexion.php';

if (isset($_POST['crear'])) {
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    // Procesar la imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];

    // Definir la carpeta de destino para las imágenes
    $imagen_destino = '../imagenes/' . $imagen;

    // Mover la imagen del directorio temporal a la carpeta final
    if (move_uploaded_file($imagen_temp, $imagen_destino)) {
        // Insertar el elemento en la base de datos con la ruta de la imagen
        $sql = "INSERT INTO elementos (producto, precio, categoria, descripcion, imagen) 
                VALUES ('$producto', '$precio', '$categoria', '$descripcion', '$imagen')";
        $conn->query($sql);
        header('Location: ../crud.php');
    } else {
        echo "Error al subir la imagen.";
    }
}
