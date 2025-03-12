<?php

header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../../vendor/autoload.php';
$clienteMongo = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
//Anotacion:Validar cliente mongo
$coleccion_sesiones = $clienteMongo->selectDatabase("tiendaOnline")->selectCollection("sesiones");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $devolverObj=[];
      $inputUsuario = trim($_POST['usuario']);
      $inputContraseña = trim($_POST['contraseña']);
      $consultaValidacion = $coleccion_sesiones -> findOne( ["usuario" => $inputUsuario, "contraseña"=>$inputContraseña] );#->toArray();

      if ( $consultaValidacion === null) {
            $devolverObj["esAdmin"]=false;
            $devolverObj["estaLogeado"]=false;
      }
      elseif($consultaValidacion !== null){
            $devolverObj["esAdmin"]=$consultaValidacion["esAdmin"];
            $devolverObj["estaLogeado"]=true;
            #Almacenar datos del usuario 
            $_SESSION["sesionActual"]=[ "_id"=>$consultaValidacion["_id"], "esAdmin"=>$consultaValidacion["esAdmin"]];
      }

      echo json_encode($devolverObj);
      die();
}else{
      echo json_encode([
            "estaLogeado"=>false,
            "esAdmin"=>false,
            "mensaje" => "Error,Proceso no Permitido (solo admite peticiones POST)",
            "status" =>500
            ]
      );
      die();
}