<?PHP
$id = $_GET['id'] ?? FALSE;
$categoria = Categoria::get_x_id($id);
?>

<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Edita una categoria</h2>

        <!-- Formulario -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/edit_categoria_acc.php" method="POST" enctype="multipart/form-data">
            <!-- Nombre de la Categoria -->
            <div class="col-md-6">
                <label for="nombre" class="form-label fw-bold">Nombre de la Categoria</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $categoria->getNombre()?>" required>
            </div>

            <div class="col-md-6">
                    <label for="imagen" class="form-label">Imagen actual</label>
                    <img src="../img/categorias/<?= $categoria->getImg() ?>" alt="Logo de <?= $categoria->getNombre() ?>" class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="imagen_org" name="imagen_org" value="<?= $categoria->getImg() ?>">
            </div>

            <!-- Imagen de la Categoria -->
            <div class="col-md-6">
                <label for="img" class="form-label fw-bold">Reemplaza la Imagen de la Categoria</label>
                <input type="file" class="form-control" id="img" name="img" required>
            </div>

            <div class="col-md-6">
                    <label for="imagen" class="form-label">Banner actual</label>
                    <img src="../img/banner/<?= $categoria->getBanner_img() ?>" alt="Logo de <?= $categoria->getNombre() ?>" class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="banner_img_org" name="banner_img_org" value="<?= $categoria->getBanner_img() ?>">
            </div>

            <!-- Banner de la Categoria -->
            <div class="col-md-6">
                <label for="banner_img" class="form-label fw-bold">Banner de la Categoria</label>
                <input type="file" class="form-control" id="banner_img" name="banner_img" required>
            </div>

            <!-- Descripción de la Categoria -->
            <div class="col-12">
                <label for="descripcion" class="form-label fw-bold">Descripción de la Categoria</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" value="<?$categoria->getDescripcion()?>" required></textarea>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Cargar</button>
            </div>
        </form>
    </div>
</div>
