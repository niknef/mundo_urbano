<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;


$login = Autenticacion::log_in($postData['email'], $postData['pass']);


if ($login) {

    if($login == "usuario"){ 
        header('location: ../../index.php');
        
    }else{
        header('location: ../index.php?link=dashboard');
    }
    Alerta::new_alert('success', "Sesión iniciada correctamente");
} else {
     header('location: ../../index.php?link=login');
    Alerta::new_alert('danger', "Usuario o contraseña incorrectos");
}

