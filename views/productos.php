<?php

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
$precioMin = isset($_GET['precio_min']) ? (int)$_GET['precio_min'] : 0;
$precioMax = isset($_GET['precio_max']) ? (int)$_GET['precio_max'] : null;
$orden = isset($_GET['orden']) ? $_GET['orden'] : '';
$categoriaSeleccionada = isset($_GET['categoria']) && $_GET['categoria'] !== '' ? (int)$_GET['categoria'] : null;


// Obtener el inventario inicial
if ($categoriaSeleccionada) {
    $catalogo = Producto::inventario_por_categoria($categoriaSeleccionada);
} else {
    $catalogo = Producto::inventario_completo();
}

// Aplicar filtros
if ($orden) {
    $catalogo = Producto::ordenarPorPrecio($_GET['orden'], $categoriaSeleccionada);
}

if ($precioMin && $precioMax) {
    $catalogo = Producto::productos_x_rango((int)$_GET['precio_min'], (int)$_GET['precio_max'], $categoriaSeleccionada);
}

if ($busqueda) {
    $catalogo = Producto::buscarProducto($_GET['busqueda'], $categoriaSeleccionada);
}

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
        <!-- Título de la categoría -->
        <div class="mb-3 mb-md-0">
            <h2 class="fw-light fs-2"> 
                <?= ucfirst($tituloCategoria) ?>
            </h2>
        </div>
    </div>

    <div class="py-4">
        <form action="index.php" method="GET" class="row g-3 align-items-end">
            <input type="hidden" name="link" value="productos">
            <input type="hidden" name="categoria" value="<?= $categoriaSeleccionada ?>">

            <!-- Filtro por búsqueda -->
            <div class="col-md-4">
                <label for="busqueda" class="form-label fw-semibold">Buscar Producto</label>
                <input type="text" id="busqueda" name="busqueda" class="form-control" placeholder="Nombre, descripción o tipo" value="<?= $busqueda ?>">
            </div>

            <!-- Filtro por precio mínimo -->
            <div class="col-md-3">
                <label for="precio_min" class="form-label fw-semibold">Precio Mínimo</label>
                <input type="number" id="precio_min" name="precio_min" class="form-control" placeholder="0" value="<?= $precioMin ?>" min="0">
            </div>

            <!-- Filtro por precio máximo -->
            <div class="col-md-3">
                <label for="precio_max" class="form-label fw-semibold">Precio Máximo</label>
                <input type="number" id="precio_max" name="precio_max" class="form-control" placeholder="Infinito" value="<?= $precioMax ?>" min="0">
            </div>

            <!-- Botón para aplicar filtros -->
            <div class="col-md-2 text-end">
                <button type="submit" class="btn boton-custom w-100">Aplicar Filtros</button>
            </div>
        </form>

        <!-- Botones para ordenar por precio -->
        <div class="mt-3 text-center text-md-start">
            <span class="fw-semibold me-2">Ordenar por:</span>
            <a href="index.php?link=productos&categoria=<?= $categoriaSeleccionada ?>&orden=asc&busqueda=<?= $busqueda ?>&precio_min=<?= $precioMin ?>&precio_max=<?= $precioMax ?>" class="btn btn-outline-primary btn-sm me-2">Menor a Mayor</a>
            <a href="index.php?link=productos&categoria=<?= $categoriaSeleccionada ?>&orden=desc&busqueda=<?= $busqueda ?>&precio_min=<?= $precioMin ?>&precio_max=<?= $precioMax ?>" class="btn btn-outline-secondary btn-sm">Mayor a Menor</a>
        </div>
    </div>

    <!-- Mostrar los productos -->
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
                                        <?= $producto->obtenerPrecioConDescuento($temporada, $anio, $descuento); ?>
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