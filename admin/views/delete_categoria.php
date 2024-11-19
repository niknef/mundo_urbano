<?php
$id = $_GET['id'] ?? false;
$categoria = Categoria::get_x_id($id);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 text-center p-4 shadow rounded bg-white">
        <h2 class="mb-4 fw-bold text-danger">¿Está seguro que desea eliminar esta categoría?</h2>

        <!-- Información de la categoría -->
        <div class="mb-4 text-start">
            <div class="mb-3">
                <h3 class="fs-5 text-secondary">Nombre de la categoría</h3>
                <p class="fs-6 fw-bold text-dark"><?= $categoria->getNombre() ?></p>
            </div>

            <div class="mb-3">
                <h3 class="fs-5 text-secondary">Imagen de la categoría</h3>
                <img src="<?= $categoria->getImg() ?>" alt="<?= $categoria->getNombre() ?>" class="img-fluid border rounded" style="max-height: 200px; object-fit: cover;">
            </div>

            <div class="mb-3">
                <h3 class="fs-5 text-secondary">Banner de la categoría</h3>
                <img src="<?= $categoria->getBanner_img() ?>" alt="<?= $categoria->getNombre() ?>" class="img-fluid border rounded" style="max-height: 200px; object-fit: cover;">
            </div>

            <div>
                <h3 class="fs-5 text-secondary">Descripción</h3>
                <p class="fs-6 text-muted"><?= $categoria->getDescripcion() ?></p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-center gap-3">
            <a href="index.php?link=admin_categorias" class="btn btn-outline-secondary px-4">
                <i class="bi bi-x-circle me-2"></i>Cancelar
            </a>
            <a href="actions/delete_categoria_acc.php?id=<?= $categoria->getId() ?>" class="btn btn-danger px-4">
                <i class="bi bi-trash-fill me-2"></i>Eliminar
            </a>
        </div>
    </div>
</div>