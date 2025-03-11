<?php

header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../../vendor/autoload.php';
$instanciaClienteMongo = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
//Anotacion:Validar cliente mongo
$coleccion_sesiones = $instanciaClienteMongo->selectDatabase("tiendaOnline")->selectCollection("sesiones");
session_start();
$_SESSION["POST"]=$_POST;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
      #session_start();
      $usuario = trim($_POST['usuario']);
      $contraseña = trim($_POST['contraseña']);
      $consulta =$coleccion_sesiones -> findOne( ["usuario" => $usuario] );#->toArray();
      #$consulta->acknowledged();
      #$consulta["esAdmin"],
      #$esAdmin;
      #$esLogeado=$consulta["contraseña"]===$contraseña;
      echo json_encode([
            #"estadoPeticion"=>true,
            "esAdmin"=>$consulta,
            "esLogeado"=>$consulta,
      ]);
}else{
      echo json_encode(["error" => "Proceso no Permitido","status" =>500]);
      die();
}