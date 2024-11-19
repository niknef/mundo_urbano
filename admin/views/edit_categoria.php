<?php
$id = $_GET['id'] ?? false;
$categoria = Categoria::get_x_id($id);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-lg-8 p-4 shadow rounded bg-light">
        <h2 class="text-center mb-4 fw-bold">Editar Categoría</h2>

        <!-- Formulario -->
        <form action="actions/edit_categoria_acc.php?id=<?= $categoria->getId() ?>" method="POST" enctype="multipart/form-data" class="row g-4">
            <!-- Nombre de la Categoría -->
            <div class="col-12">
                <label for="nombre" class="form-label fw-bold">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $categoria->getNombre() ?>" required>
            </div>

            <!-- Imagen de la Categoría -->
            <div class="col-12">
                <label class="form-label fw-bold">Imagen de la Categoría</label>
                <div class="d-flex align-items-center gap-3">
                    <img src="../img/categorias/<?= $categoria->getImg() ?>" alt="Imagen de <?= $categoria->getNombre() ?>" class="img-thumbnail shadow-sm" style="width: 150px; height: auto;">
                    <div>
                        <label for="img" class="form-label">Cargar nueva imagen</label>
                        <input type="file" class="form-control" id="img" name="img">
                        <input type="hidden" id="imagen_org" name="imagen_org" value="<?= $categoria->getImg() ?>">
                    </div>
                </div>
            </div>

            <!-- Banner de la Categoría -->
            <div class="col-12">
                <label class="form-label fw-bold">Banner de la Categoría</label>
                <div class="d-flex align-items-center gap-3">
                    <img src="../img/banner/<?= $categoria->getBanner_img() ?>" alt="Banner de <?= $categoria->getNombre() ?>" class="img-thumbnail shadow-sm" style="width: 150px; height: auto;">
                    <div>
                        <label for="banner_img" class="form-label">Cargar nuevo banner</label>
                        <input type="file" class="form-control" id="banner_img" name="banner_img">
                        <input type="hidden" id="banner_img_org" name="banner_img_org" value="<?= $categoria->getBanner_img() ?>">
                    </div>
                </div>
            </div>

            <!-- Descripción de la Categoría -->
            <div class="col-12">
                <label for="descripcion" class="form-label fw-bold">Descripción de la Categoría</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required><?= $categoria->getDescripcion() ?></textarea>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary px-5">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
