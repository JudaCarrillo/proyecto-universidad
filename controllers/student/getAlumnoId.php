<?php
include_once '../../config/conexion.php';
$alumno = $_GET['alumno'];

$con = new Conexion();
$pdo = $con->getConexion();

$sql = "SELECT idAlumno AS id FROM Alumnos WHERE nombre = :nombre";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $alumno, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(['id' => $result['id']]);
} catch (PDOException $ex) {
    echo json_encode(['error' => 'Error fetching ID']);
}
