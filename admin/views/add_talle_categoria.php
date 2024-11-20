<?php
require_once "../functions/autoload.php";

$categoria = $_GET['categoria'] ?? false;

if (!$categoria || !Talle::existe_categoria($categoria)) {
    die("La categoría especificada no existe.");
}
?>

<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Agregar Talle a la Categoría: <?= $categoria ?></h2>

        <!-- Formulario -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/add_talle_categoria_acc.php" method="POST">
            <!-- Categoría (campo oculto) -->
            <input type="hidden" name="categoria_talle" value="<?= $categoria ?>">

            <!-- Talle -->
            <div class="col-12">
                <label for="talle" class="form-label fw-bold">Nuevo Talle</label>
                <input type="text" class="form-control" id="talle" name="talle" placeholder="Ejemplo: S, M, L, 8" required>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Agregar</button>
            </div>
        </form>
    </div>
</div>
