<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar Sesion</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="inicio/Login.css">
        
    </head>
    
    <body>
     

         <!-- REGISTRARSE -->
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form method="POST" action="../Procesos/register.php">
                    <h1 class="fuera">Crear cuenta</h1>
                    <div class="social-icons">
   
                    </div>

                    <span>Ingresar email con el que registrarse</span>
                    
                    <input type="text" name="username" placeholder="Usuario" required>
                    <input type="email" name="email" placeholder="Correo electrónico" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    
                    <button type="submit" name="submit">Registrarse</button>
                    <a href="Recuperar.php">Olvidaste tu contraseña?</a>
                </form>
            </div>




            <!-- LOGIN -->
            <div class="form-container sign-in">
                <form method="POST" action="../Procesos/login.php">
                    <h1 class="fuera">Inciar sesion</h1>
                    <div class="social-icons">
                        
                    </div>

                    <span>o utiliza tu Usuario y Contraseña</span>
                    <div>
                        <input type="text" name="username" placeholder="Usuario" required>
                        <span class="focus-efecto"></span>
                    </div>

                    <div>
                        <input type="password" name="password" placeholder="Contraseña" required>
                        <span class="focus-efecto"></span>
                    </div>

                    <a href="Recuperar.php">¿Olvidaste tu contraseña?</a>
                    <button type="submit" name="submit">Ingresar</button>
                </form>
            </div>




            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>¿Ya tienes una cuenta?</h1>
                        <p>Ingresa tus datos personales para acceder a todas las funciones</p>
                        <button class="hidden" id="login">Conectate</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Bienvenido</h1>
                        <p>¿No tienes una cuenta? Registrate para usar todas las funciones</p>
                        <button class="hidden" id="register">Registrar</button>
                    </div>
                </div>
            </div>
        </div>


        
     <script src="../Formularios/inicio/Login.js"></script>    
    </body>
</html>
