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
     * Guarda un color en la base de datos
     * 
     * @param string $color El nombre del color
     * @param string $codigo El código hexadecimal del color
     * 
     * 
     */
    public static function save(string $color, string $codigo){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO colores (`color`, `codigo`) VALUES (:color, :codigo)";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'color' => $color,
            'codigo' => $codigo
        ]);


        return $result;
    }

    /**
     * Edita los datos de un color en la base de datos
     * 
     * @param string $color El nombre del color
     * @param string $codigo El código hexadecimal del color
     * 
     */
    public function edit(string $color, string $codigo){
        $conexion = Conexion::getConexion();
        $query = "UPDATE colores SET color = :color, codigo = :codigo WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $result = $PDOStatement->execute([
            'color' => $color,
            'codigo' => $codigo,
            'id' => $this->id
        ]);

        return $result;
    }

    /**
     * Elimina un color de la base de datos
     * 
     */
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM colores WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);

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