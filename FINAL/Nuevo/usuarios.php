<?php
session_start();
require 'conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Pcrud.css">
    <title>Document</title>
</head>
<body>

<div class="sidebar">
        <ul>
             <img src="img/Aylen Joyas (1).jpg" alt="Logo">
            <a href="index.php"><li>Inicio</li></a>
            <a href="catalogo/catalogo.php"><li>Catalogo</li></a>
            <a href="usuarios.php"><li>Usuarios</li></a>
            <a href="crud.php"><li>CRUD</li></a>
            <a href="Procesos/logout.php"><li>Salir</li></a>
        </ul>
    </div>
    <div class="main">
        <div class="container-navbar">
				<nav class="navbar container">
					<i class="fa-solid fa-bars"></i>
                    
                    
					<ul class="menu">
						<li><h1>Bienvenido, <?php echo $_SESSION['username']; ?></h1></li>
					
					</ul>

				</nav>
			</div>


            <table  class="tabla-desktop users">
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
        

    
</body>

