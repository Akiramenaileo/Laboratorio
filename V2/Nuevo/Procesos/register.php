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
        echo "Registro exitoso. <a href='../Formularios/Inicio.php'>Inicia sesión</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>