<?PHP 
require_once "../../functions/autoload.php";

$postData = $_POST;
$datosArchivo = $_FILES['img'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;


try {
    $producto = Producto::buscarProductoPorId($id);

    $producto->vaciarTalles();

    // Procesar los talles
    if (isset($postData['talles'])) {
        foreach ($postData['talles'] as $talle_id => $cantidad) {
            // Validar que la cantidad sea un número mayor o igual a 0
            if (is_numeric($cantidad) && $cantidad >= 0) {
                // Vincular el talle con el producto
                $producto->insertTalleXProducto($id, $talle_id, $cantidad);
            }
        }
    }

    //editar imagen
    if (!empty($datosArchivo['tmp_name'])) {
        $img = Imagen::subirImagen("../../img/productos/", $datosArchivo);
        Imagen::borrarImagen("../../img/productos/" . $producto->getImg());
    } else {
        $img = $postData['imagen_org'];
    }

    $producto->edit(
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

    Alerta::new_alert('success', "El producto se editó correctamente");
}catch (Exception $e) {
    Alerta::new_alert('danger', "El producto no se puede editar, disculpe las molestias.");
}

header('Location: ../index.php?link=admin_productos');