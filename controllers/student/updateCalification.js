var usuarioId;
var nombreAlumno;
var nombreMateria;

var idMateria;
var idAlumno;

function getMateriaId(materiaName) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "GET",
      url: "../controllers/student/getMateriaId.php",
      data: { materia: materiaName },
      dataType: "json",
      success: function (response) {
        resolve(response);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
}

function getAlumnoId(alumnoName) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "GET",
      url: "../controllers/student/getAlumnoId.php",
      data: { alumno: alumnoName },
      dataType: "json",
      success: function (response) {
        resolve(response);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
}

$(document).ready(function () {
  window.obtenerCalificaciones = function () {
    $.ajax({
      type: "GET",
      url: "../controllers/student/getStudents.php",
      dataType: "json",
      success: function (alumnos) {
        let $tbody = $("table tbody");
        $tbody.empty();

        alumnos.forEach(function (alumno, index) {
          let newRow = "<tr>";

          if (alumno.nota == null) {
            alumno.nota = 0;
          }

          newRow += "<td>" + (index + 1) + "</td>";
          newRow += "<td>" + alumno.nombreMateria + "</td>";
          newRow += "<td>" + alumno.nombreAlumno + "</td>";
          newRow += "<td>" + alumno.nota + "</td>";
          newRow +=
            "<td>" +
            '<button class="edit-btn z-3 position-relative" type="button" data-bs-toggle="modal" data-bs-target="#registroModal" data-calification-id="' +
            alumno.idNotas +
            '">' +
            '<i class="bx bxs-edit"></i>' +
            "</button>" +
            "</td>";

          newRow += "</tr>";
          $tbody.append(newRow);
        });
      },
      error: function () {
        console.error("Error al obtener los datos de la materia ");
      },
    });
  };

  obtenerCalificaciones();

  $(document).on("click", ".edit-btn", function () {
    usuarioId = $(this).data("calification-id");
    nombreMateria = $(this).closest("tr").find("td:eq(1)").text();
    nombreAlumno = $(this).closest("tr").find("td:eq(2)").text();

    $("input[name='nombre_alumno']").val(nombreAlumno);
    $("input[name='nombre_materia']").val(nombreMateria);

    getMateriaId(nombreMateria).then(function (materiaId) {
      getAlumnoId(nombreAlumno).then(function (alumnoId) {
        idMateria = materiaId.id;
        idAlumno = alumnoId.id;

        console.log(idMateria);
        console.log(idAlumno);
        console.log(nombreAlumno);
        console.log(nombreMateria);

        $.ajax({
          type: "GET",
          url: "../controllers/student/getStudentById.php",
          data: { id: usuarioId },
          dataType: "json",
          success: function (usuario) {
            $("input[name='calificacion']").val(usuario.nota);
          },
          error: function () {
            console.error("Error al obtener datos del usuario: " + usuarioId);
          },
        });
      });
    });
  });

  $(".mnm_calification").submit(function (event) {
    event.preventDefault();

    let nota = $("input[name='calificacion']").val();

    if (nota.trim() === "" || isNaN(nota) || !(0 <= nota && nota <= 20)) {
      alert("Nota ingresada no válida.");
      return;
    }

    let datosActualizados = {
      nombreMateria: nombreMateria,
      nombreAlumno: nombreAlumno,
      nota: nota,
      idNotas: usuarioId,
      idMateria: idMateria,
      idAlumno: idAlumno,
    };

    $.ajax({
      type: "POST",
      url: "../controllers/student/updateCalification.php",
      data: datosActualizados,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.message);
          obtenerCalificaciones();
          $("#registroModal").modal("hide");
        } else {
          alert(response.message);
        }
      },
    });
  });
});
