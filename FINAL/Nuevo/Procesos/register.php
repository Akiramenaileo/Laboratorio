<?php
require '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Correo electrónico no válido.");
    }

    $sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
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
                        <p>Registro exitoso... Serás redirigido al inicio de sesión en unos segundos...</p>
                    </div>

                    <script>
                        setTimeout(function() {
                            window.location.href = '../Formularios/Inicio.php'; // Redirigir después de 6 segundos
                        }, 6000); // 6000 ms = 6 segundos
                    </script>
                </body>
                </html>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>