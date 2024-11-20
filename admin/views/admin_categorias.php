<?php
$categorias = Categoria::get_all();
?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        
        <h2 class="fw-bold m-0">Administrador de Categorias</h2>

       
        <a href="index.php?link=add_categorias" class="btn boton-custom">Cargar nueva Categoria</a>
    </div>
<div class="table-responsive">
    <table class="table table-striped table-hover align-middle table-custom">
        <thead class="table-dark">
            <tr>
                <th scope="col" width="10%">Imagen</th>
                <th scope="col" width="10%">Banner</th>
                <th scope="col" width="15%">Nombre</th>
                <th scope="col" >Descripcion</th>
                <th scope="col" >Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $C): ?>
                <tr>
                    <td>
                        <img src="../img/categorias/<?= $C->getImg() ?>" alt="Imagen de <?= $C->getNombre() ?>" class="img-thumbnail">
                    </td>
                    <td>
                        <img src="../img/banner/desktop/<?= $C->getBanner_img() ?>" alt="Imagen de <?= $C->getNombre() ?>" class="img-thumbnail">
                    </td>
                    <td><?= $C->getNombre() ?></td>
                    <td><?= $C->getDescripcion() ?></td>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <a href="index.php?link=edit_categoria&id=<?= $C->getId() ?>" class="btn btn-sm btn-info">Editar</a>
                            <a href="index.php?link=delete_categoria&id=<?= $C->getId() ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
