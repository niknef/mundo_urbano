<?PHP 
/**
 * Devuevle el inventario con todos los productos.
 * 
 * @return array un array con todos los productos en stock.
 * 
 */
function inventario_completo():array{
    $JSON = file_get_contents('data/inventario.json');
    $JSON_DATA = json_decode($JSON, true);

    $result = $JSON_DATA;
    return $result;
};

/**
 * Devuelve el catalago de productos de una categoria especifica.
 * 
 * @param string $categoria La categoria de la cual se desea obtener el catalogo.
 * @return array Un array con los productos de la categoria especificada.
 * 
 */
function catalogo_por_categoria(string $categoria): array {
    $result = [];

    // Traemos el inventario completo desde el archivo JSON
    $catalogo = inventario_completo();

    // Verificamos si la categoría existe en el inventario
    if (array_key_exists($categoria, $catalogo)) {
        // Si la categoría existe, devolvemos los productos de esa categoría
        $result = $catalogo[$categoria];
    }

    return $result;
};

/**
 * Busca un producto por su ID en el inventario.
 * 
 * @param int $id El ID del producto a buscar.
 * @return mixed Retorna un array con los datos del producto si se encuentra, de lo contrario retorna FALSE.
 *
 */
function buscarProductoPorId(int $id):mixed {
    // Traemos el inventario completo desde el archivo JSON
    $inventario = inventario_completo();

    // Recorremos cada categoría dentro del inventario
    foreach ($inventario as $productos) {
        foreach ($productos as $producto) {
            // Verificamos si el ID del producto coincide con el ID proporcionado
            if ($producto['id'] == $id) {
                return $producto;
            };
        };
    };

    return null;
};
/**
 * Filtra los productos de un inventario basándose en la temporada y/o año proporcionados.
 * 
 * @param string|null $temporada La temporada para filtrar los productos (opcional).
 * @param string|null $anio El año para filtrar los productos (opcional).
 * 
 * @return array Retorna un array de productos que pertenecen a la temporada y/o año especificado.
 */
function filtrarProductosTemporada(?string $temporada = null, ?string $anio = null): array {
    
    $inventario = inventario_completo();
    $productosOferta = [];

    // Recorremos cada categoría dentro del inventario
    foreach ($inventario as $productos) {
        foreach ($productos as $producto) {
            // Verificamos si el año y la temporada coinciden con los parámetros
            $coincideTemporada = $temporada ? strtolower($producto['temporada']) === strtolower($temporada) : true;

            $coincideAnio = $anio ? $producto['anio'] == $anio : true;
            
            if ($coincideTemporada && $coincideAnio) {
                $productosOferta[] = $producto;
            }
        }
    }

    return $productosOferta;
};

/**
 * Aplica un descuento a un producto si pertenece a la temporada y/o año indicado.
 * 
 * @param array $producto Array asociativo que representa un producto.
 * @param string|null $temporada La temporada para ofertar los productos (opcional).
 * @param string|null $anio El año para ofertar los productos (opcional).
 * @param float|int $descuento El porcentaje de descuento a aplicar. Por defecto es 15%. (Opcional)
 * 
 * @return float Retorna el precio con descuento si el producto pertenece a la temporada y/o año especificado.
 */
function aplicarDescuento(array $producto, ?string $temporada = null, ?string $anio = null, float $descuento = 15): float {
    $coincideTemporada = $temporada ? strtolower($producto['temporada']) === strtolower($temporada) : true;
    $coincideAnio = $anio ? $producto['anio'] == $anio : true;

    if ($coincideTemporada && $coincideAnio) {
        $precioConDescuento = $producto['precio'] - ($producto['precio'] * ($descuento / 100));
        return round($precioConDescuento, 2);
    }

    // Retornar el precio original si no aplica el descuento
    return $producto['precio'];
};




?>