<?php
session_start();
if ($_SESSION['rol'] != 'profesor') { header("Location: login.php"); exit; }
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Alumnos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central" style="width: 800px;">
        <h2>Listado de Alumnos</h2>
        <table>
            <tr><th>Nombre</th><th>Grado</th><th>Acción</th></tr>
            <?php
            $sql = "SELECT * FROM alumnos";
            $res = $conexion->query($sql);
            while($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['grado']."</td>";
                echo "<td><a href='baja_alumno.php?id=".$row['id_alumno']."' onclick='return confirm(\"¿Dar de baja?\")' style='color:#D32F2F; font-weight:bold;'>Dar de Baja</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <a href="menu_director.php" class="boton-menu" style="width: 200px;">Volver</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>