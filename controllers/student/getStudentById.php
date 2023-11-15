<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    include_once '../../config/conexion.php';

    try {
        $con = new Conexion();
        $sql = $con->getConexion();

        $idNotas = trim($_GET['id']);

        $query = "SELECT Materia.nombre AS nombreMateria, Materia.idMateria as idMateria, Alumnos.nombre AS nombreAlumno, Alumnos.idAlumno, Notas.nota, Notas.idNotas FROM Notas 
                    INNER JOIN Materia ON Notas.idMateria = Materia.idMateria
                    INNER JOIN Alumnos ON Notas.idAlumno = Alumnos.idAlumno
                    WHERE Notas.idNotas = '$idNotas'";
        $stmt = $sql->query($query);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($usuario);
        exit;
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => 'Error al conectar a la base de datos: ' . $e->getMessage()
        ];
        echo json_encode($response);
        exit;
    }
}
