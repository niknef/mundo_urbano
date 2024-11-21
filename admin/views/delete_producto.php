<?php
$id = $_GET['id'] ?? false;
$producto = Producto::buscarProductoPorId($id);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 text-center p-4 shadow rounded bg-light">
        <h2 class="mb-4 fw-bold text-danger">¿Está seguro que desea eliminar este Producto?</h2>

        <!-- Información del producto -->
        <div class="mb-4 text-start bg-white p-3 rounded shadow-sm">
            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Nombre del Producto</h3>
                <p class="fs-5 fw-bold text-dark"><?= $producto->getNombre() ?></p>
            </div>

            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Imagen del Producto</h3>
                <div class="text-center">
                    <img src="../img/productos/<?= $producto->getImg() ?>" alt="<?= $producto->getNombre() ?>" class="img-fluid border rounded img-admin">
                </div>
            </div>

            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Descripción</h3>
                <p class="fs-6 text-muted"><?= $producto->getDescripcion() ?></p>
            </div>

            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Precio</h3>
                <p class="fs-5 fw-bold text-dark">$<?= number_format($producto->getPrecio(), 2, ',', '.') ?></p>
            </div>

            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Categoría</h3>
                <p class="fs-6 text-muted"><?= $producto->getCategoria() ?></p>
            </div>

            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Marca</h3>
                <p class="fs-6 text-muted"><?= $producto->getMarca() ?></p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="index.php?sec=admin_productos" class="btn btn-outline-secondary px-4">
                <i class="bi bi-x-circle me-2"></i>Cancelar
            </a>
            <a href="actions/delete_producto_acc.php?id=<?= $producto->getId() ?>" class="btn btn-danger px-4">
                <i class="bi bi-trash-fill me-2"></i>Eliminar
            </a>
        </div>
    </div>
</div>
