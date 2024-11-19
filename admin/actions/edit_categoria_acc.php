<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];
$datosArchivoBanner = $_FILES['banner_img'];

try {

    $categoria = Categoria::get_x_id($id);

    // Procesar imagen principal
    if (!empty($datosArchivo['tmp_name'])) {
        $img = Imagen::subirImagen("../../img/categorias", $datosArchivo);
        Imagen::borrarImagen("../../img/categorias/" . $categoria->getImg());
        $img = Imagen::subirImagen("../../img/categorias/desktop", $datosArchivo);
        Imagen::borrarImagen("../../img/categorias/desktop/" . $categoria->getImg());
    } else {
        $img = $postData['imagen_org'];
    }

    // Procesar banner
    if (!empty($datosArchivoBanner['tmp_name'])) {
        $banner_img = Imagen::subirImagen("../../img/banner/desktop", $datosArchivoBanner);
        Imagen::borrarImagen("../../img/banner/desktop/" . $categoria->getBanner_img());
        $banner_img = Imagen::subirImagen("../../img/banner/tablet", $datosArchivoBanner);
        Imagen::borrarImagen("../../img/banner/tablet/" . $categoria->getBanner_img());
        $banner_img = Imagen::subirImagen("../../img/banner/", $datosArchivoBanner);
        Imagen::borrarImagen("../../img/banner/" . $categoria->getBanner_img());
        
    } else {
        $banner_img = $postData['banner_img_org'];
    }
    
    $categoria->edit(
        $postData['nombre'],
        $img,
        $banner_img,
        $postData['descripcion']);

        //Alerta::add_alerta('warning', "El personaje se editó correctamente");

} catch (Exception $e) {
   
    //Alerta::add_alerta('danger', "El personaje no se puede editar, disculpe las molestias ocasionadas");
}

header('Location: ../index.php?sec=admin_categorias');