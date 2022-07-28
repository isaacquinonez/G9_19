<?php  

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once ("../CONFIG/Conexion.php"); 
    require_once ("../MODELS/CLIENTE.php "); 
    $cliente=new Clientes();

    $body=json_decode(file_get_contents("php://input"),true) ;

    switch ($_GET["op"]) {


  	    case 'GetClientes':
            $dato=$cliente->get_clientes();
            echo json_encode($dato);
        break;

        case 'GetCliente':
            $dato=$cliente->get_cliente($body["NUMERO_CLIENTE"]);
            echo json_encode($dato);
        break;

        case 'InsertCliente':
            $dato=$cliente->insert_cliente($body["NUMERO_CLIENTE"], $body["NOMBRE"], $body["APELLIDOS"], $body["FECHA_REGISTRO"], $body["DIRECCION_CLIENTE"], $body["RTN"], $body["EMAIL"]);
            echo json_encode("Cliente Agregado");
        break;

        case 'UpdateCliente':
            $dato=$cliente->update_cliente($body["NOMBRE"], $body["APELLIDOS"], $body["FECHA_REGISTRO"], $body["DIRECCION_CLIENTE"], $body["RTN"], $body["EMAIL"], $body["NUMERO_CLIENTE"]);
            echo json_encode("Cliente Actualizado");
        break;

        case 'DeleteCliente':
            $dato=$cliente->delete_cliente($body["NUMERO_CLIENTE"]);
            echo json_encode("El registro fue eliminado");
        break;

    }
        

?>        