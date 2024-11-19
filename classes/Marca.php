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

    /**
     * Guarda una nueva marca en la base de datos
     * 
     * @param string $nombre El nombre de la marca
     * @param string $descripcion La descripción de la marca
     * @param string $img La imagen de la marca
     */
    public static function save(string $nombre, string $img, string $descripcion,){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO marcas (`nombre`, `img`, `descripcion`) VALUES (:nombre, :img, :descripcion)";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'nombre' => $nombre,
            'img' => $img,
            'descripcion' => $descripcion
        ]);

        return $result;
    }

    /**
     * Edita los datos de una marca en la base de datos
     * 
     * @param string $nombre El nombre de la marca
     * @param string $img el logo de la marca
     * @param string $descripcion La descripción de la marca
     */
    public function edit(string $nombre, string $img, string $descripcion){
        $conexion = Conexion::getConexion();
        $query = "UPDATE marcas SET nombre = :nombre, img = :img, descripcion = :descripcion WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'nombre' => $nombre,
            'img' => $img,
            'descripcion' => $descripcion,
            'id' => $this->id
        ]);

        return $result;
    }

    /**
     * Elimina una marca de la base de datos
     * 
     */
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM marcas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);

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