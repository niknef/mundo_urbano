<?PHP 
class Marca 
{
    private $id;
    private $nombre;
    private $descripcion;
    private $img;


    /**
     * Devuelve todas las marcas
     * 
     * @return Marca[] Un array con todas las marcas
     */
    public static function get_all(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $marcas = $PDOStatement->fetchAll();

        return $marcas;
    }

    /**
     * Devuelve los datos de una marca en particular
     * @param int $id El id de la marca a buscar
     */
    public static function get_x_id(int $id): Marca
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $marca = $PDOStatement->fetch();

        return $marca;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }   
}