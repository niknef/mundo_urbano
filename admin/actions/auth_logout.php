<?PHP
require_once "../../functions/autoload.php";

Autenticacion::log_out();
Alerta::new_alert('warning', "Sesión cerrada correctamente");

header('location: ../../index.php?link=login');