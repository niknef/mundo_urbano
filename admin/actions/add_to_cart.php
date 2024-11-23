<?php
require_once "../../functions/autoload.php";

$datos = $_POST;

$productoId = $datos['producto_id'];
$cantidad = $datos['cantidad'];
$talleId = $datos['talle_id'];


if(isset($productoId, $cantidad, $talleId)){
    Carrito::agregar_item($productoId, $cantidad, $talleId);
    Alerta::new_alert("success", "Producto agregado al carrito.");
    header('location: ../../index.php?link=carrito');
} else {
    Alerta::new_alert("error", "Datos incompletos.");

}

