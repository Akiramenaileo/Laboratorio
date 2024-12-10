<?php
require '../conexion.php';

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];

    // Verificar si se ha subido una nueva imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        // Obtener los detalles de la nueva imagen
        $imagen = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        
        // Definir la carpeta de destino para las imágenes
        $imagen_destino = '../imagenes/' . $imagen;
        
        // Seleccionar la imagen actual para borrarla 
        $sql = "SELECT imagen FROM elementos WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        // Eliminar la imagen del servidor
        if (file_exists('../imagenes/' . $row['imagen'])) {
            unlink('../imagenes/' . $row['imagen']);
        }


        // Mover la imagen del directorio temporal a la carpeta de destino
        if (move_uploaded_file($imagen_temp, $imagen_destino)) {
            // Actualizar el registro con la nueva imagen
            $sql = "UPDATE elementos SET producto='$producto', precio='$precio', categoria='$categoria', descripcion='$descripcion', imagen='$imagen' WHERE id=$id";
        } else {
            echo "Error al subir la imagen.";
            exit;
        }
    } else {
        // Si no se sube una nueva imagen, mantener la imagen antigua
        $sql = "UPDATE elementos SET producto='$producto', precio='$precio', categoria='$categoria', descripcion='$descripcion' WHERE id=$id";
    }

    // Ejecutar la actualización en la base de datos
    if ($conn->query($sql) === TRUE) {
        header('Location: ../crud.php');
    } else {
        echo "Error al actualizar el elemento.";
    }
}
?>
