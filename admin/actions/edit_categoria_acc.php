<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

echo "<pre>";
print_r($_POST);
echo "</pre>";

$postData = $_POST;
$datosArchivo = $_FILES['img'];
$datosArchivoBanner = $_FILES['banner_img'];

try {

    $categoria = Categoria::get_x_id($id);
    echo "<pre>";
    print_r($categoria);
    echo "</pre>";

    // Procesar imagen principal
    if (!empty($datosArchivo['tmp_name'])) {
        $img = Imagen::subirImagen("../../img/categorias/", $datosArchivo);
        Imagen::borrarImagen("../../img/categorias/" . $categoria->getImg());
        
    } else {
        $img = $postData['imagen_org'];
    }

    // Procesar banner
    if (!empty($datosArchivoBanner['tmp_name'])) {
        
        $banner_img = Imagen::subirImagen("../../img/banner/desktop/", $datosArchivoBanner);
        Imagen::borrarImagen("../../img/banner/desktop/" . $categoria->getBanner_img());
        
        
        
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

header('Location: ../index.php?link=admin_categorias');