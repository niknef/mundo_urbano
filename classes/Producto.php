<?PHP
class Producto
{
        private $id;
        private $categoria_id;
        private $marca_id;
        private $color_id;
        private $nombre;
        private $descripcion;
        private $tipo;
        private $precio;
        private $img;
        private $temporada;
        private $fecha_ingreso;

        /**
         * Devuelve el inventario completo
         *  
         * @return Producto[]   Un array con todos los productos del inventario.
         */
        public static function inventario_completo(): array
        {
                

                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM productos";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStatement->execute();
                
                $inventario = $PDOStatement->fetchAll();
                

                return $inventario;
        }
        
        /**
         * Devuelve un producto por su ID
         * 
         * @param int $id El ID del producto a buscar
         * @return Producto El producto con el ID especificado
         */
        public static function buscarProductoPorId($id): ?Producto
        {
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM productos WHERE id = ?";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStatement->execute([$id]);

                $producto = $PDOStatement->fetch();

                return $producto ? $producto : null;
        }
        
        /**
         * Devuelve el catalogo de productos de una categoria especifica.
         * 
         * @param int $id el id de la categoria de la cual se desea obtener el catalogo.
         * @return Producto[] Un array con los productos de la categoria especificada.
         */
        public static function inventario_por_categoria($id): array
        {
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM productos WHERE categoria_id = ?";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStatement->execute([$id]);

                $inventario = $PDOStatement->fetchAll();

                return $inventario;
        }
        

        /**
         * Filtra los productos de un inventario basándose en la temporada y/o año proporcionados.
         * 
         * @param string|null $temporada La temporada para filtrar los productos (opcional).
         * @param int|null $anio El año para filtrar los productos (opcional).
         * 
         * @return Producto[] Retorna un array de productos que pertenecen a la temporada y/o año especificado. Si no hay coincidencias retorna un array vacío.
         */
        public static function filtrarProductosTemporada(?string $temporada = null, ?int $anio = null): array
        {
        // Si ambos son null, no hay productos en oferta
        if (is_null($temporada) && is_null($anio)) {
                return []; // Devolvemos un array vacío
        }

        // Construcción de la consulta
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE 1=1"; // Condición base

        $params = [];
        
        // Filtro por temporada (si aplica)
        if (!is_null($temporada)) {
                $query .= " AND LOWER(temporada) = LOWER(?)";
                $params[] = $temporada;
        }

        // Filtro por año (si aplica)
        if (!is_null($anio)) {
                $query .= " AND YEAR(fecha_ingreso) = ?";
                $params[] = $anio;
        }

        // Preparar y ejecutar consulta
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute($params);

        // Retornar resultados
        return $PDOStatement->fetchAll();
        }

        /**
         * Aplica un descuento a un producto si pertenece a la temporada y/o año indicado.
         * 
         * @param Producto $producto El producto al que se le va a aplicar el descuento.
         * @param string|null $temporada La temporada para ofertar los productos (opcional).
         * @param string|null $anio El año para ofertar los productos (opcional).
         * @param float $descuento El porcentaje de descuento a aplicar. Por defecto es 15% (Opcional).
         * 
         * @return float Retorna el precio con descuento si el producto pertenece a la temporada y/o año especificado.
         */
        public static function aplicarDescuento(Producto $producto, ?string $temporada = null, ?string $anio = null, float $descuento = 15): float
        {
        // Si no se especifica temporada ni año, no aplica descuento
        if (is_null($temporada) && is_null($anio)) {
                return $producto->precio;
        }

        // Extraer el año de la fecha_ingreso del producto
        $anioProducto = date('Y', strtotime($producto->fecha_ingreso));

        // Verificar coincidencia de temporada y año
        $coincideTemporada = $temporada ? strtolower($producto->temporada) === strtolower($temporada) : true;
        $coincideAnio = $anio ? $anioProducto == $anio : true;

        // Si coincide, calcular el precio con descuento
        if ($coincideTemporada && $coincideAnio) {
                return round($producto->precio * (1 - $descuento / 100), 2);
        }

        // Si no coincide, devolver el precio original
        return $producto->precio;
        }

