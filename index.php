<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css">    
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div id="loginContainer">
        <div class="text-center">
            <img src="./assets/img/logo-senati.png" alt="Logo" id="logo">
        </div>
        <form class="login" id="loginForm" action="./controllers/auth/login.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="loginButton">Iniciar Sesión</button>
        </form>
    </div>

    <!-- script / jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- script / js -->
    <script src="./controllers/auth/login.js"></script>

</body>


</html>