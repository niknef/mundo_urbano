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
} catch (Exception $e) {
    die("No se pudo cargar el usuario en la base de datos");
}

header('Location: ../../index.php?link=login');