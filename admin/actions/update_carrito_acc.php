<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$cantidades = $_POST['cantidades'] ?? null;
if (!empty($cantidades)){
    Carrito::actualizar_cantidades($cantidades);
    Alerta::new_alert("success", "Carrito actualizado.");
}

header("Location: ../../index.php?link=carrito");
