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
    <link rel="stylesheet" href="../assets/css/style_course.css">

</head>

<body>

    <header>
        <img src="../assets/img/logo-senati.png" alt="Logo Senati">
    </header>

    <div class="course">
        <h1>Lista de Cursos</h1>
        <i class='bx bx-user'></i>
        <div class="table-container">

        </div>

    </div>

</body>

</html>