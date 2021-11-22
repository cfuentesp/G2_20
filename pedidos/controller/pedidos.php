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

    require_once("../../config/conexion.php");
    require_once("../../models/Pedidos.php");
    $pedidos = new Pedidos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "GetPedido":
            $datos = $pedidos->get_pedidos();
            echo json_encode($datos);
        break;
        
        case "GetUno":
            $datos = $pedidos->get_uno($body["id_pedido"]);
            echo json_encode($datos);
        break;

        case "InsertPedido":
            $datos = $pedidos->insert_pedidos($body["id_socio"],$body["fecha_pedido"],$body["detalle"],$body["subtotal"],$body["total_isv"],$body["total"],$body["fecha_entrega"],$body["estado"]);
            echo json_encode("Pedido Agregado");
        break;

        case "DeletePedido":
            $datos = $pedidos->delete_pedidos($body["id_pedido"]);
            echo json_encode("Pedido Eliminado");
        break;

        case "UpdatePedido":
            $datos = $pedidos->update_pedidos($body["id_pedido"],$body["id_socio"],$body["fecha_pedido"],$body["detalle"],$body["subtotal"],$body["total_isv"],$body["total"],$body["fecha_entrega"],$body["estado"]);
            echo json_encode("Pedido Actualizado");
        break;

        
    }
?>