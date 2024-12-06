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
        </head>

        <body>
            <h2>Restablecer Contraseña</h2>
            <form method="POST" action="../Procesos/reset_password.php">
                <input type="hidden" name="token" value="<?php echo $token; ?>"> <!-- El token se pasa de forma oculta -->
                <label for="password">Nueva Contraseña:</label>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit">Restablecer Contraseña</button>
            </form>
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
