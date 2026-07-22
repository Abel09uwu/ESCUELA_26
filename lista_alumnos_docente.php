<?php
session_start();
if ($_SESSION['rol'] != 'estudiante') { header("Location: login.php"); exit; }
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compañeros</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central" style="width: 800px;">
        <h2>Directorio de Estudiantes</h2>
        <table>
            <tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Grupo</th></tr>
            <?php
            $sql = "SELECT * FROM alumnos";
            $res = $conexion->query($sql);
            while($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id_alumno']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['edad']."</td>";
                echo "<td>".$row['grado']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <a href="menu_docente.php" class="boton-menu" style="width: 200px;">Volver</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>