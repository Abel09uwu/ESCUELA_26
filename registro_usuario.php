<?php
include 'conexion.php';
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['usuario'];
    $p = $_POST['pwd'];
    $r = $_POST['rol'];
    $sql = "INSERT INTO usuarios (usuario, password, rol) VALUES ('$u', '$p', '$r')";
    if ($conexion->query($sql) === TRUE) {
        header("Location: login.php");
        exit;
    } else {
        $mensaje = "Error al registrarse o el usuario ya existe.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central">
        <h2>Crear Cuenta</h2>
        <?php if($mensaje) echo "<p style='color:red;'>$mensaje</p>"; ?>
        <form method="POST" action="">
            <p>Elige tu Rol:</p>
            <select name="rol" required>
                <option value="profesor">Profesor</option>
                <option value="estudiante">Estudiante</option>
            </select>
            <p>Crea un Usuario:</p>
            <input type="text" name="usuario" required>
            <p>Crea una Contraseña:</p>
            <input type="password" name="pwd" required>
            <br><br>
            <input type="submit" value="Registrarse">
        </form>
        <br>
        <a href="login.php" style="color: #0288D1; font-weight: bold;">Volver al Login</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>