<?PHP

class Autenticacion
{

    /**
     * Verifica las credenciales del usuario, y de ser correctas, guarda los datos en la sesión
     * @param string $email El nombre de usuario provisto
     * @param string $password El password provisto
     * @return mixed Devuelve el rol en caso que las credenciales sean correctas, FALSE en caso de que no lo sean y Null en caso que el usuario no se encuentre en la BDD
     */
    public static function log_in(string $email, string $pass)
    {

        $datosUsuario = Usuario::usuario_x_mail($email);

        if ($datosUsuario) {
            

            if (password_verify($pass, $datosUsuario->getPassword())) {
                $datosLogin['nombre'] = $datosUsuario->getNombre();
                $datosLogin['apellido'] = $datosUsuario->getApellido();
                $datosLogin['email'] = $datosUsuario->getEmail();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();
                $datosLogin['alias_usuario'] = $datosUsuario->getAlias_usuario();
            
                $_SESSION['loggedIn'] = $datosLogin;
            
                return $datosLogin['rol'];
            } else {
                echo "El password ingresado no es correcto.";
                return false;
            }
        } else {
           // Alerta::add_alerta('warning', "El usuario ingresado no se encontró en nuestra base de datos.");
           echo "El usuario ingresado no se encontró en nuestra base de datos."; 
           return NULL;
            
        }
    }

    public static function log_out()
    {

        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }



    public static function verify($nivel = 0): bool
    {

        if (!$nivel) { //RESTRICCION NIVEL 0 - ACCESO PÚBLICO
            return TRUE; //SIGA PARA ADELANTE!
        }

        if (isset($_SESSION['loggedIn'])) { //RESTRICCION NIVEL 1 o + - ACCESO RESTRINGIDO

            if ($nivel > 1) {//RESTRICCION NIVEL 2 - ACCESO ADMINISTRADOR

                if (
                    //si el rol es admin / superadmin
                    $_SESSION['loggedIn']['rol'] == "admin" 
                    or 
                    $_SESSION['loggedIn']['rol'] == "superadmin"
                    ) {
                    //seguir
                    return TRUE;
                } else {
                    //Alerta::anadir_alerta('danger', "No tiene permisos para acceder a esta sección. Inicia como Administrador.");
                    header('location: index.php?link=login');
                }

            } else {
                //seguir
                return TRUE;
            }

        } else {
            header("location: index.php?link=login");
        }
    }
}
