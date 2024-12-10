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
                echo "<!DOCTYPE html>
                        <html lang='es'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>Redireccionando...</title>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    text-align: center;
                                    margin-top: 50px;
                                }
                                .message {
                                    font-size: 18px;
                                    color: #333;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='message'>
                                <p>Se ha enviado un enlace de recuperación a tu correo... Serás redirigido al inicio de sesión en unos segundos...</p>
                            </div>

                            <script>
                                setTimeout(function() {
                                    window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 10 segundos
                                }, 10000); // 10000 ms = 10 segundos
                            </script>
                        </body>
                        </html>";
            } else {
                echo "<!DOCTYPE html>
                        <html lang='es'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>Redireccionando...</title>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    text-align: center;
                                    margin-top: 50px;
                                }
                                .message {
                                    font-size: 18px;
                                    color: #333;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='message'>
                                <p>Error al enviar el correo... Serás redirigido al inicio de sesión en unos segundos...</p>
                            </div>

                            <script>
                                setTimeout(function() {
                                    window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 5 segundos
                                }, 5000); // 5000 ms = 5 segundos
                            </script>
                        </body>
                        </html>";
            }
        } else {
            echo "<!DOCTYPE html>
                        <html lang='es'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>Redireccionando...</title>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    text-align: center;
                                    margin-top: 50px;
                                }
                                .message {
                                    font-size: 18px;
                                    color: #333;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='message'>
                                <p> Error al guardar el token en la base de datos... Serás redirigido al inicio de sesión en unos segundos...</p>
                            </div>

                            <script>
                                setTimeout(function() {
                                    window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 5 segundos
                                }, 5000); // 5000 ms = 5 segundos
                            </script>
                        </body>
                        </html>";
        }
    } else {
        echo "<!DOCTYPE html>
                        <html lang='es'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>Redireccionando...</title>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    text-align: center;
                                    margin-top: 50px;
                                }
                                .message {
                                    font-size: 18px;
                                    color: #333;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='message'>
                                <p> El correo no está registrado... Serás redirigido al inicio de sesión en unos segundos...</p>
                            </div>

                            <script>
                                setTimeout(function() {
                                    window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 7 segundos
                                }, 7000); // 7000 ms = 7 segundos
                            </script>
                        </body>
                        </html>";
    }
}
?>
