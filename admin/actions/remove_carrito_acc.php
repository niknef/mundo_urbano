<?php
require_once "../../functions/autoload.php";

$key = $_GET['id'] ?? null;

if ($key) {
    Carrito::eliminar_item($key);
    Alerta::new_alert("success", "Producto eliminado del carrito.");
} else {
    Alerta::new_alert("error", "No se pudo eliminar el producto. Parámetro inválido.");
}

header("Location: ../../index.php?link=carrito");
exit;