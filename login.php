<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Escuela</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central">
        <h2>Bienvenido</h2>
        <form action="validar.php" method="POST">
            <p>Usuario:</p>
            <input type="text" name="usuario" required>
            <p>Contraseña:</p>
            <input type="password" name="pwd" required>
            <br><br>
            <input type="submit" value="Entrar al Sistema">
        </form>
        <br>
        <a href="registro_usuario.php" style="color: #0288D1; font-weight: bold;">¿No tienes cuenta? Regístrate</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>