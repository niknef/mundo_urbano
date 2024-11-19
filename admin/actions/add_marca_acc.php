<?PHP
require_once '../../classes/Conexion.php';
require_once '../../classes/Marca.php';
require_once '../../classes/Imagen.php';

$postData = $_POST;
$datosArchivo = $_FILES['img'];

try{

    $img = Imagen::subirImagen("../../img/logos/", $datosArchivo);
    Marca::save(
        $postData['nombre'],
        $img,
        $postData['descripcion']
    );
} catch (Exception $e){
    die("No se pudo cargar la marca en la base de datos");
}

header('Location: ../index.php?link=admin_marcas');
