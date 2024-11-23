<?PHP

require_once "../../functions/autoload.php";

$datos = $_POST;

echo "<pre>";
print_r($datos);
echo "</pre>";
$password = password_hash($datos['password'], PASSWORD_DEFAULT);
try {
    Usuario::save(
        $datos['email'],
        $datos['alias_usuario'],
        $datos['nombre'],
        $datos['apellido'],
        $password,
        $datos['rol']
    );
    Alerta::new_alert('success', "El usuario se creó correctamente");
} catch (Exception $e) {
    Alerta::new_alert('danger', "El usuario no se puede crear, disculpe las molestias.");
}

header('Location: ../../index.php?link=login');