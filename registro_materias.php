<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'profesor') {
    header("Location: login.php");
    exit;
}
include 'conexion.php';
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_materia = $_POST['nombre_materia'];
    $sql = "INSERT INTO materias (nombre_materia) VALUES ('$nombre_materia')";
    if ($conexion->query($sql) === TRUE) $mensaje = "Materia agregada";
    else $mensaje = "Error: " . $conexion->error;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Materias</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central">
        <h2>Nueva Materia</h2>
        <?php if($mensaje) echo "<p style='color:#4CAF50; font-weight:bold;'>$mensaje</p>"; ?>
        <form method="POST" action="">
            <p>Nombre de la Materia:</p>
            <input type="text" name="nombre_materia" required>
            <br><br>
            <input type="submit" value="Crear Materia">
        </form>
        <br>
        <a href="menu_director.php" style="text-decoration: none; color: #888;">Volver al Menú</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>