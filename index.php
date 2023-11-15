<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- bootstrap / js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
    <div id="loginContainer">
        <div class="text-center">
            <img src="./assets/img/logo-senati.png" alt="Logo" id="logo">
        </div>
        <form id="loginForm">
            <div class="form-group">
                <input type="email" class="form-control" id="correo" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" required>
            </div>
            <button type="button" class="btn btn-primary btn-block" id="loginButton">Iniciar Sesión</button>
        </form>
    </div>
</body>

</html>