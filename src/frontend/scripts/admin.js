"use strict";

$("#crearProducto").click(function (e) { 
      e.preventDefault();
      $.ajax({
            type: "POST",
            url: "../../backend/crearProducto.php",
            data: $("#formCrearProducto").serialize(),
            dataType: "json",
            success: function (response) {
                  console.log(response);
                  
            },
            error: async function (status, error) {
                  console.error("Error en la petición AJAX:", status, error);
            }
      });
});