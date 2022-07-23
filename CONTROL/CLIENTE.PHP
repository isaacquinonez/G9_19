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

    require_once ("C:/xampp/htdocs/G9_19/CONFIG CONNECTION DB/conexion.php"); 
    require_once ("C:/xampp/htdocs/G9_19/MODELS CONEXION DB/CLIENTE.PHP "); 
    $cliente=new Clientes();

    $body=json_decode(file_get_contents("php://input"),true) ;

    switch ($GET["op"]) {


  	    case 'GetCliente':
            $dato=$cliente->get_cliente($body["NUMERO_CLIENTE"]);
            echo json_decode($dato);
        break;

    }
        

?>        