$(document).ready(function () {
  window.obtenerHorario = function () {
    $.ajax({
      type: "GET",
      url: "../controllers/timetable/getTimeTable.php",
      dataType: "json",
      success: function (horarios) {
        let $tbody = $("table tbody");
        $tbody.empty();

        horarios.forEach(function (horario, index) {
          let newRow = "<tr>";

          newRow += "<td>" + horario.nombre + "</td>";
          newRow += "<td>" + horario.nombreProfesor + "</td>";
          newRow += "<td>" + horario.horaInicio + "</td>";
          newRow += "<td>" + horario.horaFin + "</td>";
          newRow += "</tr>";
          $tbody.append(newRow);
        });
      },
      error: function () {
        console.error("Error al obtener los datos de la materia ");
      },
    });
  };

  obtenerHorario();
});
