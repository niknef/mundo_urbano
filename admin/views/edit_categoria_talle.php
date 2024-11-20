<?php
$categoria = $_GET['categoria'] ?? false;

// Si la categoría no existe, me voy al 404
if (!$categoria || !Talle::existe_categoria($categoria)) {
    header('Location: index.php?link=404');
    exit;
}
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 text-center p-4 shadow rounded bg-light">
        <h2 class="mb-4 fw-bold">Editar Nombre de la Categoría</h2>

        <!-- Información de la categoría actual -->
        <div class="mb-4 text-start bg-white p-3 rounded shadow-sm">
            <h3 class="fs-6 text-secondary">Nombre Actual de la Categoría</h3>
            <p class="fs-5 fw-bold text-dark"><?= $categoria ?></p>
        </div>

        <!-- Formulario para editar la categoría -->
        <form action="actions/edit_categoria_talle_acc.php" method="POST" class="text-start">
            <div class="mb-3">
                <label for="nuevo_nombre" class="form-label fw-bold">Nuevo Nombre de la Categoría</label>
                <input type="text" class="form-control" id="nuevo_nombre" name="nuevo_nombre" required>
            </div>

            <!-- Campo oculto para enviar la categoría actual -->
            <input type="hidden" name="categoria_actual" value="<?= $categoria ?>">

            <!-- Botones de acción -->
            <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="index.php?link=admin_talles" class="btn btn-outline-secondary px-4">
                    <i class="bi bi-x-circle me-2"></i>Cancelar
                </a>
                <button type="submit" class="btn boton-custom px-5">
                    <i class="bi bi-save me-2"></i>Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>