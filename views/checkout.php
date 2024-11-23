<?php
// Obtener el carrito
$items = Carrito::get_carrito();
?>

<section id="checkout" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Resumen de Compra</h2>
        <div class="row">
            <!-- Lista de productos -->
            <div class="col-lg-9">
                <?php if (empty($items)) : ?>
                    <div class="alert alert-warning text-center">
                        <p class="mb-4">No hay productos en tu carrito.</p>
                        <a href="index.php?link=productos" class="btn boton-custom px-5">Agregar Productos</a>
                    </div>
                <?php else : ?>
                    <ul class="list-unstyled">
                        <?php foreach ($items as $id => $item) : ?>
                            <li class="mb-4">
                                <div class="row align-items-center border-bottom pb-3">
                                    <!-- Imagen del producto -->
                                    <div class="col-md-3">
                                        <img src="img/productos/<?= $item['imagen'] ?>" alt="<?= $item['nombre'] ?>" class="img-fluid rounded">
                                    </div>
                                    <!-- Detalles del producto -->
                                    <div class="col-md-6">
                                        <h4 class="fw-bold"><?= $item['nombre'] ?></h4>
                                        <p class="text-muted mb-1">
                                            Talle: <?= $item['talle_id'] ? Talle::get_x_id($item['talle_id'])->getTalle() : "Sin talle seleccionado" ?>
                                        </p>
                                        <p class="mb-0">Cantidad: <?= $item['cantidad'] ?></p>
                                        <p class="text-dark fw-bold">
                                            Total: $<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?>
                                            <span class="fs-6 text-muted">(<?= number_format($item['precio'], 2, ",", ".") ?> c/u)</span>
                                        </p>
                                    </div>
                                    <!-- Acciones -->
                                    <div class="col-md-3 text-end">
                                        <a href="admin/actions/remove_carrito_acc.php?id=<?= $id ?>" class="btn btn-sm btn-rojo">
                                            <i class="bi bi-trash-fill"></i> Eliminar
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Resumen y Total -->
            <div class="col-lg-3">
                <div class="border p-4 rounded shadow-sm">
                    <h3 class="fw-bold mb-3">Resumen</h3>
                    <p class="fs-5 mb-1">Total a pagar:</p>
                    <p class="fs-3 fw-bold text-success">$<?= number_format(Carrito::precio_total(), 2, ",", ".") ?></p>
                    <div class="d-flex flex-column gap-2 mt-4">
                        <a href="admin/actions/clear_carrito_acc.php" class="btn btn-rojo w-100">
                            <i class="bi bi-trash"></i> Vaciar Carrito
                        </a>
                        <a href="admin/actions/checkout_acc.php" class="btn boton-custom w-100">
                            <i class="bi bi-cart-check"></i> Comprar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
