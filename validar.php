<?php
session_start();
include 'conexion.php';
if (isset($_POST['usuario']) && isset($_POST['pwd'])) {
    $u = $_POST['usuario'];
    $p = $_POST['pwd'];
    $sql = "SELECT * FROM usuarios WHERE usuario = '$u' AND password = '$p'";
    $res = $conexion->query($sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['rol'] = $row['rol'];
        if ($row['rol'] == 'profesor') {
            echo "<script>location.href='menu_director.php';</script>";
        } else {
            echo "<script>location.href='menu_docente.php';</script>";
        }
        exit;
    } else {
        echo "<script>alert('Datos incorrectos.'); location.href='login.php';</script>";
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>