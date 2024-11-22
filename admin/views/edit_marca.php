<?PHP
$id = $_GET['id'] ?? FALSE;
$marca = Marca::get_x_id($id);
?>

<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Edita la Marca</h2>

        <!-- Formulario -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/edit_marca_acc.php?id=<?= $marca->getId() ?>" method="POST" enctype="multipart/form-data">

            <!-- Nombre de la marca -->
            <div class="col-md-6">
                <label for="nombre" class="form-label fw-bold">Nombre de la marca</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $marca->getNombre()?>" >
            </div>

            <div class="col-md-6">
                    <label for="imagen" class="form-label">Logo actual</label>
                    <img src="../img/logos/<?= $marca->getImg() ?>" alt="Logo de <?= $marca->getNombre() ?>" class="img-fluid rounded shadow-sm d-block img-admin">
                    <input class="form-control" type="hidden" id="imagen_org" name="imagen_org" value="<?= $marca->getImg() ?>">
            </div>

            <!-- Logo de la marca -->
            <div class="col-md-6">
                <label for="img" class="form-label fw-bold">Reemplazar el logo</label>
                <input type="file" class="form-control" id="img" name="img" >
            </div>

            <!-- Descripción de la marca -->
            <div class="col-12">
                <label for="descripcion" class="form-label fw-bold">Descripción de la marca</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" value="<?= $marca->getDescripcion() ?>" ><?= $marca->getDescripcion() ?></textarea>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Cargar</button>
            </div>
        </form>
    </div>
</div>
