<?php
require_once "../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$talle = Talle::get_x_id($id);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 text-center p-4 shadow rounded bg-light">
        <h2 class="mb-4 fw-bold text-danger">¿Está seguro que desea eliminar esta Categoría de Talles?</h2>

    

            <div>
                <h3 class="fs-6 text-secondary">Talle:</h3>
                <p class="fs-5 fw-bold text-dark"><?= $talle->getTalle(); ?></p>

            </div>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="index.php?link=admin_talles" class="btn btn-outline-secondary px-4">
                <i class="bi bi-x-circle me-2"></i>Cancelar
            </a>
            <a href="actions/delete_talle_acc.php?id=<?= $talle->getId() ?>" class="btn btn-danger px-4">
                <i class="bi bi-trash-fill me-2"></i>Eliminar
            </a>
        </div>
    </div>
</div>
