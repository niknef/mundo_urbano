<?PHP
class Talle {
    private $id;
    private $categoria_talle;
    private $talle;

    /**
     * Devuelve los datos de un talle en particular
     * @param int $id El id del talle a buscar
     * 
     */
    public static function get_x_id(int $id): ?Talle
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM talles WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ? $result : null;
    }

    /**
     * Devuelve todos los talles
     * 
     * @return Talle[] Un array con todos los talles
     */
    public static function get_all(): array
    {
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM talles";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $talles = $PDOStatement->fetchAll();
    return $talles;

    }

    /**
     * Obtiene todas las categorías de talles disponibles.
     *
     * @return array Un array con los nombres de las categorías de talles.
     */
    public static function get_all_categorias(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT DISTINCT categoria_talle FROM talles";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll(); 
    }

    /**
     * Devuelve todos los talles de una categoría
     *
     * @param string $categoria_talle El nombre de la categoría
     * @return array Un array con todos los talles de la categoría
     */
    public static function get_all_by_categoria(string $categoria_talle): array
    {
        
        $conexion = Conexion::getConexion();

        
        $query = "SELECT * FROM talles WHERE categoria_talle = :categoria_talle";
        $PDOStatement = $conexion->prepare($query);

       
        $PDOStatement->execute( [ 'categoria_talle' => $categoria_talle ] );


        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        
        $talles = $PDOStatement->fetchAll();

        return $talles;
    }

    public static function get_all_grouped_by_categoria(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM talles ORDER BY categoria_talle, id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $tallesPorCategoria = [];
        while ($talle = $PDOStatement->fetch()) {
            $tallesPorCategoria[$talle->getCategoria_talle()][] = $talle;
        }

        return $tallesPorCategoria;
    }

    /**
     * Guarda un talle en la base de datos
     * 
     * @param string $categoria_talle La categoría del talle
     * @param string $talle El nombre del talle
     * 
     * 
     */
    public static function save(string $categoria_talle, string $talle){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO talles (`categoria_talle`, `talle`) VALUES (:categoria_talle, :talle)";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'categoria_talle' => $categoria_talle,
            'talle' => $talle
        ]);

        return $result;

    }

    /**
     * Edita los datos de un talle en la base de datos
     * 
     * 
     * @param string $talle El nombre del talle
     * 
     */
    public function edit(string $talle){
        $conexion = Conexion::getConexion();
        $query = "UPDATE talles SET categoria_talle = :categoria_talle, talle = :talle WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'categoria_talle' => $this->categoria_talle,
            'talle' => $talle,
            'id' => $this->id
        ]);

        return $result;
    }

    /**
     * Elimina un talle de la base de datos
     * 
     * 
     */
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM talles WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            $this->id
        ]);

    
    }

    /**
     * Verifica si una categoría de talles existe en la base de datos
     * 
     * @param string $categoria_talle El nombre de la categoría
     * @return bool Retorna true si existe, false si no
     */
    public static function existe_categoria(string $categoria_talle): bool
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT COUNT(*) FROM talles WHERE categoria_talle = :categoria_talle";
        $stmt = $conexion->prepare($query);
        $stmt->execute(['categoria_talle' => $categoria_talle]);

        return $stmt->fetchColumn() > 0;
    }

    /**
     * Elimina todos los talles de una categoría
     * 
     * @param string $categoria_talle La categoría de los talles a eliminar
     * 
     */
    public static function delete_by_categoria(string $categoria_talle)
    {
        $conexion = Conexion::getConexion();

        $query = "DELETE FROM talles WHERE categoria_talle = :categoria_talle";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['categoria_talle' => $categoria_talle]);

        return true;
    }

    /**
     * Actualiza el nombre de una categoría de talles
     * 
     * @param string $categoria_talle La categoría a actualizar
     * @param string $nuevo_nombre El nuevo nombre de la categoría
     * 
     */
    public static function update_categoria_nombre(string $categoria_talle, string $nuevo_nombre){
        $conexion = Conexion::getConexion();

        $query = "UPDATE talles SET categoria_talle = :nuevo_nombre WHERE categoria_talle = :categoria_talle";
        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'nuevo_nombre' => $nuevo_nombre,
            'categoria_talle' => $categoria_talle
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
     * Get the value of categoria_talle
     */ 
    public function getCategoria_talle()
    {
        return $this->categoria_talle;
    }

    /**
     * Set the value of categoria_talle
     *
     * @return  self
     */ 
    public function setCategoria_talle($categoria_talle)
    {
        $this->categoria_talle = $categoria_talle;

        return $this;
    }

    /**
     * Get the value of talle
     */ 
    public function getTalle()
    {
        return $this->talle;
    }

    /**
     * Set the value of talle
     *
     * @return  self
     */ 
    public function setTalle($talle)
    {
        $this->talle = $talle;

        return $this;
    }
}