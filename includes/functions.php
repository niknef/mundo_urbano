<?PHP 


/**
 * Aplica un descuento a un producto si pertenece a la temporada de invierno.
 * 
 * @param array $producto Array asociativo que representa un producto.
 * @param mixed $temporada La temporada o año para ofertar los productos.
 * @param float|int $descuento El porcentaje de descuento a aplicar. Por defecto es 15%. (Opcional)
 * 
 * @return float Retorna el precio con descuento si el producto pertenece a la temporada 'invierno'.
 *         Si no pertenece a dicha temporada, retorna el precio original del producto.
 */
function aplicarDescuento(array $producto, string $temporada, float $descuento = 15): float {
    //Uso el srtpos ya que me permite buscar una cadena dentro de otra cadena dentro de temporada
    if (isset($producto['temporada']) && strpos(strtolower($producto['temporada']), $temporada) !== false) {
        // Aplicar el descuento del porcentaje especificado (por defecto, 15%)
        $precioConDescuento = $producto['precio'] - ($producto['precio'] * ($descuento / 100));
        return round($precioConDescuento, 2); // Redondear a 2 decimales
    } 

    // Si no es temporada de invierno, retornar el precio original
    return $producto['precio'];
};

/**
 * Filtra los productos de un inventario basándose en la temporada proporcionada.
 * 
 * @param array $inventario que representa el inventario de productos, categorizado.
 * @param string $temporada La temporada para filtrar los productos.
 * 
 * @return array Retorna un array de productos que pertenecen a la temporada especificada.
 */
function filtrarProductosTemporada(array $inventario, string $temporada): array {
    $productosOferta = [];

    foreach ($inventario as $catalogo => $productos) {
        foreach ($productos as $producto) {
            // Verifico si la temporada del producto contiene la temporada especificada
            if (strpos(strtolower($producto['temporada']), strtolower($temporada)) !== false) {
                $productosOferta[] = $producto;
            }
        }
    }

    return $productosOferta;
};

?>