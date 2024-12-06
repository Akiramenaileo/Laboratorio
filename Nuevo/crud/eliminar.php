<?php
require '../conexion.php';

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];

    // Obtener el nombre de la imagen de la base de datos
    $sql = "SELECT imagen FROM elementos WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    // Eliminar la imagen del servidor
    if (file_exists('../imagenes/' . $row['imagen'])) {
        unlink('../imagenes/' . $row['imagen']);
    }

    // Borrar
    $sql = "DELETE FROM elementos WHERE id=$id";
    $conn->query($sql);
    header('Location: ../crud.php');
}

?>
