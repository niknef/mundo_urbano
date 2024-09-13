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

    foreach ($catalogo as $productos) {
        if (strtolower($productos['categoria']) === strtolower($categoria)) {
            $result[] = $productos;
        }
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
    foreach ($inventario as $producto) {
        if ($producto['id'] == $id) {
                return $producto;
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
    // Si ambos son null, no hay productos en oferta
    if (is_null($temporada) && is_null($anio)) {
        return [];
    }

    $inventario = inventario_completo();
    $productosOferta = [];

    foreach ($inventario as $producto) {
        $coincideTemporada = $temporada ? strtolower($producto['temporada']) === strtolower($temporada) : true;
        $coincideAnio = $anio ? $producto['anio'] == $anio : true;

        if ($coincideTemporada && $coincideAnio) {
            $productosOferta[] = $producto;
        }
    }

    return $productosOferta;
}

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
    // Si ambos son null
    if (is_null($temporada) && is_null($anio)) {
        return $producto['precio'];
    }

    
    $coincideTemporada = $temporada ? strtolower($producto['temporada']) === strtolower($temporada) : true;
    $coincideAnio = $anio ? $producto['anio'] == $anio : true;

    if ($coincideTemporada && $coincideAnio) {
        $precioConDescuento = $producto['precio'] - ($producto['precio'] * ($descuento / 100));
        return round($precioConDescuento, 2);
    }

    return $producto['precio'];
}




?>