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
<<<<<<< HEAD
    <img src="./assets/img/logo-senati.png" alt="Logo SENATI">
    <div class="login-container">
        <p>Acceder</p>

        <form action="" method="post">
            <input type="email" placeholder="Ingrese su correo" name="email" required>
            <input type="password" placeholder="Ingrese su contraseña" name="psw" required>
            <button type="submit">Continuar</button>
=======
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
>>>>>>> f67957c3224f1b4981a5f4bdab86f69e89f22b7b
        </form>
    </div>
</body>


</html>