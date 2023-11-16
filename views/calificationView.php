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
    <!-- css / btn -->
    <link rel="stylesheet" href="../assets/css/button.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <header>
        <img src="../assets/img/logo-senati.png" alt="Logo Senati">
    </header>

    <div class="course">
        <h1>Lista de Calificaciones</h1>

        <div class="table-container">
            <table class=" table-dark table table-responsive table-striped w-75">
                <thead>
                    <th>#</th>
                    <th>Materia</th>
                    <th>Nota</th>
                </thead>

                <tbody></tbody>
            </table>
        </div>

        <footer>
            <a href="./studentView.php" class="button">Regresar</a>
        </footer>

    </div>

    <!-- bootstrap / js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- script / mostrar notas -->
    <script src="../controllers/calification/updateTable.js"></script>

</body>

</html>