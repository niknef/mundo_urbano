<?php
class Vista {
    /**
     * Valida el identificador de una vista y devuelve un array con los datos de la misma
     * @param ?string $link El identificador de la vista, o null
     * @param ?string $categoriaSeleccionada La categoría seleccionada, o null
     *  
     * @return array devuelve un array con el nombre de archivo y el título a mostrar  
     */
    public static function validar_vista(?string $link, ?string $categoriaSeleccionada = null): array {
        // Lista de categorías válidas
        $categorias_validas = ['zapatillas', 'hombre', 'mujer', 'accesorios'];

        // Verificar si la categoría es válida
        if ($categoriaSeleccionada && !in_array($categoriaSeleccionada, $categorias_validas)) {
            return [
                'archivo' => '404',
                'titulo' => 'Página no encontrada'
            ];
        }

        // Array de links válidos
        $links_validos = [
            '404' => [
                'archivo' => '404',
                'titulo' => '404 - Página no encontrada',
            ],
            'inicio' => [
                'archivo' => 'inicio',
                'titulo' => 'Tienda Online de Indumentaria y Calzado',
            ],
            'todos_productos' => [
                'archivo' => 'todos_productos',
                'titulo' => 'Todos los Productos',
            ],
            'nosotros' => [
                'archivo' => 'nosotros',
                'titulo' => 'Nosotros',
            ],
            'productos' => [
                'archivo' => 'productos',
                'titulo' => !empty($categoriaSeleccionada) ? ucfirst($categoriaSeleccionada) : 'Todos los productos',
            ],
            'detalle_producto' => [
                'archivo' => 'detalle_producto',
                'titulo' => 'Detalle del Producto',
            ],
            'oferta' => [
                'archivo' => 'oferta',
                'titulo' => 'Ofertas',
            ],
        ];

        // Verificar si el link es válido
        if (!array_key_exists($link, $links_validos)) {
            return [
                'archivo' => '404',
                'titulo' => 'Página no encontrada'
            ];
        }

        return $links_validos[$link];
    }
}