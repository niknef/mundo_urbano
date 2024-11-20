<?php
$inventario = Producto::inventario_completo();
?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        
        <h2 class="fw-bold m-0">Administrador de Productos</h2>

       
        <a href="index.php?link=add_producto" class="btn boton-custom">Cargar nuevo Producto</a>
    </div>
<div class="table-responsive">
    <table class="table table-striped table-hover align-middle table-custom">
        <thead class="table-dark">
            <tr>
                <th scope="col" width="10%">Imagen</th>
                <th scope="col" width="15%">Nombre</th>
                <th scope="col" width="10%">Marca</th>
                <th scope="col" width="10%">Categoría</th>
                <th scope="col" width="10%">Color</th>
                <th scope="col" width="10%">Tipo</th>
                <th scope="col" width="20%">Descripción</th>
                <th scope="col" width="10%">Temporada</th>
                <th scope="col" width="15%">Fecha de ingreso</th>
                <th scope="col" width="10%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventario as $P): ?>
                <tr>
                    <td>
                        <img src="../img/productos/<?= $P->getImg() ?>" alt="Imagen de <?= $P->getNombre() ?>" class="img-thumbnail">
                    </td>
                    <td><?= $P->getNombre() ?></td>
                    <td><?= $P->getMarca() ?></td>
                    <td><?= $P->getCategoria() ?></td>
                    <td><span class="badge-personalizado d-flex align-items-center"><span class="bola" style="background-color: <?= $P->getCodigoColor() ?>;"></span><?= $P->getColor() ?></span></td>
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
