
<div class="d-flex justify-content-center py-4 custom-card">
    <div>
        <h1 class="text-start mb-5 fw-light fs-2">Liquidación</h1>
        <div class="container">
            <?php if (empty($productosEnOferta)) { ?>
                <div class="alert alert-info text-center">
                    <h2> No hay productos en oferta para esta temporada. </h2>
                    <img src="./img/sad-svg.svg" alt="No hay productos en oferta" class="img-fluid" style="max-width: 400px;">
                </div>
            <?php } else { ?>
                <div class="row">
                    <?php foreach ($productosEnOferta as $producto) { ?>
                        <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
                            <a href="index.php?link=detalle_producto.php&id=<?= $producto['id'] ?>" class="card mb-3 text-decoration-none text-dark w-100">
                                <div class="card border-0 h-100 rounded-1 d-flex flex-column">
                                    <img src="./img/<?= $producto['img'] ?>" class="card-img-top" alt="<?= $producto['nombre'] ?>">
                                    <div class="card-body text-start flex-grow-1 d-flex flex-column justify-content-between">
                                        <h2 class="card-title fw-light fs-4"><?= $producto['nombre'] ?></h2>
                                        <p class="fs-5 fw-light text-dark mt-2">
                                            <?php 
                                                // Aplicar descuento y mostrar precio
                                                $precio = aplicarDescuento($producto, 15);
                                                if ($precio < $producto['precio']) { ?>
                                                    <span class='fw-lighter text-decoration-line-through text-secondary text-danger me-1'>
                                                        <?= "$" . number_format($producto['precio'], 0, ',', '.') ?>
                                                    </span>
                                                    <?= "$" . number_format($precio, 0, ',', '.') ?>
                                                <?php } else {
                                                    echo "$" . number_format($producto['precio'], 0, ',', '.');
                                                }
                                            ?>
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
</div>