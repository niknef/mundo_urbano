<?PHP 
class categoria
{
    private $id;
    private $nombre;
    private $descripcion;
    private $img;
    private $banner_img;

    /**
     * Devuelve todas las categorías
     * 
     * @return Categoria[] Un array con todas las categorías
     */
    public static function get_all(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $categorias = $PDOStatement->fetchAll();
        return $categorias;
    }

    /**
     * Devuelve una categoría por su id
     * 
     * @param int $id El id de la categoría
     * 
     * @return Categoria La categoría con el id especificado
     */
    public static function get_x_id(int $id): ?Categoria
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ? $result : null;
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
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of banner_img
     */ 
    public function getBanner_img()
    {
        return $this->banner_img;
    }

    /**
     * Set the value of banner_img
     *
     * @return  self
     */ 
    public function setBanner_img($banner_img)
    {
        $this->banner_img = $banner_img;

        return $this;
    }
}