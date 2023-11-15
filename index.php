<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #loginContainer {
            max-width: 250px;
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.3);
            background-color: #ffffff;
        }

        img{
            width: 190px;
            
        }
        #logo {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        #loginForm {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        #loginButton {
            background-color: #2600ff;
            border-color: #2600ff;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.2);
        }

        #loginButton:hover {
            background-color: #2600ff;
            border-color: #2600ff;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="loginContainer">
        <div class="text-center">
            <img src="./assets/img/logo.png" alt="Logo" id="logo">
        </div>
        <form id="loginForm">
            <div class="form-group">
                <input type="email" class="form-control" id="correo" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" required>
            </div>
            <button type="button" class="btn btn-primary btn-block" id="loginButton" onclick="iniciarSesion()">Iniciar Sesión</button>
        </form>
    </div>

    <script>
        function iniciarSesion() {
            alert("Lógica de inicio de sesión aquí");
        }
    </script>
</body>