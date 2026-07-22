<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'profesor') {
    header("Location: login.php");
    exit;
}
include 'conexion.php';
$alumnos = $conexion->query("SELECT id_alumno, nombre FROM alumnos");
$materias = $conexion->query("SELECT id_materia, nombre_materia FROM materias");
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_alumno = $_POST['id_alumno'];
    $id_materia = $_POST['id_materia'];
    $calificacion = $_POST['calificacion'];
    $sql = "INSERT INTO calificaciones (id_alumno, id_materia, calificacion) VALUES ('$id_alumno', '$id_materia', '$calificacion')";
    if ($conexion->query($sql) === TRUE) {
        $mensaje = "¡Calificación registrada!";
    } else {
        $mensaje = "Error: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Capturar Calificaciones</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central">
        <h2>Asignar Calificación</h2>
        <?php if($mensaje) echo "<p style='color:#4CAF50; font-weight:bold;'>$mensaje</p>"; ?>
        <form method="POST" action="">
            <p>Selecciona Alumno:</p>
            <select name="id_alumno" required>
                <option value="">-- Elige un alumno --</option>
                <?php 
                if($alumnos->num_rows > 0){
                    while($row = $alumnos->fetch_assoc()) { 
                        echo "<option value='".$row['id_alumno']."'>".$row['nombre']."</option>"; 
                    } 
                }
                ?>
            </select>
            <p>Selecciona Materia:</p>
            <select name="id_materia" required>
                <option value="">-- Elige la materia --</option>
                <?php 
                if($materias->num_rows > 0){
                    while($row = $materias->fetch_assoc()) { 
                        echo "<option value='".$row['id_materia']."'>".$row['nombre_materia']."</option>"; 
                    }
                } else {
                    echo "<option value=''>No hay materias registradas</option>";
                }
                ?>
            </select>
            <p>Calificación (0-10):</p>
            <input type="text" name="calificacion" required>
            <br><br>
            <input type="submit" value="Guardar Calificación">
        </form>
        <br>
        <a href="menu_director.php" style="text-decoration: none; color: #888;">Volver al Menú</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>