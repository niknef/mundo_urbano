<?php
require_once "../../functions/autoload.php";

$postData = $_POST;

$categoriaActual = $postData['categoria_actual'] ?? false;
$nuevoNombre = $postData['nuevo_nombre'] ?? false;


if (!Talle::existe_categoria($categoriaActual)) {
    die("La categoría especificada no existe.");
}

try {
    Talle::update_categoria_nombre($categoriaActual, $nuevoNombre);


} catch (Exception $e) {
    die("Error al actualizar la categoría");
}

header('Location: ../index.php?link=admin_talles');
