<?PHP
require_once "../../functions/autoload.php";


$postData = $_POST;
$datosArchivo = $_FILES['img'];
$datosArchivoBanner = $_FILES['banner_img'];



try{
    $img = Imagen::subirImagen("../../img/categorias/", $datosArchivo);
    $banner_img = Imagen::subirImagen("../../img/banner/", $datosArchivoBanner);

    categoria::save(
        $postData['nombre'],
        $img,
        $banner_img,
        $postData['descripcion']
    );
} catch (Exception $e){
    die("No se pudo cargar la categoria en la base de datos");
}

header('Location: ../index.php?link=admin_categorias');
