<?php

#header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../../vendor/autoload.php';
$instanciaClienteMongo = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
//Anotacion:Validar cliente mongo
$coleccion_sesiones = $instanciaClienteMongo->selectDatabase("tiendaOnline")->selectCollection("sesiones");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $usuario = "admin";#trim($_POST['inputUsuario']);
      $contraseña = "admin";#trim($_POST['inputContraseña']);
      $consulta = $coleccion_sesiones ->insertOne( ["usuario" => $usuario,"contraseña"=>$contraseña,"esAdmin"=>false] );
      $resultado = [
            'insertedId' => (string) $consulta->getInsertedId(),
            'acknowledged' => $consulta->isAcknowledged()
        ];
        
        if ($consulta->isAcknowledged()) {
            header("login");
        }else{
            header("registro");
        }
}else{
      header("");
      die("Proceso no Permitido");
}