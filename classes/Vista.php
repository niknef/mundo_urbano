<?PHP
class Vista
{

    private $id;
    private $nombre;
    private $titulo;
    private $activa;
    private $restringida;

    /**
     * Valida el identificador de una vista y devuelve un array con los datos de la misma
     * @param ?string $vista El identificador de la vista, o null
     *
     * @return Vista devuelve objeto Vista
     */
    public static function validar_vista(?string $vista, $categoriaSeleccionada = null): Vista
    {

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM vistas WHERE nombre = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$vista]);

        $viewData = $PDOStatement->fetch();

        

        if ($viewData) {
            if ($vista === 'productos' && !empty($categoriaSeleccionada)) {
                $categorias = Categoria::get_all_id();
                if (!in_array($categoriaSeleccionada, $categorias)) {
                    $viewData->setNombre('404');
                    $viewData->setTitulo('Página no encontrada');
                }
            }

            if ($viewData->getActiva()) {
                $resultado = $viewData;
            } else {
                $view403 = new self();

                $view403->nombre = '403';
                $view403->titulo = 'Página no disponible';
                $view403->activa = 1;
                $view403->restringida = 0;

                $resultado = $view403;
            }

        }else {
            $view404 = new self();

            $view404->nombre = '404';
            $view404->titulo = 'Página no Econtrada';
            $view404->activa = 1;
            $view404->restringida = 0;

            $resultado = $view404;
        }

        return $resultado;

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
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of activa
     */
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * Set the value of activa
     *
     * @return  self
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;

        return $this;
    }

    /**
     * Get the value of restringida
     */
    public function getRestringida()
    {
        return $this->restringida;
    }

    /**
     * Set the value of restringida
     *
     * @return  self
     */
    public function setRestringida($restringida)
    {
        $this->restringida = $restringida;

        return $this;
    }
}
