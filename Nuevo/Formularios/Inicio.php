<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="../Procesos/login.php">
        <input type="text" name="username" placeholder="Usuario" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Iniciar sesión</button>
        <br>
        <a href="Recuperar.php">Olvide mi contraseña</a>
    </form>

    <h2>Registro</h2>
    <form method="POST" action="../Procesos/register.php">
        <input type="text" name="username" placeholder="Usuario" required><br>
        <input type="email" name="email" placeholder="Correo electrónico" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Registrar</button>
    </form>
    
</body>
</html>
