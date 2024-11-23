<?php
require_once "../../functions/autoload.php";

$postData = $_POST;

$categoriaActual = $postData['categoria_actual'] ?? false;
$nuevoNombre = $postData['nuevo_nombre'] ?? false;


if (!Talle::existe_categoria($categoriaActual)) {
    Alerta::new_alert('danger', "La categoría no existe");
}

try {
    Talle::update_categoria_nombre($categoriaActual, $nuevoNombre);

    Alerta::new_alert('success', "La categoría se editó correctamente");
} catch (Exception $e) {
    Alerta::new_alert('danger', "La categoría no se puede editar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_talles');
