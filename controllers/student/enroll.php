<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // estableciendo conexion
    require_once '../../config/conexion.php';

    $con = new Conexion();
    $sql = $con->getConexion();

    // obteniendo valores
    $idMateria = $_POST['idMateria'];
    $idAlumno = $_SESSION['id'];

    // sentencia
    $sentencia = $sql->prepare("INSERT INTO Alumnos_Materias (idAlumno, idMateria) VALUES (?, ?)");

    try {
        if ($sentencia->execute([$idAlumno, $idMateria])) {
            $response = [
                'success' => true,
                'message' => 'Alumno registrado con éxito.',
                'registro' => [
                    'idMateria' => $idMateria,
                    'idAlumno' => $idAlumno
                ],
            ];
            echo json_encode($response);
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $response = [
                'success' => false,
                'message' => 'Ya estás registrado en esta materia.'
            ];
            echo json_encode($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'Error al registrarse a la materia: ' . $e->getMessage()
            ];
            echo json_encode($response);
        }
    }
    exit;
}
