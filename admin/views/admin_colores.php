<?php
$colores = Color::get_all();
?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        
        <h2 class="fw-bold m-0">Administrador de Colores</h2>

       
        <a href="index.php?link=add_color" class="btn btn-primary">Cargar nuevo Color</a>
    </div>
<div class="table-responsive">
    <table class="table table-striped table-hover align-middle table-custom">
        <thead class="table-dark">
            <tr>
                <th scope="col" width="10%">Color</th>
                <th scope="col" width="10%">Nombre</th>
                <th scope="col" width="15%">Codigo</th>
                <th scope="col" width="5%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colores as $C): ?>
                <tr>
                    <td><div style="width: 50px; border-radius: 100%; height: 50px; background-color: <?= $C->getCodigo() ?>"></div></td>
                    <td><?= $C->getColor() ?></td>
                    <td><?= $C->getCodigo() ?></td>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <a href="index.php?link=edit_color&id=<?= $C->getId() ?>" class="btn btn-sm btn-info">Editar</a>
                            <a href="index.php?link=delete_color&id=<?= $C->getId() ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
