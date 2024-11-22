<?PHP
class Producto
{
        private int $id;
        private Categoria $categoria;
        private Marca $marca;
        private Color $color;
        private string $nombre;
        private string $descripcion;
        private string $tipo;
        private float $precio;
        private string $img;
        private string $temporada;
        private string $fecha_ingreso;
        private array $talles;

        private static $createValues = [ "id", "nombre", "descripcion", "tipo", "precio", "img", "temporada", "fecha_ingreso"];



        /**
         * Crea una instancia de Producto a partir de los datos proporcionados, incluyendo sus relaciones y talles.
         *
         * @param array $productoData Un array asociativo que contiene los datos del producto, incluyendo propiedades básicas y relaciones.
         *
         * @return Producto Una instancia de Producto completamente inicializada.
         */
        private static function createProducto($productoData): Producto
        {
                $producto = new self();

                // Configurar propiedades básicas
                foreach (self::$createValues as $value) {
                        $producto->{$value} = $productoData[$value];
                }

                // Cargar relaciones (categoría, marca, color)
                $producto->categoria = Categoria::get_x_id($productoData["categoria_id"]);
                $producto->marca = Marca::get_x_id($productoData["marca_id"]);
                $producto->color = Color::get_x_id($productoData["color_id"]);

                // Procesar los talles y cantidades
                $tallesIds = !empty($productoData["talles_ids"]) ? explode(",", $productoData["talles_ids"]) : [];
                $cantidades = !empty($productoData["cantidades"]) ? explode(",", $productoData["cantidades"]) : [];

                $talles = [];
                foreach ($tallesIds as $index => $talleId) {
                        $talleId = (int)$talleId; // Asegurarse de que sea un entero
                        $cantidad = $cantidades[$index] ?? null; // Obtener la cantidad correspondiente al talle o null

                        // Validar el talle y la cantidad
                        if ($talleId > 0 && $cantidad !== null && $cantidad !== '' && is_numeric($cantidad) && $cantidad >= 0) {
                        $talle = Talle::get_x_id($talleId);
                        if ($talle) {
                                $talles[] = [
                                "talle" => $talle,
                                "cantidad" => (int)$cantidad
                                ];
                        }
                        }
                }

                $producto->talles = $talles;

                return $producto;
        }



        /**
         * Inserta un nuevo producto en la base de datos
         * 
         * @param int $categoria_id El ID de la categoría del producto
         * @param int $marca_id El ID de la marca del producto
         * @param int $color_id El ID del color del producto
         * @param string $nombre El nombre del producto
         * @param string $descripcion La descripción del producto
         * @param string $tipo El tipo del producto
         * @param float $precio El precio del producto
         * @param string $img La URL de la imagen del producto
         * @param string $temporada La temporada del producto
         * @param string $fecha_ingreso La fecha de ingreso del producto
         * 
         */
        public static function insert( int $categoria_id, int $marca_id, int $color_id, string $nombre, string $descripcion, string $tipo, float $precio, string $img, string $temporada, string $fecha_ingreso): int
        {
                $conexion = Conexion::getConexion();
                $query = "INSERT INTO productos VALUES (NULL, :categoria_id, :marca_id, :color_id, :nombre, :descripcion, :tipo, :precio, :img, :temporada, :fecha_ingreso)";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute(
                        [
                        ":categoria_id" => $categoria_id,
                        ":marca_id" => $marca_id,
                        ":color_id" => $color_id,
                        ":nombre" => $nombre,
                        ":descripcion" => $descripcion,
                        ":tipo" => $tipo,
                        ":precio" => $precio,
                        ":img" => $img,
                        ":temporada" => $temporada,
                        ":fecha_ingreso" => $fecha_ingreso
                        ]
                        );

                return $conexion->lastInsertId();
        }



        /**
         * Actualiza un producto en la base de datos
         * 
         * @param int $id El ID del producto a actualizar
         * @param int $categoria_id El ID de la categoría del producto
         * @param int $marca_id El ID de la marca del producto
         * @param int $color_id El ID del color del producto
         * @param string $nombre El nombre del producto
         * @param string $descripcion La descripción del producto
         * @param string $tipo El tipo del producto
         * @param float $precio El precio del producto
         * @param string $img La URL de la imagen del producto
         * @param string $temporada La temporada del producto
         * @param string $fecha_ingreso La fecha de ingreso del producto
         * 
         */
        public function edit(int $categoria_id, int $marca_id, int $color_id, string $nombre, string $descripcion, string $tipo, float $precio, string $img, string $temporada, string $fecha_ingreso)
        {
                $conexion = Conexion::getConexion();
                $query = "UPDATE productos SET categoria_id = :categoria_id, marca_id = :marca_id, color_id = :color_id, nombre = :nombre, descripcion = :descripcion, tipo = :tipo, precio = :precio, img = :img, temporada = :temporada, fecha_ingreso = :fecha_ingreso WHERE id = :id";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute(
                        [
                        ":id" => $this->id,
                        ":categoria_id" => $categoria_id,
                        ":marca_id" => $marca_id,
                        ":color_id" => $color_id,
                        ":nombre" => $nombre,
                        ":descripcion" => $descripcion,
                        ":tipo" => $tipo,
                        ":precio" => $precio,
                        ":img" => $img,
                        ":temporada" => $temporada,
                        ":fecha_ingreso" => $fecha_ingreso
                        ]
                );
        }



        /**
         * Elimina un producto de la base de datos
         * 
         * 
         * 
         */
        public function delete()
        {
                $conexion = Conexion::getConexion();
                $query = "DELETE FROM productos WHERE id = :id";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([":id" => $this->id]);
        }



