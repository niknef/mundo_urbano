<?PHP
require_once '../../classes/Conexion.php';
require_once '../../classes/Categoria.php';
require_once '../../classes/Imagen.php';

$postData = $_POST;
$datosArchivo = $_FILES['img'];
$datosArchivoBanner = $_FILES['banner_img'];



try{
    $img = Imagen::subirImagen("../../img/categorias/", $datosArchivo);
    $banner_img = Imagen::subirImagen("../../img/banner/desktop/", $datosArchivoBanner);
    categoria::save(
        $postData['nombre'],
        $img,
        $banner_img,
        $postData['descripcion']
    );
} catch (Exception $e){
    die("No se pudo cargar la marca en la base de datos");
}

header('Location: ../index.php?link=admin_categorias');
