<?php
require __DIR__ . '/../../vendor/autoload.php';
$clienteMongo = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
$coleccion_productos = $clienteMongo->selectDatabase("tiendaOnline")->selectCollection("productos");
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){

      $inputNombre = trim($_POST['nombre']);
      $inputDescripcion = trim($_POST['descripcion']);
      $inputUrl_imagen = trim($_POST['url_imagen']);
      $inputPrecio = trim($_POST['precio']);
      $inputStock = trim(strval($_POST['stock']));
      $devolverObj = [];
  
      if( empty($inputNombre) || empty($inputDescripcion) || empty($inputUrl_imagen) || empty($inputPrecio) || empty($inputStock) ){
            $devolverObj["operacionEstado"]=false;
            $devolverObj["mensaje"]="Imposible, Faltan datos";
          
      }else{
            $consulta=$coleccion_productos->insertOne([
                  "nombre"=>$inputNombre,
                  "descripcion"=>$inputDescripcion,
                  "url_imagen"=>$inputUrl_imagen,
                  "precio"=>$inputPrecio,
                  "stock"=>$inputStock
            ]);
            
            if ($consulta->isAcknowledged()) {
                  $devolverObj["operacionEstado"]=true;
                  $devolverObj["mensaje"]="Producto creado con exito";
            }else{
                  $devolverObj["operacionEstado"]=false;
                  $devolverObj["mensaje"]="Error al crear el producto";
            }

      }
      echo json_encode($devolverObj);
}
?>