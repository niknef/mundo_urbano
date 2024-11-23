<?php
require_once "../../functions/autoload.php";

$postData = $_POST;

try{
    Talle::save($postData['categoria_talle'], $postData['talle']);
    Alerta::new_alert('success', "El talle se agregó correctamente");
} catch (Exception $e){
    Alerta::new_alert('danger', "El talle no se puede agregar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_talles');
