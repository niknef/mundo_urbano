<?PHP
require_once "../../functions/autoload.php";

Autenticacion::log_out();

header('location: ../../index.php?link=login');