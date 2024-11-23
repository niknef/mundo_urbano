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
    
        Alerta::new_alert('success', "El usuario se editó correctamente");
    
    } catch (Exception $e) {
        
       Alerta::new_alert('danger', "El usuario no se puede editar, disculpe las molestias.");
}

header('Location: ../../index.php?link=usuario');