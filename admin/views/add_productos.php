<?php

require_once "../functions/autoload.php";

// Proceso los datos enviados para lso talles
$categoriaSeleccionada = $_POST['categoria_talle'] ?? null;
$talles = $categoriaSeleccionada ? Talle::get_all_by_categoria($categoriaSeleccionada) : [];

$categorias = Categoria::get_all();
$marcas = Marca::get_all();
$colores = Color::get_all();
$categorias_talles = Talle::get_all_categorias();

?>

<div class="row my-5">
    <div class="col">
        <h2 class="text-center mb-5 fw-bold">Agregar un Nuevo Producto</h2>

        <!-- Filtro de Categoría de Talle -->
        <div class="mb-5 p-4 shadow rounded bg-light">
            <h3 class="fw-bold mb-3">Selecciona una Categoría de Talles</h3>
            <form action="index.php?link=add_productos" method="POST">
                <div class="row align-items-end">
                    <div class="col-md-8">
                        <label for="categoria_talle" class="form-label fw-bold">Categoría de Talle</label>
                        <select class="form-select" id="categoria_talle" name="categoria_talle" required>
                            <option value="" disabled selected>Selecciona una categoría</option>
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
        <form class="row g-4 p-4 shadow rounded bg-light" action="actions/add_producto_acc.php" method="POST" enctype="multipart/form-data">
            
            <!-- Campos Generales -->
            <div class="col-md-6">
                <label for="nombre" class="form-label fw-bold">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Zapatillas Rusty Yonker" required>
            </div>

            <div class="col-md-6">
                <label for="descripcion" class="form-label fw-bold">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="2" required></textarea>
            </div>

            <div class="col-md-4">
                <label for="categoria_id" class="form-label fw-bold">Categoría</label>
                <select class="form-select" id="categoria_id" name="categoria_id" required>
                    <option value="" disabled selected>Selecciona una categoría</option>
                    <?php foreach ($categorias as $C): ?>
                        <option value="<?= $C->getId() ?>">
                            <?= $C->getNombre() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="marca_id" class="form-label fw-bold">Marca</label>
                <select class="form-select" id="marca_id" name="marca_id" required>
                    <option value="" disabled selected>Selecciona una marca</option>
                    <?php foreach ($marcas as $marca): ?>
                        <option value="<?= $marca->getId() ?>">
                            <?= $marca->getNombre() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="color_id" class="form-label fw-bold">Color</label>
                <select class="form-select" id="color_id" name="color_id" required>
                    <option value="" disabled selected>Selecciona un color</option>
                    <?php foreach ($colores as $color): ?>
                        <option value="<?= $color->getId() ?>">
                            <?= $color->getColor() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="precio" class="form-label fw-bold">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>

            <div class="col-md-6">
                <label for="img" class="form-label fw-bold">Imagen Principal</label>
                <input type="file" class="form-control" id="img" name="img" required>
            </div>

            <div class="col-md-6">
                <label for="temporada" class="form-label fw-bold">Temporada</label>
                <select class="form-select" id="temporada" name="temporada" required>
                    <option value="" disabled selected>Selecciona una temporada</option>
                    <option value="Verano">Verano</option>
                    <option value="Otoño">Otoño</option>
                    <option value="Invierno" >Invierno</option>
                    <option value="Primavera" >Primavera</option>
                    <option value="Mixto">Mixto</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="fecha_ingreso" class="form-label fw-bold">Fecha de Ingreso</label>
                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="col-md-6">
                <label for="tipo" class="form-label fw-bold">Tipo de Producto</label>
                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ejemplo: Zapatillas Urbanas" required>
            </div>

            <?php if (!empty($talles)): ?>
                <div class="col-12">
                    <label for="talles" class="form-label fw-bold">Selecciona Talles y Cantidades</label>
                    <div class="row">
                        <?php foreach ($talles as $talle): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-around mb-3">
                                    <!-- Nombre del talle -->
                                    <label for="talle-<?= $talle->getId() ?>" class="fw-bold mb-0">
                                        <?= $talle->getTalle() ?>
                                    </label>

                                    <!-- Campo para cantidad -->
                                    <input type="number" class="form-control cantidad ms-1" id="talle-<?= $talle->getId() ?>" name="talles[<?= $talle->getId() ?>]" placeholder="Cantidad" min="0">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>


            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn boton-custom-2 px-5">Cargar Producto</button>
            </div>
        </form>
    </div>
</div>
