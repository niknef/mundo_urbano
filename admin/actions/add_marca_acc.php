<?PHP
require_once "../../functions/autoload.php";


$postData = $_POST;
$datosArchivo = $_FILES['img'];

try{

    $img = Imagen::subirImagen("../../img/logos/", $datosArchivo);
    Marca::save(
        $postData['nombre'],
        $img,
        $postData['descripcion']
    );

    Alerta::new_alert('success', "La marca se creó correctamente");
} catch (Exception $e){
    Alerta::new_alert('danger', "La marca no se puede crear, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_marcas');
