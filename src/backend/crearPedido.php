<?php

require __DIR__ . '/../../vendor/autoload.php';
$clienteMongo = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
$coleccion_pedidos = $clienteMongo->selectDatabase("tiendaOnline")->selectCollection("carrito");
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){

      $id_usuarioActual = $_SESSION["sesionActual"]["_id"];
      $id_producto = $_POST["id_producto"];
      $fecha_pedido = trim($_POST["fecha_pedido"]);
      $devolverObj();
      $coleccion_pedidos->insertOne([
            "aprobado"=>null,
            "fecha_pedido"=>null,
            "id_usuario"=>$id_usuarioActual,
            "id_producto"=>$id_producto
      ]);
}