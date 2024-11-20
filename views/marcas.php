<?php
$marcas = Marca::get_all();
?>
<section>
    <h2 id="carousel-heading" class="visually-hidden">Descubre Nuestras Marcas</h2>
    <div class="container custom-card rounded-1">
        <div class="row g-3">
            <?php foreach ($marcas as $m): ?>
                <div class="col-12">
                    <a href="index.php?link=productos&marca=<?= $m->getId() ?>" class="text-decoration-none d-flex align-items-center brand-card">
                        <!-- Logo de la marca -->
                        <div class="brand-logo">
                            <img src="img/logos/<?= $m->getImg() ?>" alt="Logo de la marca <?= $m->getNombre() ?>" class="img-fluid rounded-2">
                        </div>
                        
                        <!-- Detalles de la marca -->
                        <div class="brand-details ms-3 d-none d-md-block">
                            <h3 class="fs-4 text-dark"><?= $m->getNombre() ?></h3>
                            <p class="text-muted mb-0"><?= $m->getDescripcion() ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>