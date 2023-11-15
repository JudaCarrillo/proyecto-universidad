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
    <link rel="stylesheet" href="../assets/css/styleSAndT.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
=======
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
>>>>>>> 96ce9250c1d1c0e52d4d93eb39fa6c12947856d5
</head>

<body>

    <header>
        <img src="../assets/img/logo-senati.png" alt="Logo Senati">
    </header>

<<<<<<< HEAD
    <div class="icon">
    <p>alumno</p>
    <i class="bi bi-people"></i>
        
    </div>
=======
    <!-- acomodalo -->
    <i class='bx bx-user'></i>
>>>>>>> 96ce9250c1d1c0e52d4d93eb39fa6c12947856d5

    <div class="img">
        <div class="box">
            <a href="">
                <img src="../assets/img/horario.png" alt="registrar">
                <p>Horario de clases</p>
            </a>
        </div>

        <div class="box">
            <a href="./courseView.php" target="">
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

<<<<<<< HEAD
=======
        <div class="box">
>>>>>>> 96ce9250c1d1c0e52d4d93eb39fa6c12947856d5
            <a href="https://senati.blackboard.com" target="_blank">
                <img src="../assets/img/PlataformaExterna.png" alt="asistencia">
                <p>Plataforma Externa</p>
            </a>
        </div>
    </div>

<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
=======
    <footer>
        <a href="../controllers/auth/logout.php" class="btn btn-dark">Cerrar Sesión</a>
    </footer>
>>>>>>> 96ce9250c1d1c0e52d4d93eb39fa6c12947856d5
</body>

</html>