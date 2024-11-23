<?php 

class Carrito
{

    /**
     * Devuelve el contenido del carrito actual
     */
    public static function get_carrito(): array {
        //retorno el carrito de la sesion
        if (!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }
    }

    /**
     * Agrega un item al carrito de compras
     * @param int $productoID El ID del producto a agregar.
     * @param int $cantidad La cantidad de unidades a agregar.
     * @param int $talleId El ID del talle seleccionado (opcional).
     */
    public static function agregar_item(int $productoID, int $cantidad, ?int $talleId = null) {
        $itemData = Producto::buscarProductoPorId($productoID);

        if ($itemData) {
            // Generar una clave única para el producto y talle en el carrito
            $key = $productoID . ($talleId ? "-$talleId" : "");

            $_SESSION['carrito'][$key] = [
                'nombre' => $itemData->getNombre(),
                'precio' => $itemData->getPrecio(),
                'imagen' => $itemData->getImg(),
                'cantidad' => $cantidad,
                'talle_id' => $talleId
            ];
        }
    }


    /**
     * Actualiza las cantidades de los productos existentes en el carrito
     */
    public static function actualizar_cantidades(array $cantidades) {
        foreach ($cantidades as $key => $value) {
            if (isset($_SESSION['carrito'][$key])) {
                // Validar cantidad antes de actualizar
                $_SESSION['carrito'][$key]['cantidad'] = max(0, (int) $value);

                // Si la cantidad es 0, elimina el producto
                if ($_SESSION['carrito'][$key]['cantidad'] === 0) {
                    unset($_SESSION['carrito'][$key]);
                }
            }
        }
    }

    /**
     * Obtener importe total actual del carrito
     */

     public static function precio_total(): float
     {
        $importeTotal = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $importeTotal += $item['precio'] * $item['cantidad'];
            }
        }
        return $importeTotal;
     }

    /**
     * Elimina un item del carrito
     * @param int|string $key La clave compuesta del carrito
     */
    public static function eliminar_item(string $key) {
        // Validar la existencia de la clave en el carrito
        if (isset($_SESSION['carrito'][$key])) {
            unset($_SESSION['carrito'][$key]);
        }
    }

     /**
     * Elimina todo los items del carrito
     */
    public static function vaciar_carrito(){
        $_SESSION['carrito'] = [];
    }

     
    
}

?>