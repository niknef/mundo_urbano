<?php
require_once "../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$talle = Talle::get_x_id($id);

?>

<div class="row my-5">


    <div class="col">
        
    <h2 class="text-center mb-5 fw-bold">Editar Talle</h2>
        <!-- Información del talle actual -->
        <div class="mb-4 text-start p-3">
            <h3 class="fs-6 text-secondary">Categoría</h3>
            <p class="fs-5 fw-bold text-dark"><?= $talle->getCategoria_talle(); ?></p>
        </div>

        <!-- Formulario para editar el talle -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/edit_talle_acc.php?id=<?= $talle->getId() ?>" method="POST">
        

            <!-- Talle -->
            <div class="col-12">
                <label for="talle" class="form-label fw-bold">Talle</label>
                <input type="text" class="form-control" id="talle" name="talle" value="<?= $talle->getTalle(); ?>" required>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Guardar Cambios</button>
            </div>
        </form>
    </div>