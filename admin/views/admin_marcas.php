<?php
$marcas = Marca::get_all();
?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        
        <h2 class="fw-bold m-0">Administrador de Marcas</h2>

       
        <a href="index.php?link=add_marcas" class="btn btn-primary">Cargar nueva Marca</a>
    </div>
<div class="table-responsive">
    <table class="table table-striped table-hover align-middle table-custom">
        <thead class="table-dark">
            <tr>
                <th scope="col" width="10%">Logo</th>
                <th scope="col" width="15%">Nombre</th>
                <th scope="col" >descripcion</th>
                <th scope="col" >Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marcas as $M): ?>
                <tr>
                    <td>
                        <img src="../img/logos/<?= $M->getImg() ?>" alt="Logo de <?= $M->getNombre() ?>" class="img-thumbnail" style="max-height: 100px;">
                    </td>
                    <td><?= $M->getNombre() ?></td>
                    <td><?= $M->getDescripcion() ?></td>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <a href="index.php?link=edit_marca&id=<?= $M->getId() ?>" class="btn btn-sm btn-info">Editar</a>
                            <a href="index.php?link=delete_marca&id=<?= $M->getId() ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
