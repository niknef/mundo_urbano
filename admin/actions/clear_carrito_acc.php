<?php
require_once "../../functions/autoload.php";

Carrito::vaciar_carrito();
Alerta::new_alert("success", "Carrito vaciado.");

header("Location: ../../index.php?link=carrito");

