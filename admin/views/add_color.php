<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Agregar un Nuevo Color</h2>

        <!-- Formulario -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/add_color_acc.php" method="POST">
            <!-- Nombre del Color -->
            <div class="col-md-6">
                <label for="color" class="form-label fw-bold">Nombre del Color</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Ejemplo: Negro" required>
            </div>

            <!-- Código Hexadecimal -->
            <div class="col-md-6">
                <label for="codigo" class="form-label fw-bold">Código Hexadecimal (Incluye #)</label>
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="#000000" required pattern="^#([A-Fa-f0-9]{6})$" title="Debe ser un código hexadecimal válido, por ejemplo: #FF5733">
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Cargar</button>
            </div>
        </form>
    </div>
</div>
