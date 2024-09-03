<div class="d-flex justify-content-center py-4 custom-card">
    <div>
        <h1 class="text-start mb-5 fw-light fs-2">Todos los Productos</h1>
        <div class="container">
            <div class="row">
                <?php foreach ($catalogo as $producto) { ?>
                    <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
                        <a href="index.php?link=detalle_producto.php&id=<?= $producto['id'] ?>" class="card mb-3 text-decoration-none text-dark w-100">
                            <div class="card border-0 h-100 rounded-1 d-flex flex-column">
                                <img src="./img/<?= $producto['img'] ?>" class="card-img-top" alt="<?= $producto['nombre'] ?>">
                                <div class="card-body text-start flex-grow-1 d-flex flex-column justify-content-between">
                                    <h2 class="card-title fw-light fs-4"><?= $producto['nombre'] ?></h2>
                                    <p class="fs-4 fw-semibold text-dark mt-2">$<?= $producto['precio'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>