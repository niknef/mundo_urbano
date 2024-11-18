<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Agregar una Nueva Categoria</h2>

        <!-- Formulario -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/add_categoria_acc.php" method="POST" enctype="multipart/form-data">
            <!-- Nombre de la marca -->
            <div class="col-md-6">
                <label for="nombre" class="form-label fw-bold">Nombre de la Categoria</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ejemplo: Rusty" required>
            </div>

            <!-- Imagen de la marca -->
            <div class="col-md-6">
                <label for="img" class="form-label fw-bold">Imagen de la marca</label>
                <input type="file" class="form-control" id="img" name="img" required>
            </div>

            <!-- Banner de la marca -->
            <div class="col-md-6">
                <label for="banner_img" class="form-label fw-bold">Banner de la marca</label>
                <input type="file" class="form-control" id="banner_img" name="banner_img" required>
            </div>

            <!-- Descripción de la marca -->
            <div class="col-12">
                <label for="descripcion" class="form-label fw-bold">Descripción de la categoria</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Escribe una descripción aquí..." required></textarea>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Cargar</button>
            </div>
        </form>
    </div>
</div>
