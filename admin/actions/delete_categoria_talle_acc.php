<?php
require_once "../../functions/autoload.php";

$categoria = $_GET['categoria'] ?? false;

if (!$categoria) {
    die("Categoría no encontrada.");
}

if (!Talle::existe_categoria($categoria)) {
    die("La categoría especificada no existe.");
}

try {
    Talle::delete_by_categoria($categoria);

} catch (Exception $e) {
    die("No se pudo eliminar la categoría del talle");
}

header('Location: ../index.php?link=admin_talles');