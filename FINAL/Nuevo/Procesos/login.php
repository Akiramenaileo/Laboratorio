<?php
require '../conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: ../index.php");
            exit;
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
                        <p>Contraseña incorrecta... Intentalo de nuevo...</p>
                    </div>

                    <script>
                        setTimeout(function() {
                            window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 4 segundos
                        }, 4000); // 4000 ms = 4 segundos
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
                        <p> Usuario no encontrado... Intentalo de nuevo...</p>
                    </div>

                    <script>
                        setTimeout(function() {
                            window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 4 segundos
                        }, 4000); // 4000 ms = 4 segundos
                    </script>
                </body>
                </html>";
    }
}
?>

