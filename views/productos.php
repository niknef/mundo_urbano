<?PHP
// Filtramos por categoría si hay una categoría seleccionada
if ($categoriaSeleccionada) {
    $catalogo = Producto::inventario_por_categoria($categoriaSeleccionada);
} else {
    // Si no hay categoría seleccionada, traemos todo el inventario
    $catalogo = Producto::inventario_completo();
}

 // Si se selecciona un filtro de orden, lo aplicamos sobre el catálogo filtrado
if (isset($_GET['orden'])) {
     $catalogo = Producto::ordenarPorPrecio($catalogo, $_GET['orden']);
 }


// echo "<pre>";
// print_r($catalogo);
// echo "</pre>";

// Inicializamos el nombre de la categoría
$tituloCategoria = "Todos los productos";

// Verificamos si se seleccionó una categoría por ID
if (isset($categoriaSeleccionada) && !empty($categoriaSeleccionada)) {
    $categoria = Categoria::get_x_id($categoriaSeleccionada);
    if ($categoria) {
        $tituloCategoria = $categoria->getNombre();
    } else {
        
        $tituloCategoria = "Categoría no encontrada";
    }
}
?>


<section>
    <div class="d-flex justify-content-between align-items-center py-4 flex-column flex-md-row text-center text-md-start">
        <div class="mb-3 mb-md-0">
            <h2 class="fw-light fs-2"> 
                <?= ucfirst($tituloCategoria) ?>
            </h2>
        </div>
        <div class="d-flex gap-2">
            <a href="index.php?link=productos&categoria=<?= $categoriaSeleccionada ?>&orden=asc" class="btn btn-sm btn-outline-primary">Precio: Menor a Mayor</a>
            <a href="index.php?link=productos&categoria=<?= $categoriaSeleccionada ?>&orden=desc" class="btn btn-sm btn-outline-secondary">Precio: Mayor a Menor</a>
        </div>
    </div>
    <div class="d-flex justify-content-center py-4 custom-card">
        <div class="container">
            <div class="row">       
                <?php foreach ($catalogo as $producto) { ?>
                    <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
                        <a href="index.php?link=detalle_producto&id=<?= $producto->getId() ?>" class="card mb-3 text-decoration-none text-dark w-100">
                            <div class="card border-0 h-100 rounded-1 d-flex flex-column">
                                <img src="./img/productos/<?= $producto->getImg() ?>" class="card-img-top" alt="<?= $producto->getNombre() ?>">
                                <div class="card-body text-start flex-grow-1 d-flex flex-column justify-content-between">
                                    <h3 class="card-title fw-light fs-4"><?= $producto->getNombre() ?></h3>
                                    <p class="fs-5 fw-light text-dark mt-2">
                                    <p class="fs-5 fw-light text-dark mt-2">
                                        <?= $producto->obtenerPrecioConDescuento($temporada, $anio, $descuento); ?>
                                    </p>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>