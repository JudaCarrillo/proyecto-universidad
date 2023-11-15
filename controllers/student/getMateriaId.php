<?php
include_once '../../config/conexion.php';
$materia = $_GET['materia'];

$con = new Conexion();
$pdo = $con->getConexion();

$sql = "SELECT idMateria AS id FROM Materia WHERE nombre = :nombre";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $materia, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(['id' => $result['id']]);
} catch (PDOException $ex) {
    echo json_encode(['error' => 'Error fetching ID']);
}
