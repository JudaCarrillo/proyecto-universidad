var idMateria;
var idAlumno;
var type;

$(document).ready(function () {
  window.obtenerAlumnos = function () {
    $.ajax({
      type: "GET",
      url: "../controllers/student/getStudents.php",
      dataType: "json",
      success: function (alumnos) {
        let $tbody = $("table tbody");
        $tbody.empty();

        alumnos.forEach(function (alumno, index) {
          let newRow = "<tr>";

          newRow += "<td>" + alumno.nombreMateria + "</td>";
          newRow += "<td>" + alumno.nombreAlumno + "</td>";

          newRow +=
            "<td>" +
            '<button class="edit-btn z-3 position-relative asistencia-btn" type="button" data-attendance-id="' +
            alumno.idAlumno +
            '" data-materia-id="' +
            alumno.idMateria +
            '" data-type-id="' +
            "Presente" +
            '">' +
            "Presente" +
            "</button>" +
            "</td>";

          newRow +=
            "<td>" +
            '<button class="edit-btn z-3 position-relative asistencia-btn" type="button" data-attendance-id="' +
            alumno.idAlumno +
            '" data-materia-id="' +
            alumno.idMateria +
            '" data-type-id="' +
            "Falta" +
            '">' +
            "Falta" +
            "</button>" +
            "</td>";

          newRow += "</tr>";
          $tbody.append(newRow);
        });

        $(".asistencia-btn").on("click", function () {
          idAlumno = $(this).data("attendance-id");
          idMateria = $(this).data("materia-id");
          type = $(this).data("type-id");

          console.log(idAlumno);
          console.log(idMateria);
          console.log(type);

          registrarAsistencia(idAlumno, idMateria, type);
        });
      },
      error: function () {
        console.error("Error al obtener los datos de la materia ");
      },
    });
  };

  obtenerAlumnos();

  function registrarAsistencia(idAlumno, idMateria, type) {
    $.ajax({
      type: "POST",
      url: "../controllers/attendance/register.php",
      data: { idAlumno: idAlumno, idMateria: idMateria, type: type },
      dataType: "json",
      success: function (response) {
        alert(response.message);
        $("button[data-id-materia='" + idAlumno + "']")
          .closest("tr")
          .remove();
      },
    });
  }
});
