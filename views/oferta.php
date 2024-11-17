<div class="d-flex justify-content-center py-4 custom-card">
    <div class="container">
        <h2 class="text-start mb-5 fw-light fs-2">Liquidación</h2>
        <?php if (empty($productosEnOferta)) { ?>
            <div class="alert alert-info text-center">
                <h3>No hay productos en oferta para esta temporada.</h3>
                <img src="./img/sad-svg.svg" alt="No hay productos en oferta" class="img-fluid" style="max-width: 400px;">
            </div>
        <?php } else { ?>
            <div class="row">
                <?php foreach ($productosEnOferta as $producto) { ?>
                    <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
                        <a href="index.php?link=detalle_producto&id=<?= $producto->getId() ?>" 
                           class="card mb-3 text-decoration-none text-dark w-100 h-100">
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
        <?php } ?>
    </div>
</div>
