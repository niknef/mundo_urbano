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
     * funcion para traer todos los id de las categorias
     */
    public static function get_all_id(): array{
        $conexion = Conexion::getConexion();
        $query = "SELECT id FROM categorias";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();

        $categorias = $PDOStatement->fetchAll(PDO::FETCH_COLUMN);
        return $categorias;
    }

    /**
     * Guarda una nueva categoría en la base de datos
     * 
     * @param string $nombre El nombre de la categoría
     * @param string $img El nombre de la imagen de la categoría
     * @param string $banner_img El nombre del banner de la categoría
     * @param string $descripcion La descripción de la categoría
     */
    public static function save(string $nombre, string $img, string $banner_img, string $descripcion){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO categorias (`nombre`, `img`, `banner_img`, `descripcion`) VALUES (:nombre, :img, :banner_img, :descripcion)";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'nombre' => $nombre,
            'img' => $img,
            'banner_img' => $banner_img,
            'descripcion' => $descripcion
        ]);

        return $result;
    }

    /**
     * Edita una categoría en la base de datos
     * 
     * @param string $nombre El nombre de la categoría
     * @param string $img El nombre de la imagen de la categoría
     * @param string $banner_img El nombre del banner de la categoría
     * @param string $descripcion La descripción de la categoría
     */
    public function edit(string $nombre, string $img, string $banner_img, string $descripcion){
        $conexion = Conexion::getConexion();
        $query = "UPDATE categorias SET nombre = :nombre, img = :img, banner_img = :banner_img, descripcion = :descripcion WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'nombre' => $nombre,
            'img' => $img,
            'banner_img' => $banner_img,
            'descripcion' => $descripcion,
            'id' => $this->id
        ]);

        return $result;
    }

    /**
     * Elimina una categoria de la base de datos
     * 
     */
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM categorias WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);

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