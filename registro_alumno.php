<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'profesor') {
    header("Location: login.php");
    exit;
}
include 'conexion.php';
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $grado = $_POST['grado'];
    $sql = "INSERT INTO alumnos (nombre, edad, grado) VALUES ('$nombre', '$edad', '$grado')";
    if ($conexion->query($sql) === TRUE) {
        $mensaje = "¡Alumno inscrito correctamente!";
    } else {
        $mensaje = "Error: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscribir Alumno</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central">
        <h2>Nuevo Ingreso</h2>
        <?php if($mensaje) echo "<p style='color:#0288D1; font-weight:bold;'>$mensaje</p>"; ?>
        <form method="POST" action="">
            <p>Nombre del Alumno:</p>
            <input type="text" name="nombre" required>
            <p>Edad:</p>
            <input type="text" name="edad" required>
            <p>Grupo:</p>
            <input type="text" name="grado" required>
            <br><br>
            <input type="submit" value="Guardar Alumno">
        </form>
        <br>
        <a href="menu_director.php" style="text-decoration: none; color: #888;">Volver al Menú</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>