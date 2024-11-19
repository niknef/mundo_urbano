<?PHP 
require_once '../../classes/Conexion.php';
require_once '../../classes/Color.php';

$id = $_GET['id'] ?? FALSE;

try{
    $color = Color::get_x_id($id);
    $color->delete();
} catch (Exception $e){
    die("No se pudo eliminar el color de la base de datos");
}

header('Location: ../index.php?link=admin_colores');