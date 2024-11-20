<?php
require_once "../../functions/autoload.php";

$postData = $_POST;

$categoria = $postData['categoria_talle'] ?? false;
$talle = $postData['talle'] ?? false;

if (!$categoria || !$talle) {
    die("Datos incompletos.");
}

if (!Talle::existe_categoria($categoria)) {
    die("La categoría especificada no existe.");
}

try {
    // Guardar el nuevo talle en la categoría
    Talle::save($categoria, $talle);

} catch (Exception $e) {
    die("Error al agregar el talle");
}

header('Location: ../index.php?link=admin_talles');
