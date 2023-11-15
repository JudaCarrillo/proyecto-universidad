<?php
session_start();
include_once '../config/conexion.php';

if (!isset($_SESSION['nombre'])) {
    header('Location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senati</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/styleStudent.css">
</head>

<body>

    <header>
        <img src="../assets/img/logo-senati.png" alt="Logo Senati">
    </header>

    <div class="img">
        <div class="box">
            <a href="">
                <img src="../assets/img/horario.png" alt="registrar">
                <p>Horario de clases</p>
            </a>
        </div>

        <div class="box">
            <a href="">
                <img src="../assets/img/registrar.png" alt="horario">
                <p>Registrar un Curso</p>
            </a>
        </div>

        <div class="box">

            <a href="">
                <img src="../assets/img/notas.png" alt="asistencia">
                <p>Mis Notas</p>
            </a>
        </div>
    </div>
</body>

</html>