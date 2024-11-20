<?php
$categoria = $_GET['categoria'] ?? false;

// Si la categoría no existe, redirige a la página 404
if (!$categoria || !Talle::existe_categoria($categoria)) {
    header('Location: index.php?link=404');
    exit;
}
$talles = Talle::get_all_by_categoria($categoria);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 text-center p-4 shadow rounded bg-light">
        <h2 class="mb-4 fw-bold text-danger">¿Está seguro que desea eliminar esta Categoría de Talles?</h2>

        <!-- Información de la categoría -->
        <div class="mb-4 text-start bg-white p-3 rounded shadow-sm">
            <div class="mb-3">
                <h3 class="fs-6 text-secondary">Nombre de la Categoría</h3>
                <p class="fs-5 fw-bold text-dark"><?= $categoria; ?></p>
            </div>

            <div>
                <h3 class="fs-6 text-secondary">Talles Asociados</h3>
                <?php if (!empty($talles)): ?>
                    <ul class="list-unstyled">
                        <?php foreach ($talles as $talle): ?>
                            <li class="fs-6 text-muted"><?= $talle->getTalle(); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="fs-6 text-muted">No hay talles asociados.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="index.php?link=admin_talles" class="btn btn-outline-secondary px-4">
                <i class="bi bi-x-circle me-2"></i>Cancelar
            </a>
            <a href="actions/delete_categoria_talle_acc.php?categoria=<?= $categoria; ?>" class="btn btn-danger px-4">
                <i class="bi bi-trash-fill me-2"></i>Eliminar
            </a>
        </div>
    </div>
</div>
