<?PHP 
// Lista de categorías válidas
$categorias_validas = ['zapatillas', 'hombre', 'mujer', 'accesorios'];

// Obtener la categoría seleccionada por URL
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : false;

// Obtener el link solicitado por URL
$link = isset($_GET['link']) ? $_GET['link'] : 'inicio';

// Verificar si la categoría es válida
if ($categoriaSeleccionada && !in_array($categoriaSeleccionada, $categorias_validas)) {
    $vista = '404';
} else {
    // Array de links válidos
    $links_validos = [
        '404' => [
            'title' => '404 - Página no encontrada',
        ],
        'inicio' => [
            'title' => 'Tienda Online de Indumentaria y Calzado',
        ],
        'todos_productos' => [
            'title' => 'Todos los Productos',
        ],
        'nosotros' => [
            'title' => 'Nosotros',
        ],
        'productos' => [
            'title' => !empty($categoriaSeleccionada) ? ucfirst($categoriaSeleccionada) : "Todos los productos",
        ],
        'detalle_producto' => [
            'title' => 'Detalle del Producto',
        ],
        'oferta' => [
            'title' => 'Ofertas',
        ],
    ];

    // Verificar si el link es válido
    if (!array_key_exists($link, $links_validos)) {
        $vista = '404';
    } else {
        $vista = $link;
    }
}
