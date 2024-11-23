<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

$postData = $_POST;
$fileData = $_FILES['img'];

try {

    $marca = Marca::get_x_id($id);

    
    if (!empty($fileData['tmp_name'])) {
        //Si el usuario decide remplazar la imagen
        $img = Imagen::subirImagen("../../img/logos/", $fileData);
        Imagen::borrarImagen("../../img/logos/". $marca->getImg());
    }else{
        $img = $postData['imagen_org'];
    }

    
    $marca->edit(
        $postData['nombre'],
        $img,
        $postData['descripcion']);

    Alerta::new_alert('success', "La marca se editó correctamente");

} catch (Exception $e) {
   
    Alerta::new_alert('danger', "La marca no se puede editar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_marcas');