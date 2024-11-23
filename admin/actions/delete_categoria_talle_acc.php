<?php
require_once "../../functions/autoload.php";

$categoria = $_GET['categoria'] ?? false;

if (!$categoria) {
    Alerta::new_alert('danger', "No se especificó una categoría");
}

if (!Talle::existe_categoria($categoria)) {
    Alerta::new_alert('danger', "La categoría no existe");
}

try {
    Talle::delete_by_categoria($categoria);

} catch (Exception $e) {
    Alerta::new_alert('danger', "La categoría no se puede eliminar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_talles');