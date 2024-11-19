<?php
$id = $_GET['id'] ?? false;
$color = Color::get_x_id($id);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 text-center p-4 shadow rounded bg-light">
        <h2 class="mb-4 fw-bold text-danger">¿Está seguro que desea eliminar este color?</h2>

        <!-- Información del color -->
        <div class="mb-4">
            <h3 class="fs-5">Nombre del Color</h3>
            <p class="fs-6"><?= $color->getColor() ?></p>

            <h3 class="fs-5">Código Hexadecimal</h3>
            <p class="fs-6 d-flex justify-content-center">
                <span class="badge-personalizado d-flex align-items-center">
                    <span class="bola me-2" style="background-color: <?= $color->getCodigo() ?>;"></span>
                    <?= $color->getCodigo() ?>
                </span>
            </p>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-center gap-3">
            <a href="index.php?link=admin_colors" class="btn btn-outline-secondary px-4">Cancelar</a>
            <a href="actions/delete_color_acc.php?id=<?= $color->getId() ?>" class="btn btn-danger px-4">Eliminar</a>
        </div>
    </div>
</div>
