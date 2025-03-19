"use strict";

$(document).ready(function () {

      $.ajax({
            method: "GET",
            url: "../../backend/recuperarProductos.php",
            data:"none",
            //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: async function (response) { 
                  console.log( response);  
                  for( let i = 0; i < response.length ; i++){
                        let stringDiv =`
                        <div class="card-item">
                        <h1>"../imgs/productos/${response[i].url_imagen}"</h1>
                        <img src="../imgs/productos/${response[i].url_imagen}" alt="">
                        </div>`;
                        console.log(stringDiv);
                        
                        $("#cards-recomendados").append(stringDiv);
                  }

            },
            error: async function (status, error) {
                  console.error("Error en la petición AJAX:", status, error);
            }
      });
           



});