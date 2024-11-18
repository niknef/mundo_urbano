<?PHP
require_once '../../classes/Conexion.php';
require_once '../../classes/Categoria.php';

$postData = $_POST;
$fileData = $_FILES;

try{
    categoria::save(
        $postData['nombre'],
        $fileData['img']['name'],
        $fileData['banner_img']['name'],
        $postData['descripcion']
    );
} catch (Exception $e){
    die("No se puedo cargar la marca en la base de datos");
}

header('Location: ../index.php?link=admin_categorias');
