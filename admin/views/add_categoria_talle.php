<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Agregar una Nueva Categoría de Talles</h2>

        <!-- Formulario -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/add_categoria_talle_acc.php" method="POST">
            <!-- Nombre de la Categoría -->
            <div class="col-md-6">
                <label for="categoria" class="form-label fw-bold">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="categoria" name="categoria_talle" placeholder="Ejemplo: Zapatillas DC Hombre" required>
            </div>

            <!-- Primer Talle -->
            <div class="col-md-6">
                <label for="primer_talle" class="form-label fw-bold">Primer Talle</label>
                <input type="text" class="form-control" id="talle" name="talle" placeholder="Ejemplo: 8, S, L" required>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Cargar</button>
            </div>
        </form>
    </div>
</div>
