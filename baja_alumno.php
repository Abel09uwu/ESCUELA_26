<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'profesor') {
    header("Location: login.php");
    exit;
}
include 'conexion.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM alumnos WHERE id_alumno = $id";
    if ($conexion->query($sql) === TRUE) {
        header("Location: lista_alumnos_director.php");
        exit;
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    header("Location: lista_alumnos_director.php");
    exit;
}
?>