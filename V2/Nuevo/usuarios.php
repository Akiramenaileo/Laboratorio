<?php
session_start();
require 'conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="parent">
        <div class="div1"> 
            <head class="header">Header</head>
        </div>
        <div class="div2"> 
            <nav class="sidebar_nav">
                <a href=""> Inicio </a>
                <a href=""> Productos </a>
                <a href=""> Usuarios </a>
                <a href=""> Catalogo </a>
                <a href=""> Cerrar sesion </a>
            </nav>
        </div>
        <div class="div3"> 
            <table  class="tabla-desktop">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                </tr>

                <?php
                $result = $conn->query("SELECT * FROM usuarios");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                        </tr>";
                }
                ?>
            </table>
        </div>
        
    </div>
    
</body>

