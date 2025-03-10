<?php

#header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../../vendor/autoload.php';
$instanciaClienteMongo = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
//Anotacion:Validar cliente mongo
$coleccion_sesiones = $instanciaClienteMongo->selectDatabase("tiendaOnline")->selectCollection("sesiones");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
      session_start();
      $usuario = trim($_POST['usuarioNombre']);
      $contraseña = trim($_POST['contraseña']);

      $consulta =$coleccion_sesiones ->find( ["usuario" => "santiago894"] )->toArray();
      echo json_encode($consulta);
}else{
      header("");
      die("Proceso no Permitido");
}