<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'estudiante') {
    header("Location: login.php"); exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Estudiante</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central">
        <h2>Hola, Estudiante 🎒</h2>
        <p>¿Qué deseas revisar?</p>
        <a href="consulta_calificaciones.php" class="boton-menu" style="background-color: #4CAF50;">📊 Ver Calificaciones</a>
        <a href="lista_alumnos_docente.php" class="boton-menu" style="background-color: #0288D1;">👀 Ver Compañeros</a>
        <br>
        <a href="eliminar_cuenta.php" class="boton-menu boton-peligro" onclick="return confirm('¿Seguro que deseas eliminar tu cuenta para siempre?');">Eliminar Mi Cuenta ❌</a>
        <a href="logout.php" style="color: #00796B; font-weight: bold;">Cerrar Sesión</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>