<?php
session_start();

include_once '../../config/conexion.php';
$con = new Conexion();
$pdo = $con->getConexion();

$idAlumno = $_SESSION['id'];

$sql = 'SELECT Materia.idMateria, Materia.nombre, Carrera.nombre AS nombreCarrera, Profesor.nombre AS nombreProfesor, Horario.horaInicio AS fechaHoraInicio, Horario.horaFin AS fechaHoraFin
        FROM Materia
        INNER JOIN Carrera ON Materia.idCarrera = Carrera.idCarrera
        INNER JOIN Profesor ON Materia.idProfesor = Profesor.idProfesor
        INNER JOIN Horario ON Materia.idMateria = Horario.idMateria
        INNER JOIN Alumnos_Materias ON Materia.idMateria = Alumnos_Materias.idMateria
        WHERE Alumnos_Materias.idAlumno = :idAlumno
        ORDER BY Horario.horaInicio';

try {
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':idAlumno', $idAlumno, PDO::PARAM_INT);
    $sentencia->execute();

    $horarios = [];

    while ($horario = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $horarios[] = [
            'idMateria' => $horario['idMateria'],
            'nombre' => $horario['nombre'],
            'nombreCarrera' => $horario['nombreCarrera'],
            'nombreProfesor' => $horario['nombreProfesor'],
            'horaInicio' => $horario['fechaHoraInicio'],
            'horaFin' => $horario['fechaHoraFin']
        ];
    }

    echo json_encode($horarios);
} catch (PDOException $ex) {
    echo json_encode(['error' => 'Error al obtener los datos de la materia']);
}
