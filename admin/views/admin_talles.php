<?php
$tallesPorCategoria = Talle::get_all_grouped_by_categoria();
?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold m-0">Administrador de Talles</h2>
        <a href="index.php?link=add_categoria_talle" class="btn boton-custom">Crear nueva Categoría</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle table-custom">
            <thead class="table-dark">
                <tr>
                    <th scope="col" width="5%">Categoría de Talles</th>
                    <th scope="col" width="5%">Talles</th>
                    <th scope="col" width="1%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tallesPorCategoria as $categoria => $talles): ?>
                    <tr>
                        <!-- Categoría -->
                        <td class="fw-bold table-custom"><?= $categoria; ?></td>

                        <!-- Talles -->
                        <td>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($talles as $talle): ?>
                                    <li>
                                        <?= $talle->getTalle(); ?>
                                        <a href="index.php?link=edit_talle&id=<?= $talle->getId(); ?>" class="btn btn-sm btn-info ms-2">Modificar</a>
                                        <a href="index.php?link=delete_talle&id=<?= $talle->getId(); ?>" class="btn btn-sm btn-danger ms-1">Eliminar</a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </td>

                        <!-- Acciones de Categoría -->
                        <td>
                            <div class="d-flex flex-column gap-2">
                                <a href="index.php?link=add_talle_categoria&categoria=<?= $categoria; ?>" class="btn btn-sm btn-warning">Agregar Talle</a>
                                <a href="index.php?link=edit_categoria_talle&categoria=<?= $categoria; ?>" class="btn btn-sm btn-info">Modificar</a>
                                <a href="index.php?link=delete_categoria_talle&categoria=<?= $categoria; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>