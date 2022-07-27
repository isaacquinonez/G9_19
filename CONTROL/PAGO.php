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

    require_once ("../CONFIG/Conexion.php"); 
    require_once ("../MODELS/PAGO.php "); 
    $pagos=new Pagos();

    $body=json_decode(file_get_contents("php://input"),true) ;

    switch ($_GET["op"]) {


  	    case "GetPagos":
            $dato=$pagos->get_pagos();
            echo json_encode($dato);
        break;

        case "GetPago":
            $dato=$pagos->get_pago($body["NUMERO_DE_PAGO"]);
            echo json_encode($dato);
        break;

        case "InsertPago":
            $dato=$pagos->insert_pago($body["NUMERO_DE_PAGO"],$body["FECHA_DE_PAGO"],$body["MONTO_DE_PAGO"],$body["TIPO_DE_PAGO"],$body["NUMERO_DE_PEDIDO"],$body["EMPRESA"]);
            echo json_encode("Pago Agregado");
        break;

    }
        /*,$body["X"] */

?>  