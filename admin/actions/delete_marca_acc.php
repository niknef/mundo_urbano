<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $marca = Marca::get_x_id($id);
    $marca->delete();
    Imagen::borrarImagen( "../../img/logos/" . $marca->getImg());

    Alerta::new_alert('warning', "La marca se eliminó correctamente");
    
} catch (Exception $e) {
    Alerta::new_alert('danger', "La marca no se puede eliminar, disculpe las molestias.");
    
}
header('Location: ../index.php?link=admin_marcas');