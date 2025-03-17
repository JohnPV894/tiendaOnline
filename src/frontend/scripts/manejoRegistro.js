"use strict";
let intentosLogin=0;
$(document).ready(function () {
      $("#formRegistro").submit(function (e) { 

            e.preventDefault();
            $.ajax({
                  method: "POST",
                  url: "../../backend/registrarSesion.php",
                  data:$("#formRegistro").serialize(),
                  datatype:"json",
                  //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                  success: async function (response) { 
                        console.log(await response);
                        console.log("a");
                        
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