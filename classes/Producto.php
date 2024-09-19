<?PHP
    class Producto
    {
        private $id;
        private $categoria;
        private $nombre;
        private $marca;
        private $tipo;
        private $color;
        private $talles;
        private $img;
        private $descripcion;
        private $temporada;
        private $anio;
        private $precio;

        /**
         * Devuelve el inventario completo
         *  
         * @return Producto[]   Un array con todos los productos del inventario.
         */
        public static function inventario_completo(): array
        {
            $inventario = [];

            $JSON = file_get_contents('data/inventario.json');
            $JSON_DATA = json_decode($JSON);

            foreach ($JSON_DATA as $value){

                $producto = new self();

                $producto->id = $value->id;
                $producto->categoria = $value->categoria;
                $producto->nombre = $value->nombre;
                $producto->marca = $value->marca;
                $producto->tipo = $value->tipo;
                $producto->color = $value->color;
                $producto->talles = $value->talles;
                $producto->img = $value->img;
                $producto->descripcion = $value->descripcion;
                $producto->temporada = $value->temporada;
                $producto->anio = $value->anio;
                $producto->precio = $value->precio;

                $inventario[] = $producto;
            }

            return $inventario;
        }

        /**
         * Devuelve el catalogo de productos de una categoria especifica.
         * 
         * @param string $categoria La categoria de la cual se desea obtener el catalogo.
         * @return Producto[] Un array con los productos de la categoria especificada.
         */
        public static function catalogo_por_categoria(string $categoria): array
        {
            $result = [];

            // Traemos el inventario completo desde el archivo JSON
            $catalogo = self::inventario_completo();

            foreach ($catalogo as $producto) {
                if (strtolower($producto->categoria) === strtolower($categoria)) {
                    $result[] = $producto;
                }
            }
            return $result;
        }

        /**
         * Busca un producto por su ID en el inventario.
         * 
         * @param int $id El ID del producto a buscar.
         * @return ?Producto Retorna un objeto Producto con los datos del producto si se encuentra, de lo contrario retorna NULL.
         */
        public static function buscarProductoPorId(int $id): ?Producto
        {
            // Traemos el inventario completo desde el archivo JSON
            $inventario = self::inventario_completo();

            // Recorremos cada categoría dentro del inventario
            foreach ($inventario as $producto) {
                if ($producto->id == $id) {
                    return $producto;
                }
            }

            return null;
        }

        /**
         * Filtra los productos de un inventario basándose en la temporada y/o año proporcionados.
         * 
         * @param string|null $temporada La temporada para filtrar los productos (opcional).
         * @param string|null $anio El año para filtrar los productos (opcional).
         * 
         * @return Producto[] Retorna un array de productos que pertenecen a la temporada y/o año especificado. Si no hay coincidencias retorna un array vacío.
         */
        public static function filtrarProductosTemporada(string $temporada = null, string $anio = null): array{
            // Si ambos son null, no hay productos en oferta
            if (is_null($temporada) && is_null($anio)) {
                return []; // Devolvemos un array vacío
            }

            $inventario = self::inventario_completo();
            $result = [];

            foreach ($inventario as $producto) {
                if ($producto->temporada == $temporada || $producto->anio == $anio) {
                    $result[] = $producto;
                }
            }

            return $result;
        }

        /**
         * Aplica un descuento a un producto si pertenece a la temporada y/o año indicado.
         * 
         * @param Producto $producto El producto al que se le va a aplicar el descuento.
         * @param string|null $temporada La temporada para ofertar los productos (opcional).
         * @param string|null $anio El año para ofertar los productos (opcional).
         * @param float|int $descuento El porcentaje de descuento a aplicar. Por defecto es 15%. (Opcional)
         * 
         * @return float Retorna el precio con descuento si el producto pertenece a la temporada y/o año especificado.
         */
        public static function aplicarDescuento(Producto $producto, string $temporada = null, string $anio = null, float $descuento = 15): float
        {
            // Si ambos son null
            if (is_null($temporada) && is_null($anio)) {
                return $producto->precio;
            }

            $coincideTemporada = $temporada ? strtolower($producto->temporada) === strtolower($temporada) : true;
            $coincideAnio = $anio ? $producto->anio == $anio : true;

            if ($coincideTemporada && $coincideAnio) {
                $precioConDescuento = $producto->precio - ($producto->precio * ($descuento / 100));
                return round($precioConDescuento, 2);
            }

            return $producto->precio;
        }

        /**
         * Devuelve el precio de la unidad, formateado correctamente
         */
        public function precio_formateado(): string
        {
            return "$" . number_format($this->precio, 2, ",", ".");
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
         * Get the value of categoria
         */ 
        public function getCategoria()
        {
                return $this->categoria;
        }

        /**
         * Set the value of categoria
         *
         * @return  self
         */ 
        public function setCategoria($categoria)
        {
                $this->categoria = $categoria;

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
         * Get the value of marca
         */ 
        public function getMarca()
        {
                return $this->marca;
        }

        /**
         * Set the value of marca
         *
         * @return  self
         */ 
        public function setMarca($marca)
        {
                $this->marca = $marca;

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
         * Get the value of talles
         */ 
        public function getTalles()
        {
                return $this->talles;
        }

        /**
         * Set the value of talles
         *
         * @return  self
         */ 
        public function setTalles($talles)
        {
                $this->talles = $talles;

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
         * Get the value of anio
         */ 
        public function getAnio()
        {
                return $this->anio;
        }

        /**
         * Set the value of anio
         *
         * @return  self
         */ 
        public function setAnio($anio)
        {
                $this->anio = $anio;

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
    }