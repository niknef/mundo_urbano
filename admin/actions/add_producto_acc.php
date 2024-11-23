<?PHP

require_once "../../functions/autoload.php";

$postData = $_POST;
$datosArchivo = $_FILES['img'];

try {
    // Subir la imagen del producto
    $img = Imagen::subirImagen("../../img/productos", $datosArchivo);

    // Insertar el producto y obtener su ID
    $idProducto = Producto::insert(
        $postData['categoria_id'],
        $postData['marca_id'],
        $postData['color_id'],
        $postData['nombre'],
        $postData['descripcion'],
        $postData['tipo'],
        $postData['precio'],
        $img,
        $postData['temporada'],
        $postData['fecha_ingreso']
    );

    // Procesar los talles
    if (isset($postData['talles'])) {
        foreach ($postData['talles'] as $talle_id => $cantidad) {
            // Validar que la cantidad sea un número mayor o igual a 0
            if (is_numeric($cantidad) && $cantidad >= 0) {
                // Vincular el talle con el producto
                Producto::insertTalleXProducto($idProducto, (int)$talle_id, (int)$cantidad);
            }
        }
    }

    Alerta::new_alert('success', "El producto se agregó correctamente");
} catch (Exception $e) {
    Alerta::new_alert('danger', "El producto no se puede agregar, disculpe las molestias.");
}

// Redirigir a la página de administración de productos
header('Location: ../index.php?link=admin_productos');