<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $talle = Talle::get_x_id($id);
    $talle->delete();
    
    
} catch (Exception $e) {
    die("No se pudo eliminar el talle de la base de datos");
    
}
header('Location: ../index.php?link=admin_talles');