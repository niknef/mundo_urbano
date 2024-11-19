<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $marca = Marca::get_x_id($id);
    $marca->delete();
    Imagen::borrarImagen( "../../img/logos/" . $marca->getImg());
    
} catch (Exception $e) {
    die("No se pudo eliminar el color de la base de datos");
    
}
header('Location: ../index.php?link=admin_marcas');