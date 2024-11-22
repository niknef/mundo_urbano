<?PHP

require_once "../functions/autoload.php";

// Obtener el ID del producto
$product_id = $_GET['id'] ?? null;

// Validar si el producto existe
if (!$product_id) {
    echo "ID de producto no proporcionado.";
    exit;
}

$product = Producto::buscarProductoPorId($product_id);
if (!$product) {
    echo "Producto no encontrado.";
    exit;
}

// Detectar la categoría de talles seleccionada
$categoriaSeleccionada = $_POST['categoria_talle'] ?? null;

// Si no se selecciona una categoría, usar la primera categoría de los talles asociados al producto
if (!$categoriaSeleccionada && !empty($product->getTalles())) {
    $categoriaSeleccionada = $product->getTalles()[0]['talle']->getCategoria_talle();
}

// Obtener los talles del producto como un array [id_talle => cantidad]
$tallesProducto = [];
foreach ($product->getTalles() as $talleInfo) {
    $tallesProducto[$talleInfo['talle']->getId()] = $talleInfo['cantidad'];
}

// Obtener los talles según la categoría seleccionada
$talles = $categoriaSeleccionada ? Talle::get_all_by_categoria($categoriaSeleccionada) : [];

// Obtener datos generales
$categorias = Categoria::get_all();
$marcas = Marca::get_all();
$colores = Color::get_all();
$categorias_talles = Talle::get_all_categorias();

?>

<div class="row my-5">
<div class="col">
        <h2 class="text-center mb-5 fw-bold">Editar Producto</h2>

        <!-- Filtro de Categoría de Talle -->
        <div class="mb-5 p-4 shadow rounded bg-light">
            <h3 class="fw-bold mb-3">Selecciona una Categoría de Talles</h3>
            <form action="index.php?link=edit_producto&id=<?= $product->getId() ?>" method="POST">
                <div class="row align-items-end">
                    <div class="col-md-8">
                        <label for="categoria_talle" class="form-label fw-bold">Categoría de Talle</label>
                        <select class="form-select" id="categoria_talle" name="categoria_talle">
                            <option value="" disabled <?= !$categoriaSeleccionada ? 'selected' : '' ?>>Selecciona una categoría</option>
                            <?php foreach ($categorias_talles as $categoria): ?>
                                <option value="<?= $categoria['categoria_talle'] ?>" <?= ($categoriaSeleccionada == $categoria['categoria_talle']) ? 'selected' : '' ?>>
                                    <?= $categoria['categoria_talle'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-primary w-100">Aplicar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Formulario Principal -->
         
        
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/edit_producto_acc.php?id=<?= $product->getId() ?>" method="POST" enctype="multipart/form-data">
            <h3 class="fw-bold mb-3">Edita los demas campos del producto</h3>
            

            <!-- Campos Generales -->
            <div class="col-md-6">
                <label for="nombre" class="form-label fw-bold">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $product->getNombre()?>">
            </div>

            <div class="col-md-6">
                <label for="descripcion" class="form-label fw-bold">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="2"><?= $product->getDescripcion() ?></textarea>
            </div>

            <div class="col-md-4">
                <label for="categoria_id" class="form-label fw-bold">Categoría</label>
                <select class="form-select" id="categoria_id" name="categoria_id">
                    <option value="" disabled>Selecciona una categoría</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria->getId() ?>" <?= $categoria->getId() == $product->getCategoria_id() ? 'selected' : '' ?>>
                            <?= $categoria->getNombre() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="marca_id" class="form-label fw-bold">Marca</label>
                <select class="form-select" id="marca_id" name="marca_id">
                    <option value="" disabled>Selecciona una marca</option>
                    <?php foreach ($marcas as $marca): ?>
                        <option value="<?= $marca->getId() ?>" <?= $marca->getId() == $product->getMarca_id() ? 'selected' : '' ?>>
                            <?= $marca->getNombre() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="color_id" class="form-label fw-bold">Color</label>
                <select class="form-select" id="color_id" name="color_id">
                    <option value="" disabled>Selecciona un color</option>
                    <?php foreach ($colores as $color): ?>
                        <option value="<?= $color->getId() ?>" <?= $color->getId() == $product->getColor_id() ? 'selected' : '' ?>>
                            <?= $color->getColor() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="precio" class="form-label fw-bold">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?= $product->getPrecio() ?>">
            </div>

            <div class="col-md-6">
                    <label for="imagen_org" class="form-label fw-bold">Imagen Actual</label>
                    <img src="../img/productos/<?= $product->getImg() ?>" alt="Imagen de <?= $product->getNombre() ?>" class="img-fluid rounded shadow-sm d-block img-admin">
                    <input class="form-control" type="hidden" id="imagen_org" name="imagen_org" value="<?= $product->getImg() ?>">
            </div>

            <!-- Logo de la marca -->
            <div class="col-md-6">
                <label for="img" class="form-label fw-bold">Reemplazar Imagen</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>

            <div class="col-md-6">
                <label for="temporada" class="form-label fw-bold">Temporada</label>
                <select class="form-select" id="temporada" name="temporada">
                    <option value="" disabled>Selecciona una temporada</option>
                    <option value="Verano" <?= $product->getTemporada() == 'Verano' ? 'selected' : '' ?>>Verano</option>
                    <option value="Otoño" <?= $product->getTemporada() == 'Otoño' ? 'selected' : '' ?>>Otoño</option>
                    <option value="Invierno" <?= $product->getTemporada() == 'Invierno' ? 'selected' : '' ?>>Invierno</option>
                    <option value="Primavera" <?= $product->getTemporada() == 'Primavera' ? 'selected' : '' ?>>Primavera</option>
                    <option value="Mixto" <?= $product->getTemporada() == 'Mixto' ? 'selected' : '' ?>>Mixto</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="fecha_ingreso" class="form-label fw-bold">Fecha de Ingreso</label>
                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?= $product->getFecha_ingreso() ?>">
            </div>

            <div class="col-md-6">
                <label for="tipo" class="form-label fw-bold">Tipo de Producto</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $product->getTipo()?>">
            </div>

            <!-- Mostrar los talles y cantidades -->
            <div class="col-12">
                <label class="form-label fw-bold">Talles y Cantidades</label>
                <div class="row">
                    <?php if (!empty($talles)): ?>
                        <?php foreach ($talles as $talle): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <label class="fw-bold mb-0">
                                        <?= $talle->getTalle() ?>
                                    </label>
                                    <input 
                                        type="number" 
                                        class="form-control ms-1" 
                                        name="talles[<?= $talle->getId() ?>]" 
                                        placeholder="Cantidad" 
                                        min="0" 
                                        value="<?= $tallesProducto[$talle->getId()] ?? '' ?>"
                                    >
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Selecciona una categoría de talles.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom-2 px-5">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
