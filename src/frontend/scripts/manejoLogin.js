"use strict";
let intentosLogin=0;
$(document).ready(function () {
      $("#formLogin").submit(function (e) { 

            e.preventDefault();
            $.ajax({
                  method: "POST",
                  url: "../../backend/validarLogin.php",
                  data:$("#formLogin").serialize(),
                  //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                  success: async function (response) { 
                        console.log( response);  
                        if (response.estaLogeado && response.esAdmin) {
                              console.log("logeado Admin");
                              window.location.assign("../pages/inicio.html");
                              
                        }else if (response.estaLogeado) {
                              window.location.assign("../pages/inicio.html");
                              console.log("logeado");
                        }else{
                              $("#usuario").val("");
                              $("#contraseña").val("");
                              $("#errores").empty();
                              $("#errores").append(intentosLogin<5?"Usuario o Contraseña incorrecta,Intentalo de nuevo":"Demasiados intentos, Prueba mas tarde");
                              console.log("estado 200, Sevidor responde");
                              intentosLogin++;
                        }
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