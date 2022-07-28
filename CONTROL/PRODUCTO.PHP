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
    require_once ("../MODELS/PRODUCTO.php "); 
    $Productos=new PRODUCTOS();

    $body=json_decode(file_get_contents("php://input"),true) ;

    switch ($_GET["op"]) {

  	   
        case 'GET_PRODUCTOS':
            $dato=$Productos->GET_PRODUCTOS();
            echo json_encode($dato);
        break;

        case "GET_PRODUCTO":
            $dato=$Productos->GET_PRODUCTO($body["Numero_de_Pedido"]);
            echo json_encode($dato);
        break;

        case "INSERT_PRODUCTO":
            $dato=$Productos->INSERT_PRODUCTO($body["Numero_de_Pedido"],$body["Nombre_de_Articulo"],$body["Precio_Unitario"],$body["Fecha_de_Pedido"],$body["Cantidad_de_Articulo"],$body["Monto_Total"],$body["Aplicar_Impuesto"]);
            echo json_encode("Producto Insertado");
        break;

        case 'updateproducto':
            $dato=$Productos->updateproducto($body["Nombre_de_Articulo"], $body["Precio_Unitario"], $body["Fecha_de_Pedido"], $body["Cantidad_de_Articulo"], $body["Monto_Total"], $body["Aplicar_Impuesto"],$body["Numero_de_Pedido"]);
            echo json_encode("Producto Actualizado");
        break;

        case 'DeleteProducto':
            $dato=$Productos->DeleteProducto($body["Numero_de_Pedido"]);
            echo json_encode("El registro fue eliminado");
        break;

    }
  ?>