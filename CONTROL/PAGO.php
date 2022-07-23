<?php  
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header ('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header ('Access-Control-Allow-Headers: token, Content-Type');
    header ('Access-Control-Max-Age: 1728000');
    header ('Content-Length: 0 ');
    header ('Content-Type: text/plain');
    die();
}

    header ('Access-Control-Allow-Origin: *');
    header ('Content-Type: application/json'); 

    require_once ("../G9_19/CONFIG CONNECTION DB/conexion.php"); 
    require_once ("../G9_19\MODELS CONEXION DB/PAGO.PHP "); 
    $pagos=new pagos();

    $body=json_decode(file_get_contents("php://input"),true) ;

    switch ($GET["op"]) {


  	    case 'Getpagos':
            $dato=$pagos->get_pagos($body["NUMERO_DE_PAGO"]);
            echo json_decode($dato);
        break;

    }
        

?>  