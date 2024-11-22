<?PHP
class Usuario
{

    private $id;
    private $email;
    private $alias_usuario;
    private $nombre;
    private $apellido;
    private $password;
    private $rol;

    /**
     * Encuentra un usuario por su email
     * @param string $email El email dle usuario
     */
    public static function usuario_x_mail(string $email): ?Usuario
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuario WHERE email = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$email]);

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }

    /**
     * Guarda un nuevo usuario en la base de datos
     * 
     * @param string $email El email del usuario
     * @param string $alias_usuario El alias del usuario
     * @param string $nombre El nombre del usuario
     * @param string $apellido El apellido del usuario
     * @param string $password La contraseña del usuario
     * @param string $rol El rol del usuario
     */
    public static function save(string $email, string $alias_usuario, string $nombre, string $apellido, string $password, string $rol){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO usuario (`email`, `alias_usuario`, `nombre`, `apellido`, `password`, `rol`) VALUES (:email, :alias_usuario, :nombre, :apellido, :password, :rol)";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'email' => $email,
            'alias_usuario' => $alias_usuario,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'password' => $password,
            'rol' => $rol
        ]);

        return $result;
    }

    /**
     * Edita los datos de un usuario en la base de datos
     * 
     * @param string $email El email del usuario
     * @param string $alias_usuario El alias del usuario
     * @param string $nombre El nombre del usuario
     * @param string $apellido El apellido del usuario
     * @param string $password La contraseña del usuario
     * @param string $rol El rol del usuario
     */
    public function edit(string $alias_usuario, string $nombre, string $apellido){
        $conexion = Conexion::getConexion();
        $query = "UPDATE usuario SET email = :email, alias_usuario = :alias_usuario, nombre = :nombre, apellido = :apellido, password = :password, rol = :rol WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'email' => $this->email,
            'alias_usuario' => $alias_usuario,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'password' => $this->password,
            'rol' => $this->rol,
            'id' => $this->id
        ]);

        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of alias_usuario
     */ 
    public function getAlias_usuario()
    {
        return $this->alias_usuario;
    }

    /**
     * Set the value of alias_usuario
     *
     * @return  self
     */ 
    public function setAlias_usuario($alias_usuario)
    {
        $this->alias_usuario = $alias_usuario;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
}