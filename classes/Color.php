<?PHP
class Color {
    private $id;
    private $color;
    private $codigo;

    /**
     * Devuelve los datos de un color en particular
     * @param int $id El id del color a buscar
     */
    public static function get_x_id(int $id): ?Color
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM colores WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ? $result : null;
    }

    /**
     * Devuelve todos los colores
     * 
     * @return Color[] Un array con todos los colores
     */
    public static function get_all(): array
    {
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM colores";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $colores = $PDOStatement->fetchAll();
    return $colores;
    }


    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
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
    }