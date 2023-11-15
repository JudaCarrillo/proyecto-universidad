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
          $(".form_login")[0].reset();
          alert(response.message);
          window.location = "./views/menuView.php";
        } else {
          alert(response.message);
        }
      },
    });
  });
});
