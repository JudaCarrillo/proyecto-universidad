<?php
session_start();

include_once '../../config/conexion.php';
$con = new Conexion();
$pdo = $con->getConexion();

$idProfesor = $_SESSION['id'];

$sql = 'SELECT Materia.idMateria AS idMateria, Materia.nombre AS nombreMateria, Alumnos.nombre AS nombreAlumno, Notas.nota, Notas.idNotas AS idNotas, Alumnos.idAlumno AS idAlumno, Alumnos.correo AS correo
        FROM Materia
        INNER JOIN Alumnos_Materias ON Materia.idMateria = Alumnos_Materias.idMateria
        INNER JOIN Alumnos ON Alumnos_Materias.idAlumno = Alumnos.idAlumno
        LEFT JOIN Notas ON Materia.idMateria = Notas.idMateria AND Alumnos.idAlumno = Notas.idAlumno
        WHERE Materia.idProfesor = :idProfesor';

try {
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':idProfesor', $idProfesor, PDO::PARAM_INT);
    $sentencia->execute();

    $alumnos = [];

    while ($alumno = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $alumnos[] = [
            'idMateria' => $alumno['idMateria'],
            'idAlumno' => $alumno['idAlumno'],
            'idNotas' => $alumno['idNotas'],
            'nombreMateria' => $alumno['nombreMateria'],
            'nombreAlumno' => $alumno['nombreAlumno'],
            'correoAlumno' => $alumno['correo'],
            'nota' => $alumno['nota']
        ];
    }

    echo json_encode($alumnos);
} catch (PDOException $ex) {
    echo json_encode(['error' => 'Error al obtener los datos del alumno']);
}
