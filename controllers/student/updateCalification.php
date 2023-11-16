<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../config/conexion.php';

    try {
        $con = new Conexion();
        $sql = $con->getConexion();

        $materia = $_POST['nombreMateria'];
        $alumno = $_POST['nombreAlumno'];
        $nota = trim($_POST['nota']);
        $idNotas = isset($_POST['idNotas']) ? trim($_POST['idNotas']) : null;

        if (empty($materia) || empty($alumno)) {
            $response = [
                'success' => false,
                'message' => 'Campos obligatorios incompletos o vacíos.'
            ];

            echo json_encode($response);
            exit;
        }

        if (!(0 <= $nota && $nota <= 20)) {
            $response = [
                'success' => false,
                'message' => 'Nota ingresada no válida.'
            ];

            echo json_encode($response);
            exit;
        }

        if (empty($idNotas)) {
            $idAlumno = trim($_POST['idAlumno']);
            $idMateria = trim($_POST['idMateria']);

            $query = "INSERT INTO Notas (idMateria, idAlumno, nota) VALUES ('$idMateria', '$idAlumno', $nota)";
            $stmt = $sql->prepare($query);

            if ($stmt->execute()) {
                $response = [
                    'success' => true,
                    'message' => 'Nota registrada con éxito.'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error al registrar.',
                    'registro' => [
                        'idmateria' => $idMateria,
                        'idalumno' => $idAlumno,
                        'nota' => $nota,
                        'tipo' => 'registro'
                    ]
                ];
            }

            echo json_encode($response);
            exit;
        } else {
            $query = "UPDATE Notas SET nota = '$nota' WHERE idNotas = '$idNotas'";
            $stmt = $sql->prepare($query);

            if ($stmt->execute()) {
                $response = [
                    'success' => true,
                    'message' => 'Cambios guardados con éxito.',
                    'registro' => [
                        'nota' => $nota,
                        'idnotas' => $idNotas,
                        'tipo' => 'actualizacion'
                    ]
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error al actualizar.'
                ];
            }

            echo json_encode($response);
            exit;
        }
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => 'Error al conectar a la base de datos: ' . $e->getMessage()
        ];
        echo json_encode($response);
        exit;
    }
}
