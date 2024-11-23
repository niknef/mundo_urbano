<?PHP
require_once "../../functions/autoload.php";


$id = $_GET['id'] ?? FALSE;

$postData = $_POST;

try{

    $color = Color::get_x_id($id);
    
    $color->edit(
        $postData['color'], 
        $postData['codigo']
    );
    
    Alerta::new_alert('success', "El color se editó correctamente");
    
} catch (Exception $e){
    
    Alerta::new_alert('danger', "El color no se puede editar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_colores');

?>