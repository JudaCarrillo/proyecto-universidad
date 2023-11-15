let idMateria;

$(document).ready(function () {
  window.obtenerMaterias = function () {
    $.ajax({
      type: "GET",
      url: "../controllers/course/getCourses.php",
      dataType: "json",
      success: function (materias) {
        let $tbody = $("table tbody");
        $tbody.empty();

        materias.forEach(function (materia, index) {
          let newRow = "<tr>";

          newRow += "<td>" + (index + 1) + "</td>";
          newRow += "<td>" + materia.nombre + "</td>";
          newRow += "<td>" + materia.nombreCarrera + "</td>";
          newRow += "<td>" + materia.nombreProfesor + "</td>";
          newRow += "<td>" + materia.horaInicio + "</td>";
          newRow += "<td>" + materia.horaFin + "</td>";

          newRow +=
            "<td>" +
            '<button class="inscribirse-btn z-3 position-relative"  type="button" data-id-materia="' +
            materia.idMateria +
            '">' +
            "Inscribirse" +
            "</button>" +
            "</td>";

          newRow += "</tr>";
          $tbody.append(newRow);
        });

        $(".inscribirse-btn").on("click", function () {
          idMateria = $(this).data("id-materia");
          inscribirAlumnoEnMateria(idMateria);
        });
      },
      error: function () {
        console.error("Error al obtener los datos de la materia ");
      },
    });
  };

  obtenerMaterias();

  function inscribirAlumnoEnMateria(idMateria) {
    $.ajax({
      type: "POST",
      url: "../controllers/student/enroll.php",
      data: { idMateria: idMateria },
      dataType: "json",
      success: function (response) {
        alert(response.message);
        $("button[data-id-materia='" + idMateria + "']")
          .closest("tr")
          .remove();
      },
    });
  }
});
