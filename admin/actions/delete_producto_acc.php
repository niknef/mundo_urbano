<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try{
    $producto = Producto::buscarProductoPorId($id);
    Imagen::borrarImagen("../../img/productos/" . $producto->getImg());
    $producto->vaciarTalles();
    $producto->delete();

}catch (Exception $e){
    die("No se pudo eliminar el Producto =(");
}


header('Location: ../index.php?link=admin_productos');