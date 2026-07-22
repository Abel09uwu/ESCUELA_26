<?php
session_start();
include 'conexion.php';
if (isset($_SESSION['usuario'])) {
    $u = $_SESSION['usuario'];
    $conexion->query("DELETE FROM usuarios WHERE usuario = '$u'");
    session_unset();
    session_destroy();
}
header("Location: login.php");
exit;
?>