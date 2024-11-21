<?php
$inventario = Producto::inventario_completo();
?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold m-0">Administrador de Productos</h2>
        <a href="index.php?link=add_productos" class="btn boton-custom">Cargar nuevo Producto</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle table-custom">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col" >Nombre</th>
                    <th scope="col" >Marca</th>
                    <th scope="col" >Categoría</th>
                    <th scope="col" >Color</th>
                    <th scope="col" >Tipo</th>
                    <th scope="col" >Descripción</th>
                    <th scope="col">Temporada</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col" >Talles y Cantidades</th>
                    <th scope="col" >Stock Total</th>
                    <th scope="col" >Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventario as $P): ?>
                    <?php
                    $tallesDisponibles = $P->getTalles(); // Obtener los talles y cantidades del producto
                    $stockTotal = array_sum(array_column($tallesDisponibles, 'cantidad')); // Calcular el stock total
                    ?>
                    <tr>
                        <td>
                            <img src="../img/productos/<?= $P->getImg() ?>" alt="Imagen de <?= $P->getNombre() ?>" class="img-thumbnail">
                        </td>
                        <td><?= $P->getNombre() ?></td>
                        <td><?= $P->getMarca() ?></td>
                        <td><?= $P->getCategoria() ?></td>
                        <td>
                            <span class="badge-personalizado d-flex align-items-center">
                                <span class="bola" style="background-color: <?= $P->getCodigoColor() ?>;"></span>
                                <?= $P->getColor() ?>
                            </span>
                        </td>
                        <td><?= $P->getTipo() ?></td>
                        <td>
                            <!-- Botón para expandir descripción -->
                            <button class="btn btn-link p-0 text-primary" data-bs-toggle="collapse" data-bs-target="#descripcion-<?= $P->getId() ?>" aria-expanded="false">
                                Ver más
                            </button>
                            <div class="collapse" id="descripcion-<?= $P->getId() ?>">
                                <?= $P->getDescripcion() ?>
                            </div>
                        </td>
                        <td><?= $P->getTemporada() ?></td>
                        <td><?= date("d/m/Y", strtotime($P->getFecha_ingreso())) ?></td>
                        <td>
                            <?php if (!empty($tallesDisponibles)) : ?>
                                <ul class="list-unstyled mb-0">
                                    <?php foreach ($tallesDisponibles as $detalleTalle) : ?>
                                        <li>
                                            <?= $detalleTalle['talle']->getTalle(); ?> -> <?= $detalleTalle['cantidad']; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <span class="text-muted">Sin talles</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $stockTotal > 0 ? $stockTotal : 'Sin stock'; ?></td>
                        <td>
                            <div class="d-flex flex-column gap-1">
                                <a href="index.php?link=edit_producto&id=<?= $P->getId() ?>" class="btn btn-sm btn-info">Editar</a>
                                <a href="index.php?link=delete_producto&id=<?= $P->getId() ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
