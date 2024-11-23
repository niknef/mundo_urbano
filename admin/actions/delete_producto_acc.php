<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try{
    $producto = Producto::buscarProductoPorId($id);
    Imagen::borrarImagen("../../img/productos/" . $producto->getImg());
    $producto->vaciarTalles();
    $producto->delete();

    Alerta::new_alert('warning', "El producto se eliminó correctamente");
}catch (Exception $e){
    Alerta::new_alert('danger', "El producto no se puede eliminar, disculpe las molestias.");
}


header('Location: ../index.php?link=admin_productos');