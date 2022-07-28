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
    require_once ("../MODELS/PEDIDO.php "); 
    $pedido = new Pedidos();

    $body=json_decode(file_get_contents("php://input"),true) ;

    switch ($_GET["op"]) {


        case "GetPedidos":
          $dato=$pedido->get_pedidos();
          echo json_encode($dato);
      break;

        case "GetPedido":
          $dato=$pedido->get_pedido($body["NUMERO_PEDIDO"]);
          echo json_encode($dato);
        break;

        case "InsertPedido":
          $dato=$pedido->insert_pedido($body["NUMERO_PEDIDO"], $body["NUMERO_CLIENTE"], $body["EMPRESA"], $body["FECHA_PEDIDO"], $body["DIRECCION"], $body["TIPO_DE_PAGO"], $body["MONTO_TOTAL"] );
          echo json_encode("Pedido Agregado");
      break;

      case "UpdatePedido":
          $dato=$pedido->update_pedido( $body["NUMERO_CLIENTE"], $body["EMPRESA"], $body["FECHA_PEDIDO"], $body["DIRECCION"], $body["TIPO_DE_PAGO"], $body["MONTO_TOTAL"], $body["NUMERO_PEDIDO"] );
          echo json_encode("Pedido Actualizado");      
  
      break;

      case "DeletePedido":  
        $dato=$pedido->delete_pedido($body["NUMERO_PEDIDO"]);
        echo json_encode("Pedido Eliminado");      

      break;

    }
        

?>             