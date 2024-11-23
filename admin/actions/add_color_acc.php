<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try{
    Color::save(
        $postData['color'],
        $postData['codigo']
    );
    Alerta::new_alert('success', "El color se agregó correctamente");
} catch (Exception $e){
    Alerta::new_alert('danger', "El color no se puede agregar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_colores');

?>