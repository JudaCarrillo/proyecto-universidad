$(document).ready(function () {
  $(".login").submit(function (event) {
    event.preventDefault();

    let correo = $("input[name='correo']").val();
    let contrasena = $("input[name='contrasena']").val();

    if (correo.trim() === "" || contrasena.trim() === "") {
      alert("Campos obligatorios incompletos o vacíos");
      return;
    }

    $.ajax({
      type: "POST",
      url: "./controllers/auth/login.php",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $(".login")[0].reset();
          alert(response.message);

          if (response.type == "profesor") {
            window.location = "./views/teacherView.php";
          } else {
            window.location = "./views/studentView.php";
          }
        } else {
          alert(response.message);
        }
      },
    });
  });
});
