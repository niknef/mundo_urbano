<?php
$categoriaSeleccionada = isset($_GET['categoria']) ? (int)$_GET['categoria'] : null;
$marcaSeleccionada = isset($_GET['marca']) ? (int)$_GET['marca'] : null;
$terminoBusqueda = $_GET['busqueda'] ?? null;

// Obtener productos con el nuevo método
$catalogo = Producto::obtenerProductosFiltrados($categoriaSeleccionada, $marcaSeleccionada, $terminoBusqueda);

if ($categoriaSeleccionada) {
    $categoria = Categoria::get_x_id($categoriaSeleccionada);
    $tituloCategoria = $categoria ? $categoria->getNombre() : "Categoría no encontrada";
} elseif ($marcaSeleccionada) {
    $marca = Marca::get_x_id($marcaSeleccionada);
    $tituloCategoria = $marca ? $marca->getNombre() : "Marca no encontrada";
} else {
    $tituloCategoria = "Todos los productos";
}
?>

<section>
    <div class="d-flex justify-content-between align-items-center py-4 flex-column flex-md-row text-center text-md-start">
        <!-- Título de la categoría -->
        <div class="mb-3 mb-md-0">
            <h2 class="fw-light fs-2"> 
                <?= ucfirst($tituloCategoria) ?>
            </h2>
        </div>

        <!-- Filtro de búsqueda (solo para "Todos los productos") -->
        <?php if (!$categoriaSeleccionada && !$marcaSeleccionada): ?>
            <div class="d-flex justify-content-end w-md-auto mt-3 mt-md-0">
                <form action="index.php?link=productos" method="GET" class="d-flex flex-column flex-md-row align-items-center">
                    <input type="hidden" name="link" value="productos" >
                    <div class="input-group w-100">
                        <input type="text" class="form-control busqueda" name="busqueda" 
                            placeholder="Buscar productos.." 
                            value="<?= $terminoBusqueda ?>">
                        <button class="btn boton-custom-2" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <!-- Mostrar los productos -->
    <div class="d-flex justify-content-center py-4 custom-card">
        <div class="container">
            <div class="row">       
                <?php if (!empty($catalogo)): ?>
                    
                    <?php foreach ($catalogo as $producto): ?>
                        <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
                            <a href="index.php?link=detalle_producto&id=<?= $producto->getId() ?>" class="card mb-3 text-decoration-none text-dark w-100">
                                <div class="card border-0 h-100 rounded-1 d-flex flex-column">
                                    <img src="./img/productos/<?= $producto->getImg() ?>" class="card-img-top" alt="<?= $producto->getNombre() ?>">
                                    <div class="card-body text-start flex-grow-1 d-flex flex-column justify-content-between">
                                        <h3 class="card-title fw-light fs-4"><?= $producto->getNombre() ?></h3>
                                        <p class="fs-5 fw-light text-dark mt-2">
                                            <?= $producto->obtenerPrecioConDescuento($temporada, $anio, $descuento); ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">No se encontraron productos.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
