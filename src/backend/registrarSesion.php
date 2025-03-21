<?php

header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../../vendor/autoload.php';
$clienteMongo = new MongoDB\Client("mongodb+srv://santiago894:P5wIGtXue8HvPvli@cluster0.6xkz1.mongodb.net/");
$coleccion_sesiones = $clienteMongo->selectDatabase("tiendaOnline")->selectCollection("sesiones");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $inputUsuario = trim($_POST['usuario']);
    $inputContraseña = trim($_POST['contraseña']);
    $inputCorreo = trim($_POST['correo']);
    $devolverObj = [];

    if( empty($inputUsuario) || empty($inputContraseña) || empty($inputCorreo) ){
        $devolverObj["operacionEstado"]=false;
        $devolverObj["mensaje"]="Imposible, Faltan datos";
        return;
        
    }
    else if ( $coleccion_sesiones->findOne(["usuario"=>$inputUsuario] ) ==! null ) {
        $devolverObj["operacionEstado"]=false;
        $devolverObj["mensaje"]="Cancelada, No se pueden crear usuario con el mismo nombre usuario";
        return;
    }
    else {
        $consultaCrear = $coleccion_sesiones ->insertOne( ["usuario" => $inputUsuario,"contraseña"=>$inputContraseña,"esAdmin"=>false,"correo"=>$inputCorreo] );
        if($consultaCrear->isAcknowledged()){
            $devolverObj["operacionEstado"]=true;
            $devolverObj["mensaje"]="Exitosa, Creado";
            
        }else{
            $devolverObj["operacionEstado"]=false;
            $devolverObj["mensaje"]="Operacion iniciada pero no completada no se creo";
            
        }
    }   
    echo json_encode($devolverObj);
}