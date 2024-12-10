<?php
require '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar que el token y la nueva contraseña están presentes
    if (isset($_POST['token'], $_POST['password']) && !empty($_POST['token']) && !empty($_POST['password'])) {
        $token = $_POST['token'];
        $new_password = $_POST['password'];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Verificar si el token existe y no ha expirado
        $sql = "SELECT * FROM usuarios WHERE token = '$token' AND token_expira > NOW()";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El token es válido, proceder a actualizar la contraseña
            $user = $result->fetch_assoc();
            $user_id = $user['id'];

            // Actualizar la contraseña en la base de datos
            $sql = "UPDATE usuarios SET password = '$hashed_password', token = NULL, token_expira = NULL WHERE id = '$user_id'";
            if ($conn->query($sql) === TRUE) {
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
                                <p>Tu contraseña ha sido actualizada exitosamente. Serás redirigido al inicio de sesión en unos segundos...</p>
                            </div>

                            <script>
                                setTimeout(function() {
                                    window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 6 segundos
                                }, 6000); // 6000 ms = 6 segundos
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
                                <p>Error al actualizar la contraseña.. Serás redirigido al inicio de sesión en unos segundos...</p>
                            </div>

                            <script>
                                setTimeout(function() {
                                    window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 6 segundos
                                }, 6000); // 6000 ms = 6 segundos
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
                                <p>El token no es válido o ha expirado.. Serás redirigido al inicio de sesión en unos segundos...</p>
                            </div>

                            <script>
                                setTimeout(function() {
                                    window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 10 segundos
                                }, 10000); // 10000 ms = 10 segundos
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
                                <p>El token o la nueva contraseña no están presentes.. Serás redirigido al inicio de sesión en unos segundos...</p>
                            </div>

                            <script>
                                setTimeout(function() {
                                    window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 10 segundos
                                }, 10000); // 10000 ms = 10 segundos
                            </script>
                        </body>
                        </html>";
    }
}
?>

