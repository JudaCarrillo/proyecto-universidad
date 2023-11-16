<?php
session_start();

include_once '../../config/conexion.php';
$con = new Conexion();
$pdo = $con->getConexion();

$idAlumno = $_SESSION['id'];

$sql = 'SELECT Materia.idMateria, Materia.nombre, Notas.nota
        FROM Notas
        INNER JOIN Materia ON  Notas.idMateria =  Materia.idMateria 
        WHERE idAlumno = :idAlumno';

try {
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':idAlumno', $idAlumno, PDO::PARAM_INT);
    $sentencia->execute();

    $calificaciones = [];

    while ($calificacion = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $calificaciones[] = [
            'idMateria' => $calificacion['idMateria'],
            'nombre' => $calificacion['nombre'],
            'nota' => $calificacion['nota']
        ];
    }

    echo json_encode($calificaciones);
} catch (PDOException $ex) {
    echo json_encode(['error' => 'Error al obtener los datos de la materia']);
}
