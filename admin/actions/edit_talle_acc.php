<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

$postData = $_POST;
echo "<pre>";
print_r($postData);
echo "</pre>";


try {

    $talle = Talle::get_x_id($id);
    
    $talle->edit($postData['talle']);

        //Alerta::add_alerta('warning', "El personaje se editó correctamente");

} catch (Exception $e) {
   
    //Alerta::add_alerta('danger', "El personaje no se puede editar, disculpe las molestias ocasionadas");
}

header('Location: ../index.php?link=admin_talles');