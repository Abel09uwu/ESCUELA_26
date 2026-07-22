<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); exit;
}
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Calificaciones</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="caja-central" style="width: 800px;">
        <h2>Calificaciones Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Materia</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT alumnos.nombre AS nombre_alumno, materias.nombre_materia AS nombre_materia, calificaciones.calificacion FROM calificaciones INNER JOIN alumnos ON calificaciones.id_alumno = alumnos.id_alumno INNER JOIN materias ON calificaciones.id_materia = materias.id_materia ORDER BY alumnos.nombre ASC";
                $result = $conexion->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nombre_alumno'] . "</td>";
                        echo "<td>" . $row['nombre_materia'] . "</td>";
                        $color = ($row['calificacion'] < 6) ? "#D32F2F" : "#333";
                        echo "<td style='color:$color; font-weight:bold;'>" . $row['calificacion'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Aún no hay calificaciones.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <?php
        $url_volver = ($_SESSION['rol'] == 'profesor') ? 'menu_director.php' : 'menu_docente.php';
        ?>
        <a href="<?php echo $url_volver; ?>" class="boton-menu" style="width: 200px;">Volver al Menú</a>
    </div>
    <?php include 'footer.php'; ?>


<script>
  function alternarDaltonismo() {
    // 1. Agrega o quita la clase en el <body>
    document.body.classList.toggle('modo-daltonismo');
    
    // 2. Guarda la elección para que no se borre al cambiar de página
    const activo = document.body.classList.contains('modo-daltonismo');
    localStorage.setItem('modoDaltonismo', activo ? 'activado' : 'desactivado');
  }

  // 3. Aplica el modo automáticamente si el usuario ya lo había activado
  document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('modoDaltonismo') === 'activado') {
      document.body.classList.add('modo-daltonismo');
    }
  });
</script>





</body>
</html>