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

        //Alerta::add_alerta('warning', "El personaje se editó correctamente");

} catch (Exception $e) {
   
    //Alerta::add_alerta('danger', "El personaje no se puede editar, disculpe las molestias ocasionadas");
}

header('Location: ../index.php?link=admin_marcas');