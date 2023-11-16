$(document).ready(function () {
  window.obtenerCalificaciones = function () {
    $.ajax({
      type: "GET",
      url: "../controllers/calification/getCalifications.php",
      dataType: "json",
      success: function (calificaciones) {
        let $tbody = $("table tbody");
        $tbody.empty();

        calificaciones.forEach(function (calificacion, index) {
          let newRow = "<tr>";

          newRow += "<td>" + (index + 1) + "</td>";
          newRow += "<td>" + calificacion.nombre + "</td>";
          newRow += "<td>" + calificacion.nota + "</td>";

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
});
