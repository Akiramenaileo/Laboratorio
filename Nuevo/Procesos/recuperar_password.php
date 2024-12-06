<?php
require '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Verificar si el usuario existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Generar un token aleatorio y la fecha de expiración (1 hora)
        $token = bin2hex(random_bytes(16)); // Genera un token de 32 caracteres
        $expire_at = date('Y-m-d H:i:s', strtotime('+1 hour')); // El token expira en 1 hora

        // Guardar el token y su fecha de expiración en la base de datos
        $sql = "UPDATE usuarios SET token = '$token', token_expira = '$expire_at' WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            // Enviar el enlace de recuperación al correo del usuario
            $enlace = "http://localhost/Nuevo/Formularios/reset_form.php?token=$token";
            $asunto = "Recuperación de Contraseña";
            $mensaje = "Haz clic en el siguiente enlace para restablecer tu contraseña: $enlace";
            $cabeceras = "From: no-reply@mi_sistema.com";

            // Enviar el correo (con PHPMailer sería más seguro y confiable)
            if (mail($email, $asunto, $mensaje, $cabeceras)) {
                echo "Se ha enviado un enlace de recuperación a tu correo.";
            } else {
                echo "Error al enviar el correo.";
            }
        } else {
            echo "Error al guardar el token en la base de datos.";
        }
    } else {
        echo "El correo no está registrado.";
    }
}
?>
