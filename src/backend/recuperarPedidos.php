<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../../vendor/autoload.php';
$clienteMongo = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
$coleccion_pedidos = $clienteMongo->selectDatabase("tiendaOnline")->selectCollection("pedidos");

$consulta =$coleccion_pedidos -> find ();
$listaPedidos=[];
foreach ($consulta as $cadaDocumento) {
      array_push($listaPedidos,$cadaDocumento);
}
echo json_encode($listaPedidos);