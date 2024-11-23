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

    Alerta::new_alert('success', "El talle se editó correctamente");

} catch (Exception $e) {
   
    Alerta::new_alert('danger', "El talle no se puede editar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_talles');