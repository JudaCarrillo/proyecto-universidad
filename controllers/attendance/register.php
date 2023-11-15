<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // estableciendo conexion
    require_once '../../config/conexion.php';

    $con = new Conexion();
    $sql = $con->getConexion();

    // obteniendo valores
    $idMateria = $_POST['idMateria'];
    $idAlumno = $_POST['idAlumno'];
    $type = $_POST['type'];


    // sentencia
    $sentencia = $sql->prepare("INSERT INTO Asistencia (idAlumno, idMateria, tipo) VALUES (?, ?, ?)");

    try {
        if ($sentencia->execute([$idAlumno, $idMateria, $type])) {
            $response = [
                'success' => true,
                'message' => 'Asistencia registrada con éxito.',
                'registro' => [
                    'idMateria' => $idMateria,
                    'idAlumno' => $idAlumno,
                    'tipo' => $type
                ],
            ];
            echo json_encode($response);
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $response = [
                'success' => false,
                'message' => 'Ya estás registrado la asistencia.'
            ];
            echo json_encode($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'Error al registrar la asistencia: ' . $e->getMessage()
            ];
            echo json_encode($response);
        }
    }
    exit;
}
