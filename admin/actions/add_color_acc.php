<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try{
    Color::save(
        $postData['color'],
        $postData['codigo']
    );
} catch (Exception $e){
    die("No se pudo cargar el color en la base de datos");
}

header('Location: ../index.php?link=admin_colores');

?>