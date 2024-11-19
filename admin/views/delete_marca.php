<?php
$id = $_GET['id'] ?? false;
$marca = Marca::get_x_id($id);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 text-center p-4 shadow rounded bg-white">
        <h2 class="mb-4 fw-bold text-danger">¿Está seguro que desea eliminar esta Marca?</h2>

        <!-- Información de la marca -->
        <div class="mb-4 text-start">
            <div class="mb-3">
                <h3 class="fs-5 text-secondary">Nombre de la marca</h3>
                <p class="fs-6 fw-bold text-dark"><?= $marca->getNombre() ?></p>
            </div>

            <div class="mb-3">
                <h3 class="fs-5 text-secondary">Logo de la Marca</h3>
                <img src="<?= $marca->getImg() ?>" alt="<?= $marca->getNombre() ?>" class="img-fluid border rounded" style="max-height: 200px; object-fit: cover;">
            </div>

            <div>
                <h3 class="fs-5 text-secondary">Descripción</h3>
                <p class="fs-6 text-muted"><?= $marca->getDescripcion() ?></p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-center gap-3">
            <a href="index.php?sec=admin_marcas" class="btn btn-outline-secondary px-4">
                <i class="bi bi-x-circle me-2"></i>Cancelar
            </a>
            <a href="actions/delete_marca_acc.php?id=<?= $marca->getId() ?>" class="btn btn-danger px-4">
                <i class="bi bi-trash-fill me-2"></i>Eliminar
            </a>
        </div>
    </div>
</div>