"use strict";

$(document).ready(function () {
      /**
       * Generar Productos en la página principal
       */
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
                              <img src="../imgs/productos/${response[i].url_imagen}" alt="">
                              <p class="id" style=display:none;>${response[i]._id["$oid"]}</p>
                              <p class="url_imagen" style=display:none;>${response[i].url_imagen}</p>
                              <p class="nombre" style=display:none;>${response[i].nombre}</p>
                              <p class="descripcion" style=display:none;>${response[i].descripcion}</p>
                              <p class="precio">€:${response[i].precio}</p>
                              <p class="stock">${response[i].stock}</p>
                        </div>`;
                        
                        
                        $("#cards-recomendados").append(stringDiv);
                  }

            },
            error: async function (status, error) {
                  console.error("Error en la petición AJAX:", status, error);
            }
      });
      $("#cards-recomendados").on("click",".card-item",function (e) { 
            e.preventDefault();
            let _id = $(this).find(".id").text();
            let nombre = $(this).find(".nombre").text();
            let url_imagen = $(this).find(".url_imagen").text();
            let descripcion = $(this).find(".descripcion").text();
            let precio = $(this).find(".precio").text();
            let stock = $(this).find(".stock").text();
            console.log(_id,nombre,descripcion,precio,stock,url_imagen);

            let stringDiv =`

            <div id="card-desplegable">
                  <img src="../imgs/productos/${url_imagen}" alt="" class="imagen-producto">
                  <div class="info-producto">
                        <p class="id" style=display:none;>${_id["$oid"]}</p>
                        <h2 class="nombre">${nombre}</h2>
                        <p class="descripcion" >${descripcion}</p>
                        <p class="precio"> ${precio}</p>
                        <p class="stock">Unidade: ${stock}</p>
                        <div class="botones">
                          <input type="button" value="CONFIRMAR" class="agregarProducto">
                          <input type="button" value="CANCELAR" class="cerrarDesplegable">
                      </div>
                  </div>
            </div>
            `;
            $("#desplegable_producto").empty();
            $("#desplegable_producto").append(stringDiv);
            $("#desplegable_producto").fadeIn();
      });     
      $("#desplegable_producto").on("click", ".cerrarDesplegable", function (e) {
            e.preventDefault();
            $("#desplegable_producto").fadeOut();
        });


});
//Generar un carito de comprar carrito=[lista de Id de productos]  
