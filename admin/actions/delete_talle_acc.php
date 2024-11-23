<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $talle = Talle::get_x_id($id);
    $talle->delete();
    
    Alerta::new_alert('warning', "El talle se eliminó correctamente");
} catch (Exception $e) {
    Alerta::new_alert('danger', "El talle no se puede eliminar, disculpe las molestias.");
    
}
header('Location: ../index.php?link=admin_talles');