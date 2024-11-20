<?php
$id = $_GET['id'] ?? false;
$marca = Marca::get_x_id($id);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 text-center p-4 shadow rounded bg-light">
        <h2 class="mb-4 fw-bold text-danger">¿Está seguro que desea eliminar esta Marca?</h2>

        <!-- Información de la marca -->
        <div class="mb-4 text-start bg-white p-3 rounded shadow-sm">
            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Nombre de la Marca</h3>
                <p class="fs-5 fw-bold text-dark"><?= $marca->getNombre() ?></p>
            </div>

            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Logo de la Marca</h3>
                <div class="text-center">
                    <img src="../img/logos/<?= $marca->getImg() ?>" alt="<?= $marca->getNombre() ?>" class="img-fluid border rounded img-admin" >
                </div>
            </div>

            <div>
                <h3 class="fs-6 text-secondary">Descripción</h3>
                <p class="fs-6 text-muted"><?= $marca->getDescripcion() ?></p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="index.php?sec=admin_marcas" class="btn btn-outline-secondary px-4">
                <i class="bi bi-x-circle me-2"></i>Cancelar
            </a>
            <a href="actions/delete_marca_acc.php?id=<?= $marca->getId() ?>" class="btn btn-danger px-4">
                <i class="bi bi-trash-fill me-2"></i>Eliminar
            </a>
        </div>
    </div>
</div>
