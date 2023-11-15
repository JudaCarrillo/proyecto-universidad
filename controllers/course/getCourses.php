<?php
session_start();

include_once '../../config/conexion.php';
$con = new Conexion();
$pdo = $con->getConexion();

$idAlumno = $_SESSION['id'];

$sql = 'SELECT Materia.idMateria, Materia.nombre, Carrera.nombre AS nombreCarrera, Profesor.nombre AS nombreProfesor,
        Horario.horaInicio, Horario.horaFin
        FROM Materia
        INNER JOIN Carrera ON Materia.idCarrera = Carrera.idCarrera
        INNER JOIN Profesor ON Materia.idProfesor = Profesor.idProfesor
        INNER JOIN Horario ON Materia.idMateria = Horario.idMateria
        WHERE Materia.idMateria NOT IN (
            SELECT idMateria FROM Alumnos_Materias WHERE idAlumno = :idAlumno
        )';

try {
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':idAlumno', $idAlumno, PDO::PARAM_INT);
    $sentencia->execute();

    $materias = [];

    while ($materia = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $materias[] = [
            'idMateria' => $materia['idMateria'],
            'nombre' => $materia['nombre'],
            'nombreCarrera' => $materia['nombreCarrera'],
            'nombreProfesor' => $materia['nombreProfesor'],
            'horaInicio' => $materia['horaInicio'],
            'horaFin' => $materia['horaFin']
        ];
    }

    echo json_encode($materias);
} catch (PDOException $ex) {
    echo json_encode(['error' => 'Error al obtener los datos de la materia']);
}
