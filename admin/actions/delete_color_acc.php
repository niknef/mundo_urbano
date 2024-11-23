<?PHP 
require_once "../../functions/autoload.php";


$id = $_GET['id'] ?? FALSE;

try{
    $color = Color::get_x_id($id);
    $color->delete();
    Alerta::new_alert('warning', "El color se eliminó correctamente");
} catch (Exception $e){
    Alerta::new_alert('danger', "El color no se puede eliminar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_colores');