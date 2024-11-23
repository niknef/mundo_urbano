<?PHP
require_once "../../functions/autoload.php";


$postData = $_POST;
$datosArchivo = $_FILES['img'];
$datosArchivoBanner = $_FILES['banner_img'];



try{
    $img = Imagen::subirImagen("../../img/categorias/", $datosArchivo);
    $banner_img = Imagen::subirImagen("../../img/banner/desktop", $datosArchivoBanner);

    categoria::save(
        $postData['nombre'],
        $img,
        $banner_img,
        $postData['descripcion']
    );
    Alerta::new_alert('success', "La categoria se agregó correctamente");
} catch (Exception $e){
    Alerta::new_alert('danger', "La categoria no se puede agregar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_categorias');
