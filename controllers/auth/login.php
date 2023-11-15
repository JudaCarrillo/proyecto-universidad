<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // estableciendo conexion
    require_once '../../config/conexion.php';
    $con = new Conexion();
    $sql = $con->getConexion();

    // obteniendo valores
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    // validando inputs vacios
    if (empty($correo) || empty($contrasena)) {
        $response = [
            'success' => false,
            'message' => 'Por favor complete los campos obligatorios'
        ];

        echo json_encode($response);
        exit;
    }

    // validando si es profesor o estudiante
    try {
        if (strpos($correo, 'edu') !== false) {
            $sentencia = $sql->prepare('SELECT * FROM profesor WHERE correo = ? LIMIT 1');
        } else {
            $sentencia = $sql->prepare('SELECT * FROM alumnos WHERE correo = ? LIMIT 1');
        }

        $sentencia->execute([$correo]);
        $usuario_data = $sentencia->fetch(PDO::FETCH_ASSOC);

        // Validando usuario con contraseña
        if ($usuario_data && password_verify($contrasena, $usuario_data['contraseña'])) {
            $_SESSION['nombre'] = $usuario_data['nombre'];
            $response = [
                'success' => true,
                'message' => 'Iniciando sesión...',
            ];

            echo json_encode($response);
            exit;
        } else {
            $response = [
                'success' => false,
                'message' => 'Error credenciales invalidas'
            ];

            echo json_encode($response);
            exit;
        }
    } catch (PDOException $e) {
        // Manejar el error de la base de datos
        $response = [
            'success' => false,
            'message' => 'Error en la base de datos: ' . $e->getMessage()
        ];
        echo json_encode($response);
        exit;
    }
}
