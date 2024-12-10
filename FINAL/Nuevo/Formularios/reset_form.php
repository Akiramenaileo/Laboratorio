<?php
// Verificar que el token esté presente en la URL
if (isset($_GET['token']) && !empty($_GET['token'])) {
    $token = $_GET['token'];

    // Conectar a la base de datos y verificar si el token es válido
    require '../conexion.php';
    $sql = "SELECT * FROM usuarios WHERE token = '$token' AND token_expira > NOW()";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El token es válido, mostrar el formulario
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Restablecer Contraseña</title>
            <link rel="stylesheet" href="../Formularios/style.css">

        </head>

        <body>

            <div class="container">
                <form method="POST" action="../Procesos/reset_password.php" class="form_main">
                    <input type="hidden" name="token" value="<?php echo $token; ?>"> <!-- El token se pasa de forma oculta -->
                    <p class="heading">Nueva Contraseña</p>
                    
                    <div class="inputContainer">
                        <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#2e2e2e" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                        </svg>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button id="button">Cambiar Contraseña</button>
                </form>        
            </div>

        </body>
        </html>
        
        <?php
    } else {
        // Si el token no es válido o ha expirado
        echo "El token no es válido o ha expirado.";
    }
} else {
    echo "No se ha proporcionado un token válido.";
}
?>
