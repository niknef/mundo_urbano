<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

$temporada = $postData['temporada'] !== 'null' ? $postData['temporada'] : null;
$anio = $postData['anio'] !== '' ? $postData['anio'] : null;
$descuento = $postData['descuento'] !== '' ? $postData['descuento'] : 0;

echo "<pre>";
print_r($postData);
echo "</pre>";

try {

    $oferta = Oferta::get_x_id(1);
    
    $oferta->edit(
        $temporada,
        $anio,
        $descuento
        );

        
        Alerta::new_alert('success', "La oferta se editó correctamente");
} catch (Exception $e) {
        
        Alerta::new_alert('danger', "La oferta no se puede editar, disculpe las molestias.");
}

header('Location: ../index.php?link=edit_oferta');