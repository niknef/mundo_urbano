<?PHP
require_once '../../classes/Conexion.php';
require_once '../../classes/Color.php';

$postData = $_POST;

try{
    Color::save(
        $postData['color'],
        $postData['codigo']
    );
} catch (Exception $e){
    die("No se puedo cargar el color en la base de datos");
}

header('Location: ../index.php?link=admin_colores');

?>