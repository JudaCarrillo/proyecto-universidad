<?php
session_start();

include_once '../../config/conexion.php';
$con = new Conexion();
$pdo = $con->getConexion();

$idProfesor = $_SESSION['id'];

$sql = 'SELECT Materia.idMateria, Materia.nombre AS nombreMateria, Carrera.nombre AS nombreCarrera, Profesor.nombre AS nombreProfesor,
        Horario.horaInicio, Horario.horaFin, Aulas.nombre AS nombreAula, Laboratorios.nombre AS nombreLaboratorio
        FROM Materia
        INNER JOIN Carrera ON Materia.idCarrera = Carrera.idCarrera
        INNER JOIN Profesor ON Materia.idProfesor = Profesor.idProfesor
        INNER JOIN Horario ON Materia.idMateria = Horario.idMateria
        LEFT JOIN Aulas ON Horario.idAula = Aulas.idAula
        LEFT JOIN Laboratorios ON Horario.idLaboratorio = Laboratorios.idLaboratorio
        WHERE Materia.idProfesor = :idProfesor
        AND (Horario.idAula IS NOT NULL OR Horario.idLaboratorio IS NOT NULL)
        ORDER BY Horario.horaInicio';

try {
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':idProfesor', $idProfesor, PDO::PARAM_INT);
    $sentencia->execute();

    $horarios = [];

    while ($horario = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $horarios[] = [
            'idMateria' => $horario['idMateria'],
            'nombreMateria' => $horario['nombreMateria'],
            'nombreCarrera' => $horario['nombreCarrera'],
            'nombreProfesor' => $horario['nombreProfesor'],
            'horaInicio' => $horario['horaInicio'],
            'horaFin' => $horario['horaFin'],
            'nombreSalon' => $horario['nombreAula'] ?: $horario['nombreLaboratorio']
        ];
    }

    echo json_encode($horarios);
} catch (PDOException $ex) {
    echo json_encode(['error' => 'Error al obtener los datos de la materia']);
}
