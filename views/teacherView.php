
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senati</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/styleSAndT.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header>
        <img src="../assets/img/logo-senati.png" alt="Logo Senati">
    </header>
    <div class="icon">
        <i class='bx bx-user'> Profesor</i>
    </div>
    
     <!-- Incluyendo dcapture -->
    <?php include '../controllers/capture/captureTeacher.php' ?>
    <div class="img">
        <div class="box">
            <a href="./timetable_tView.php">
                <img src="../assets/img/horario.png" alt="registrar">
                <p>Horario de clases</p>
            </a>
        </div>

        <div class="box">
            <a href="./attendanceView.php">
                <img src="../assets/img/registrar.png" alt="horario">
                <p>Registrar Asistencia</p>
            </a>
        </div>

        <div class="box">
            <a href="./mnmCalificationView.php">
                <img src="../assets/img/notas.png" alt="asistencia">
                <p>Gestionar Notas</p>
            </a>
        </div>

        <div class="box">
            <a href="https://senati.blackboard.com" target="_blank">
                <img src="../assets/img/PlataformaExterna.png" alt="asistencia">
                <p>Plataforma Externa</p>
            </a>
        </div>

    </div>

    <footer>

        <a href="../controllers/auth/logout.php" class="button">Cerrar Sesión</a>
        
    </footer>
    
</body>

</html>