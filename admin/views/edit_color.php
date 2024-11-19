<?PHP
$id = $_GET['id'] ?? FALSE;
$color = Color::get_x_id($id);
?>

<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Editar el color</h2>

        <!-- Formulario -->
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/edit_color_acc.php?id=<?= $color->getId() ?>" method="POST">
            <!-- Nombre del Color -->
            <div class="col-md-6">
                <label for="color" class="form-label fw-bold">Nombre del Color</label>
                <input type="text" class="form-control" id="color" name="color" value="<?= $color->getColor()?>">
            </div>

            <!-- Código Hexadecimal -->
            <div class="col-md-6">
                <label for="codigo" class="form-label fw-bold">Código Hexadecimal (Incluye #)</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?= $color->getCodigo()?>" pattern="^#([A-Fa-f0-9]{6})$" title="Debe ser un código hexadecimal válido, por ejemplo: #FF5733">
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom px-5">Cargar</button>
            </div>
        </form>
    </div>
</div>
