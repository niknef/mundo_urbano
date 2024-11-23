<?php 

class Compra {

    /**
     * Devuelve el historial de compras de un usuario
     * 
     * @return Compra[] Un array de objetos Compra
     */
    public static function historial_compras(int $idUsuario): array
{
    $conexion = Conexion::getConexion();
    $query = "SELECT 
            compras.id, 
            compras.fecha, 
            compras.importe, 
            GROUP_CONCAT(CONCAT(item_x_compra.cantidad, 'x ', productos.nombre, ' (', talles.talle, ')') SEPARATOR ', ') AS detalle
        FROM compras
        JOIN item_x_compra ON compras.id = item_x_compra.id_compra
        JOIN productos ON item_x_compra.id_producto = productos.id
        JOIN talles ON item_x_compra.id_talle = talles.id
        WHERE compras.usuario_id = ?
        GROUP BY compras.id;";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute([$idUsuario]);

    $result = $PDOStatement->fetchAll();

    return $result ?? [];
}
}

?>