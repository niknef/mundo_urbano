<?php
require_once "../../functions/autoload.php";

$postData = $_POST;

$categoria = $postData['categoria_talle'] ?? false;
$talle = $postData['talle'] ?? false;

if (!$categoria || !$talle) {
    Alerta::new_alert('danger', "No se especificó una categoría o un talle");
}

if (!Talle::existe_categoria($categoria)) {
    Alerta::new_alert('danger', "La categoría no existe");
}

try {
    // Guardar el nuevo talle en la categoría
    Talle::save($categoria, $talle);
    Alerta::new_alert('success', "El talle se agregó correctamente");

} catch (Exception $e) {
    Alerta::new_alert('danger', "El talle no se puede agregar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_talles');