        /**
         * Crea un vinculo entre un producto y sus talles y cantidades
         * 
         * @param int $producto_id El ID del producto
         * @param int $talle_id El ID del talle
         * @param int $cantidad La cantidad de unidades disponibles
         * 
         */
        public static function insertTalleXProducto(int $producto_id, int $talle_id, int $cantidad)
        {
                $conexion = Conexion::getConexion();
                $query = "INSERT INTO talle_x_producto (producto_id, talle_id, cantidad) 
                        VALUES (:producto_id, :talle_id, :cantidad)";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute(
                        [
                        ":producto_id" => $producto_id,
                        ":talle_id" => $talle_id,
                        ":cantidad" => $cantidad
                        ]
                );
        }



        /**
         * vacia los talles de un producto
         * 
         */
        public function vaciarTalles(){
                $conexion = Conexion::getConexion();
                $query = "DELETE FROM talle_x_producto WHERE producto_id = :producto_id";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([":producto_id" => $this->id]);

        }



        /**
         * Devuelve el inventario completo con talles y cantidades
         *  
         * @return array Un array con todos los productos y sus talles/cantidades.
         */
        public static function inventario_completo(): array
        {
                $conexion = Conexion::getConexion();

                // Query para obtener el inventario completo con talles y cantidades
                $query = "SELECT 
                        p.*, 
                        GROUP_CONCAT(txp.talle_id) AS talles_ids,
                        GROUP_CONCAT(txp.talle_id) AS talles,
                        GROUP_CONCAT(txp.cantidad) AS cantidades
                        FROM productos p
                        LEFT JOIN talle_x_producto txp ON p.id = txp.producto_id
                        LEFT JOIN talles t ON txp.talle_id = t.id
                        GROUP BY p.id
                ";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
                $PDOStatement->execute();

                $inventario = [];

                while ($result = $PDOStatement->fetch()) {
                        $inventario[] = self::createProducto($result);
                }

                return $inventario;
        }
        


        /**
         * Devuelve los datos de un producto en particular, incluyendo sus talles y cantidades.
         * 
         * @param int $id El ID del producto a buscar
         * @return ?Producto Devuelve un objeto Producto o null si no se encuentra.
         */
        public static function buscarProductoPorId(int $id): ?Producto
        {
                $conexion = Conexion::getConexion();

                // Query para obtener el producto junto con sus talles y cantidades
                $query = "SELECT 
                        p.*, 
                        GROUP_CONCAT(txp.talle_id) AS talles_ids,
                        GROUP_CONCAT(t.talle) AS talles,
                        GROUP_CONCAT(txp.cantidad) AS cantidades
                        FROM productos p
                        LEFT JOIN talle_x_producto txp ON p.id = txp.producto_id
                        LEFT JOIN talles t ON txp.talle_id = t.id
                        WHERE p.id = ?
                        GROUP BY p.id
                ";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
                $PDOStatement->execute([$id]);

                // Obtener el resultado y crear el objeto Producto
                $result = $PDOStatement->fetch();

                return $result ? self::createProducto($result) : null;
        }



        /**
         * Obtiene todos los productos de la base de datos con parámetros nombrados.
         * 
         * @param int|null $categoriaId ID de la categoría para filtrar (opcional).
         * @param int|null $marcaId ID de la marca para filtrar (opcional).
         * @return Producto[] Un array con todos los productos filtrados.
         */
        public static function obtenerProductosFiltrados(?int $categoriaId = null, ?int $marcaId = null): array
        {
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM productos";
                $conditions = [];
                $params = [];

                if ($categoriaId !== null) {
                        $conditions[] = "categoria_id = :categoria";
                        $params[':categoria'] = $categoriaId;
                }

                if ($marcaId !== null) {
                        $conditions[] = "marca_id = :marca";
                        $params[':marca'] = $marcaId;
                }

                if (!empty($conditions)) {
                        $query .= " WHERE " . implode(" AND ", $conditions);
                }

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStatement->execute($params);

                return $PDOStatement->fetchAll();
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
                // Si ambos parámetros son null, no hay filtros que aplicar
                if (is_null($temporada) && is_null($anio)) {
                        return []; // Retornamos un array vacío
                }

                // Construcción dinámica de la consulta
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM productos";
                $conditions = [];
                $params = [];

                // Filtro por temporada
                if (!is_null($temporada)) {
                        $conditions[] = "LOWER(temporada) = LOWER(:temporada)";
                        $params[':temporada'] = $temporada;
                }

                // Filtro por año
                if (!is_null($anio)) {
                        $conditions[] = "YEAR(fecha_ingreso) = :anio";
                        $params[':anio'] = $anio;
                }

                // Añadimos las condiciones si existen
                if (!empty($conditions)) {
                        $query .= " WHERE " . implode(" AND ", $conditions);
                }

                // Preparar y ejecutar consulta
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStatement->execute($params);

                // Retornar los resultados
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

                return $this->color->getCodigo();
        }

        /**
         * Devuelve el nombre de la marca del producto
         * 
         * @return string El nombre de la marca del producto
         */
        public function getMarca(): string
        {
                return $this->marca->getNombre();
                
        }

        /**
         * Devuelve el nombre de la categoria del producto
         * 
         * @return string El nombre de la categoria del producto
         */
        public function getCategoria(): string
        {
                return $this->categoria->getNombre();
        }

        /**
         * Devuelve el nombre del color del producto
         * 
         * @return string El nombre del color del producto
         */
        public function getColor(): string
        {
                return $this->color->getColor();
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
                return $this->categoria->getId();
        }


        /**
         * Get the value of marca_id
         */ 
        public function getMarca_id()
        {
                return $this->marca->getId();
        }

      
        /**
         * Get the value of color_id
         */ 
        public function getColor_id()
        {
                return $this->color->getId();
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
    }