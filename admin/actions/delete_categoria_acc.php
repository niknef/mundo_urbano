<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $categoria = Categoria::get_x_id($id);
    $categoria->delete();
    Imagen::borrarImagen( "../../img/categorias/" . $categoria->getImg());
    Imagen::borrarImagen( "../../img/banner/desktop/" . $categoria->getBanner_img());
    Imagen::borrarImagen( "../../img/banner/tablet/" . $categoria->getBanner_img());
    Imagen::borrarImagen( "../../img/banner/" . $categoria->getBanner_img());

    Alerta::new_alert('warning', "La categoria se eliminó correctamente");
} catch (Exception $e) {
    Alerta::new_alert('danger', "La categoria no se puede eliminar, disculpe las molestias.");
}
header('Location: ../index.php?link=admin_categorias');