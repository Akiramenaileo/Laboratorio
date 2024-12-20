<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Formularios/Inicio.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Metadatos -->
  <meta charset="UTF-8">
  <meta name="author" content="Leo Leiva">
  <meta name="description" content="Ventas">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Titulo -->
  <title> Aylen Joyas </title>
  <!-- Icono head -->
  <link rel="icon" href="Imagenes/Aylen Joyas (1).jpg">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- CSS -->
  <link rel="stylesheet" href="Style.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Barra de navegacion -->
  <nav class="navbar navbar-expand-md">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-toggler">
        <a class="navbar-brand" href="index.php">
          <img src="Imagenes/Aylen Joyas (2).jpg" width="65" alt="Logo de la pagina">
        </a>
        <ul class="navbar-nav d-flex justify-content-center align-items-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"> Inicio </a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tienda
              </button>
              <ul class="dropdown-menu menu">
                <li><a class="dropdown-item" href="crud.php">CRUD</a></li>
                <li><a class="dropdown-item" href="catalogo/catalogo.php">Catalogo</a></li>
                <li><a class="dropdown-item" href="Procesos/logout.php">SALIR</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Contacto"> Contacto </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Donde"> Dónde encontrarnos </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- Seccion principal -->
  <section id="Principal" class="Principal align-items-stretch">
    <div>
      <img class="img-fluid" src="Imagenes/Aylen Joyas.svg" alt="Logo Aylen joyas">
      <h1 class="efecto-linea">Aylen Joyas</h1>
      <h2>Joyería</h2>
    </div>
  </section>

  <!-- Tienda -->
  <section class="Tienda" id="menu3">
    <h1>Tienda</h1>
    <div class="row text-center container-fluid">
      <!-- Mas Nuevo -->
      <div class="col-12 col-md-4 contenedor">
        <img src="Imagenes/Joyeria nuevo.svg" alt="Nuevo">
        <div class="overlay">
          <a href="crud.php">CRUD</a>
        </div>
      </div>
      <!-- Catalogo -->
      <div class="col-12 col-md-4 contenedor">
        <img src="Imagenes/catalogo joya.svg" alt="Nuevo">
        <div class="overlay">
          <a href="catalogo/catalogo.php">Catálogo</a>
        </div>
      </div>
      <!-- Medios de Pago -->
      <div class="col-12 col-md-4 contenedor">
        <img src="Imagenes/medios-de-pago-640x640.png" alt="Nuevo">
        <div class="overlay">
          <p>Medios de Pago</p>
        </div>
      </div>
    </div>

  </section>

  <!-- Contacto -->
  <section  class="Contacto">
    <!-- Area del formulario -->
    <div class="form-area">
      <div class="container-fluid" id="Contacto">
        <div class="row single-form g-0">
          <div class="col-sm-12 col-lg-6">
            <div class="left">
              <h2 ><span>Contáctenos para</span> <br>Consultas Comerciales</h2>
            </div>
          </div>
          <div class="col-sm-12 col-lg-6">
            <div class="right">
              <i class="fa fa-caret-left"></i>
              <form>
        
                <div class="form-group mb-4">
                  <input type="text" name="dato[]" placeholder="Ingresar Nombre" class="form-control" id="Nombre">
                </div>
                
                <div class="form-group mb-4">
                  <input type="text" name="dato[]" placeholder="Ingresar Email" class="form-control" id="Email">
                </div>

                <div class="form-group mb-4">
                  <input type="text" name="dato[]" placeholder="Mensaje" class="form-control mensaje" id="Mensaje">
                </div>

                <button type="reset" id="boton" class="btn btn-primary" onclick="guardarDatos()" >Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Donde Encontrarnos -->
  <section id="Donde" class="donde">
    <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2102.43526460369!2d-65.62240477833012!3d-27.597852536015946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1695672321020!5m2!1ses-419!2sar" width="1400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="justify-content-center"></iframe>
  </section>

  
  <script type="text/javascript" src="javascript.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
