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
} catch (Exception $e) {
    die("No se pudo eliminar la categoria de la base de datos");
    
}
header('Location: ../index.php?link=admin_categorias');