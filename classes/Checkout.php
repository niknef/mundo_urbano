<?php

class Checkout
{
    public static function insert_data_checkout(array $datosCompra, array $datosProducto)
    {
        $conexion = Conexion::getConexion();

        // Insertar datos generales de la compra
        $query = "INSERT INTO compras (id, usuario_id, fecha, importe) VALUES (NULL, :id_usuario, :fecha, :importe)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id_usuario" => $datosCompra['id_usuario'],
            "fecha" => $datosCompra['fecha'],
            "importe" => $datosCompra['importe']
        ]);

        $idInsertada = $conexion->lastInsertId();

        // Procesar cada producto del carrito
        foreach ($datosProducto as $key => $detalle) {
            list($productoId, $talleId) = explode("-", $key);

            // Insertar detalles del producto en `item_x_compra`
            $query = "INSERT INTO item_x_compra (id, id_compra, id_producto, id_talle, cantidad, precio_unitario) 
                      VALUES (NULL, :id_compra, :id_producto, :id_talle, :cantidad, :precio_unitario)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id_compra" => $idInsertada,
                "id_producto" => $productoId,
                "id_talle" => $talleId,
                "cantidad" => $detalle['cantidad'],
                "precio_unitario" => $detalle['precio_unitario']
            ]);
        }
    }
}
