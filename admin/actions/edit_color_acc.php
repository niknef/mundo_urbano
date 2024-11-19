<?PHP

require_once '../../classes/Conexion.php';
require_once '../../classes/Color.php';

$id = $_GET['id'] ?? FALSE;

$postData = $_POST;

try{

    $color = Color::get_x_id($id);
    
    $color->edit(
        $postData['color'], 
        $postData['codigo']
    );
    
} catch (Exception $e){
    die("No se pudo actualizar color en la base de datos");
}

header('Location: ../index.php?link=admin_colores');

?>