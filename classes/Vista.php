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

        // Verificar si la categoría seleccionada es válida
        if ($link === 'productos' && !empty($categoriaSeleccionada) && !in_array($categoriaSeleccionada, $categorias_validas)) {
         // Si la categoría no es válida, redirigir a una página de error
            return [
                'archivo' => '404',
                'titulo' => 'Página no encontrada',
            ];
        }
        switch($link) {
            case null:
            case 'inicio':
                $archivo = 'inicio';
                $titulo = 'Tienda Online de Indumentaria y Calzado';
                break;
            case 'todos_productos':
                $archivo = 'todos_productos';
                $titulo = 'Todos los Productos';
                break;
            case 'nosotros':
                $archivo = 'nosotros';
                $titulo = 'Nosotros';
                break;
            case 'productos':
                $archivo = 'productos';
                $titulo = !empty($categoriaSeleccionada) ? ucfirst($categoriaSeleccionada) : 'Todos los productos';
                break;
            case 'detalle_producto':
                $archivo = 'detalle_producto';
                $titulo = 'Detalle del Producto';
                break;
            case 'oferta':
                $archivo = 'oferta';
                $titulo = 'Ofertas';
                break;
            case 'alumno':
                $archivo = 'alumno';
                $titulo = 'Alumno';
                break;
            case 'contacto':
                $archivo = 'contacto';
                $titulo = 'Contacto';
                break;
            case 'gracias':
                $archivo = 'gracias';
                $titulo = 'Gracias';
                break;
            default:
                $archivo = '404';
                $titulo = 'Página no encontrada';
            
        }
        return [
            'archivo' => $archivo,
            'titulo' => $titulo
        ];
    }
}