<?PHP
require_once "../../functions/autoload.php";

$email = $_POST['email'] ?? FALSE;

try {
    
        $usuario = Usuario::usuario_x_mail($email);
    
        $usuario->edit(
            $_POST['alias_usuario'],
            $_POST['nombre'],
            $_POST['apellido']
            
        );
    
       // Alerta::add_alerta('warning', "El usuario se editó correctamente");
    
    } catch (Exception $e) {
        
       // Alerta::add_alerta('danger', "El usuario no se puede editar, disculpe las molestias ocasionadas");
}

header('Location: ../../index.php?link=usuario');