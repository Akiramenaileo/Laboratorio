<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: Formularios/Inicio.php');
    exit;
}
require 'conexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="Pcrud.css">

    
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
        

        <div class="form-content">
        
            
            <form method="POST" enctype="multipart/form-data" action="crud/crear.php">
                <h2 id="title">Crear elemento</h2>
                <div class="input-group">
                    <div class="input-field">
                        <input type="text" name="producto" placeholder="Producto" required>
                    </div>

                    <div class="input-field">
                        <input type="number" name="precio" placeholder="Precio" required>
                    </div>

                    <div class="input-field">
                        <input type="text" name="categoria" placeholder="Categoria" required>
                    </div>
                    <div class="input-field">
                        <input name="descripcion" placeholder="Descripción"></input>
                    </div>
                </div>
                <div class="btn-field">
                    
                    <input class="file-input" id="subir" type="file" name="imagen" accept="image/*" required>
                    <label for="subir" class="file-label" name="imagen" accept="image/*" required>
                        <i class="bi bi-upload"></i> Subir archivo
                    </label><br>
                    <p id="file-name">No se ha seleccionado ningún archivo</p>
                    


                    <button type="submit" name="crear">Crear</button>
                </div>
            </form>
        </div>

            <h2>Lista de elementos</h2>
            <table class="tabla-desktop">
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
                                    <input type='text' name='descripcion' value='{$row['descripcion']}'><br><br>
                                    <input type='file' name='imagen' accept='image/*'><br><br>
                                    <button type='submit' name='actualizar'>Actualizar</button>
                                </form><br><br>
                                <a class='elim' href='crud/eliminar.php?eliminar={$row['id']}'>Eliminar</a><br><br>
                            </td>
                        </tr>";
                }
                ?>
            </table>
        
    </div>
<script src="ScriptCrud.js"></script>
</body>
</html>