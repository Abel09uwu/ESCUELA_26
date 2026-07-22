<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'profesor') {
    header("Location: login.php"); exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Profesor</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central">
        <h2>Hola, Profesor 📘</h2>
        <p>¿Qué acción realizarás hoy?</p>
        <a href="registro_alumno.php" class="boton-menu">✨ Dar de Alta Alumno</a>
        <a href="registro_materias.php" class="boton-menu" style="background-color: #4CAF50;">📚 Registrar Materia</a>
        <a href="registro_calificaciones.php" class="boton-menu" style="background-color: #0288D1;">⭐ Capturar Calificaciones</a>
        <a href="lista_alumnos_director.php" class="boton-menu" style="background-color: #81C784;">📋 Consultar / Baja de Alumno</a>
        <br>
        <a href="eliminar_cuenta.php" class="boton-menu boton-peligro" onclick="return confirm('¿Seguro que deseas eliminar tu cuenta para siempre?');">Eliminar Mi Cuenta ❌</a>
        <a href="logout.php" style="color: #00796B; font-weight: bold;">Cerrar Sesión</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>