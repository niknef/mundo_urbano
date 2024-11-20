<section>
    <h2 id="carousel-heading" class="visually-hidden">Destacados del sitio</h2>
    <div id="myCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php 
            $totalCategorias = count($categorias); // Suponiendo que $categorias es tu array con las categorías
            foreach ($categorias as $index => $categoria): ?>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?= $index ?>" class="<?= $index == 0 ? 'active' : '' ?>" aria-current="true" aria-label="Slide <?= $index + 1 ?>"></button>
            <?php endforeach; ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($categorias as $index => $categoria): ?>
                <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                <picture>
                    <source media="(min-width: 1200px)" srcset="img/banner/desktop/<?= $categoria->getBanner_img() ?>">
                    <source media="(min-width: 768px)" srcset="img/banner/tablet/<?= $categoria->getBanner_img() ?>">
                    <source media="(max-width: 767px)" srcset="img/banner/<?= $categoria->getBanner_img() ?>">
                    <img src="img/banner/desktop/<?= $categoria->getBanner_img() ?>" alt="Banner <?= $categoria->getNombre() ?>" class="d-block w-100 h-100 fit-cover">
                </picture>
                    <div class="carousel-overlay">
                        <div class="container">
                            <div class="carousel-caption <?= $index % 2 == 0 ? 'text-start' : 'text-end' ?>">
                                <h3 class="fs-1 fw-bold"><?= $categoria->getNombre() ?></h3>
                                <p class="fs-5 fw-light"><?= $categoria->getDescripcion() ?></p>
                                <p><a class="btn boton-outline-custom" href="index.php?link=productos&categoria=<?= $categoria->getId() ?>">Ver productos</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section>
    <h2 id="carousel-heading" class="visually-hidden">Descubre Nuestras Categorías de Productos</h2>
    <div class="container custom-card rounded-1">
        <div class="row g-2">
            <?php 
                $categoriasLimitadas = array_slice($categorias, 0, 4); // Limito a las primeras 4 categorías por si agrego mas no rompo la estetica
                foreach ($categoriasLimitadas as $categoria): ?>
                    <div class="col-12 col-md-3">
                        <a href="index.php?link=productos&categoria=<?= $categoria->getId() ?>" class="text-decoration-none">
                            <div class="card text-bg-dark position-relative">
                                <picture>
                                    <source media="(min-width: 768px)" srcset="img/categorias/desktop/<?= $categoria->getImg() ?>">
                                    <source media="(max-width: 767px)" srcset="img/categorias/<?= $categoria->getImg() ?>" type="image/jpg">
                                    <img src="img/categorias/<?= $categoria->getImg() ?>" alt="Banner Categoria <?= $categoria->getNombre() ?>" class="card-img fit-cover">
                                </picture>
                                <div class="overlay position-absolute w-100 h-100 rounded-1 over-opacity"></div>
                                <div class="card-img-overlay d-flex align-items-center justify-content-center">
                                    <h3 class="card-title text-center"><?= $categoria->getNombre() ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<section>
    <?PHP
    require_once "views/oferta_corto.php";
    ?>
</section>
