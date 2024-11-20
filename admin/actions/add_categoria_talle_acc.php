<?php
require_once "../../functions/autoload.php";

$postData = $_POST;

try{
    Talle::save($postData['categoria_talle'], $postData['talle']);
} catch (Exception $e){
    die("No se pudo cargar la categoría en la base de datos");
}

header('Location: ../index.php?link=admin_talles');
