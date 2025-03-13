"use strict";

$(document).ready(function () {
      $("#formLogin").submit(function (e) { 

            e.preventDefault();
            $.ajax({
                  method: "POST",
                  url: "http://localhost:3000/src/backend/validarLogin.php",
                  data:$("#formLogin").serialize(),
                  //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                  success: async function (response) { 
                        console.log( response);  
                  },
                  error: async function (status, error) {
                        console.error("Error en la petición AJAX:", status, error);
                  }
            });
           


      });
});

/*
let respuesta = await response;
if (!respuesta.message.logeado) {
      if ($("#error-mensaje").text()=="Error contraseña o Usuario incorrecto") {
            
            $("#error-mensaje").empty();
            $("#error-mensaje").append("Vuelvelo a intentar");
            
      }else{
            $("#error-mensaje").empty();
            $("#error-mensaje").append("Error contraseña o Usuario incorrecto");
      }
      return;
    
}
else {
      location.assign("http://127.0.0.1:3000/frontend/pages/inicio.html");
}*/