        /**
         * obtiene precio con descuento si corresponde y le da stilo y si no devuelve el precio normal
         * 
         * @param string|null $temporada La temporada del producto que puede recibir un descuento (opcional).
         * @param string|null $anio El año del producto que puede recibir un descuento (opcional).
         * @param float $descuento El porcentaje de descuento a aplicar. Por defecto es 15%. (Opcional)
         * 
         * @return string Devuelve una cadena HTML con el precio original tachado (si hay descuento) y el precio con descuento. 
         *                Si no se aplica descuento, devuelve solo el precio formateado.
         */
        public function obtenerPrecioConDescuento(string $temporada = null, string $anio = null, float $descuento = 15): string
        {
            // Aplicamos el descuento usando la función existente
                $precioConDescuento = $this->aplicarDescuento($this, $temporada, $anio, $descuento);
        
            // Si el precio con descuento es menor al precio original, mostramos ambos precios (tachando el original)
                if ($precioConDescuento < $this->precio) {
                        return "<span class='fw-lighter text-decoration-line-through text-secondary text-danger me-1'>" . $this->precio_formateado() . "</span> $" . number_format($precioConDescuento, 2, ',', '.');
                }

            // Si no se aplica descuento, simplemente devolvemos el precio formateado
                return $this->precio_formateado();
        }

        /**
         * Devuelve el precio de la unidad, formateado correctamente
         */
        public function precio_formateado(): string
        {
                return "$" . number_format($this->precio, 2, ",", ".");
        }

        /**
         * Devuelve el codigo de color de un producto
         * 
         */
        public function getCodigoColor(): string{
                $color = Color::get_x_id($this->color_id);
                return $color->getCodigo();
        }
        /**
         * Devuelve el nombre de la marca del producto
         * 
         * @return string El nombre de la marca del producto
         */
        public function getMarca(): string
        {
                $marca = Marca::get_x_id($this->marca_id);
                return $marca->getNombre();
        }

        /**
         * Devuelve el nombre de la categoria del producto
         * 
         * @return string El nombre de la categoria del producto
         */
        public function getCategoria(): string
        {
                $categoria = Categoria::get_x_id($this->categoria_id);
                return $categoria->getNombre();
        }

        /**
         * Devuelve el nombre del color del producto
         * 
         * @return string El nombre del color del producto
         */
        public function getColor(): string
        {
                $color = Color::get_x_id($this->color_id);
                return $color->getColor();
        }

        /**
        * Ordena un catálogo de productos por precio.
        * 
        * @param Producto[] $catalogo El catálogo de productos a ordenar.
        * @param string $orden El orden de la ordenación: "asc" para ascendente (menor a mayor) y "desc" para descendente (mayor a menor).
        * @return Producto[] El catálogo ordenado según el precio.
        */
        public static function ordenarPorPrecio(array $catalogo, string $orden = 'asc'): array
        {
                usort($catalogo, function($a, $b) use ($orden) {
                if ($orden === 'asc') {
                        return $a->precio > $b->precio ? 1 : -1;
                } else {
                        return $a->precio < $b->precio ? 1 : -1;
                }
                });
                return $catalogo;
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
         * Get the value of categoria_id
         */ 
        public function getCategoria_id()
        {
                return $this->categoria_id;
        }

        /**
         * Set the value of categoria_id
         *
         * @return  self
         */ 
        public function setCategoria_id($categoria_id)
        {
                $this->categoria_id = $categoria_id;

                return $this;
        }

        /**
         * Get the value of marca_id
         */ 
        public function getMarca_id()
        {
                return $this->marca_id;
        }

        /**
         * Set the value of marca_id
         *
         * @return  self
         */ 
        public function setMarca_id($marca_id)
        {
                $this->marca_id = $marca_id;

                return $this;
        }

        /**
         * Get the value of color_id
         */ 
        public function getColor_id()
        {
                return $this->color_id;
        }

        /**
         * Set the value of color_id
         *
         * @return  self
         */ 
        public function setColor_id($color_id)
        {
                $this->color_id = $color_id;

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
         * Get the value of tipo
         */ 
        public function getTipo()
        {
                return $this->tipo;
        }

        /**
         * Set the value of tipo
         *
         * @return  self
         */ 
        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $precio;

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
         * Get the value of temporada
         */ 
        public function getTemporada()
        {
                return $this->temporada;
        }

        /**
         * Set the value of temporada
         *
         * @return  self
         */ 
        public function setTemporada($temporada)
        {
                $this->temporada = $temporada;

                return $this;
        }

        /**
         * Get the value of fecha_ingreso
         */ 
        public function getFecha_ingreso()
        {
                return $this->fecha_ingreso;
        }

        /**
         * Set the value of fecha_ingreso
         *
         * @return  self
         */ 
        public function setFecha_ingreso($fecha_ingreso)
        {
                $this->fecha_ingreso = $fecha_ingreso;

                return $this;
        }
    }