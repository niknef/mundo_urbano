<?php
$oferta = Oferta::get_x_id(1);
?>

<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Editar Oferta</h2>

        <!-- Formulario -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/edit_oferta_acc.php" method="POST">

            <!-- Select para la temporada -->
            <div class="col-md-6">
                <label for="temporada" class="form-label fw-bold">Temporada</label>
                <select name="temporada" id="temporada" class="form-select" required>
                    <option value="null" <?= is_null($oferta->getTemporada()) ? 'selected' : '' ?>>Sin valor</option>
                    <option value="Verano" <?= $oferta->getTemporada() === 'Verano' ? 'selected' : '' ?>>Verano</option>
                    <option value="Invierno" <?= $oferta->getTemporada() === 'Invierno' ? 'selected' : '' ?>>Invierno</option>
                    <option value="Otoño" <?= $oferta->getTemporada() === 'Otoño' ? 'selected' : '' ?>>Otoño</option>
                    <option value="Primavera" <?= $oferta->getTemporada() === 'Primavera' ? 'selected' : '' ?>>Primavera</option>
                    <option value="Mixto" <?= $oferta->getTemporada() === 'Mixto' ? 'selected' : '' ?>>Mixto</option>
                </select>
            </div>

            <!-- Input para el año -->
            <div class="col-md-6">
                <label for="anio" class="form-label fw-bold">Año</label>
                <input type="text" name="anio" id="anio" class="form-control" 
                       value="<?= $oferta->getAnio() ?? '' ?>" 
                       placeholder="Ejemplo: 2024 (deja vacío para 'Sin valor')">
            </div>

            <!-- Input para el descuento -->
            <div class="col-md-6">
                <label for="descuento" class="form-label fw-bold">Descuento (%)</label>
                <input type="number" name="descuento" id="descuento" class="form-control" 
                       value="<?= $oferta->getDescuento() ?>" required>
            </div>

            <!-- Espacio vacío para alinear los campos -->
            <div class="col-md-6"></div>

            <!-- Botón para guardar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>