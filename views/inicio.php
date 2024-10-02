
<section>
    <h2 id="carousel-heading" class="visually-hidden">Destacados del sitio</h2>
    <div id="myCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- Zapatillas Slide -->
            <div class="carousel-item active">
                <picture>
                    <source media="(min-width: 1200px)" srcset="img/banner/desktop/banner-zapas-dc.jpg">
                    <source media="(min-width: 768px)" srcset="img/banner/tablet/banner-zapas-dc.jpg">
                    <source media="(max-width: 767px)" srcset="img/banner/banner-zapas-dc.jpg">
                    <img src="img/banner/banner-zapas-dc.jpg" alt="Banner Dc Zapatillas" class="d-block w-100 h-100 fit-cover">
                </picture>
                <div class="carousel-overlay">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h3 class="fs-1 fw-bold">Zapatillas</h3> 
                            <p class="fs-5 fw-light">Encuentra <strong>las mejores zapatillas</strong> para todas tus necesidades.</p>
                            <p><a class="btn btn-outline-info" href="index.php?link=productos&categoria=zapatillas">Ver productos</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hombre Slide -->
            <div class="carousel-item">
                <picture>
                    <source media="(min-width: 1200px)" srcset="img/banner/desktop/banner-hombre-dc.jpg">
                    <source media="(min-width: 768px)" srcset="img/banner/tablet/banner-hombre-dc.jpg">
                    <source media="(max-width: 767px)" srcset="img/banner/banner-hombre-dc.jpg" type="image/jpg">
                    <img src="img/banner/banner-hombre-dc.jpg" alt="Banner Dc Hombre" class="d-block h-100 w-100 fit-cover">
                </picture>
                <div class="carousel-overlay">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3 class="fs-1 fw-bold">Hombre</h3> 
                            <p class="fs-5 fw-light">Descubre nuestra colección para hombre, desde <strong>ropa hasta accesorios</strong>.</p>
                            <p><a class="btn btn-outline-info" href="index.php?link=productos&categoria=hombre">Ver productos</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mujer Slide -->
            <div class="carousel-item">
                <picture>
                    <source media="(min-width: 1200px)" srcset="img/banner/desktop/banner-rusty-mujer.jpg">
                    <source media="(min-width: 768px)" srcset="img/banner/tablet/banner-rusty-mujer.jpg">
                    <source media="(max-width: 767px)" srcset="img/banner/banner-rusty-mujer.jpg">
                    <img src="img/banner/banner-mujer.jpg" alt="Banner Dc Mujer" class="d-block h-100 w-100 fit-cover">
                </picture>
                <div class="carousel-overlay">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h3 class="fs-1 fw-bold">Mujer</h3> 
                            <p class="fs-5 fw-light">Explora nuestra selección de productos para <strong>mujer</strong>, con estilos para todas.</p>
                            <p><a class="btn btn-outline-info" href="index.php?link=productos&categoria=mujer">Ver productos</a></p>
                        </div>
                    </div>
                </div>
            </div>
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
            
            <div class="col-12 col-md-3">
                <a href="index.php?link=productos&categoria=zapatillas" class="text-decoration-none">
                    <div class="card text-bg-dark position-relative">

                    <picture>
                        <source media="(min-width: 768px)" srcset="./img/categorias/desktop/zapatillas-banner-cat.jpg">
                        <source media="(max-width: 767px)" srcset="./img/categorias/zapatillas-banner-cat.jpg" type="image/jpg">
                        <img src="./img/categorias/zapatillas-banner-cat.jpg" alt="Banner Categoria Zapatillas" class="card-img fit-cover">
                    </picture>
                            
                        <div class="overlay position-absolute w-100 h-100 rounded-1 over-opacity" ></div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h3 class="card-title text-center">Zapatillas</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="index.php?link=productos&categoria=hombre" class="text-decoration-none">
                    <div class="card text-bg-dark position-relative">
                    <picture>
                        <source media="(min-width: 768px)" srcset="./img/categorias/desktop/hombre-banner-cat.jpg">
                        <source media="(max-width: 767px)" srcset="./img/categorias/hombre-banner-cat.jpg" type="image/jpg">
                        <img src="./img/categorias/hombre-banner-cat.jpg" alt="Baner Categoria Hombre" class="card-img fit-cover">
                    </picture>
                        
                        <div class="overlay position-absolute w-100 h-100 rounded-1 over-opacity"></div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h3 class="card-title text-center">Hombre</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="index.php?link=productos&categoria=mujer" class="text-decoration-none">
                    <div class="card text-bg-dark position-relative">
                    <picture>
                        <source media="(min-width: 768px)" srcset="./img/categorias/desktop/mujer-banner-cat.jpg">
                        <source media="(max-width: 767px)" srcset="./img/categorias/mujer-banner-cat.jpg" type="image/jpg">
                        <img src="./img/categorias/mujer-banner-cat.jpg" alt="Banner Categoria Mujer" class="card-img fit-cover">
                    </picture>
                        
                        <div class="overlay position-absolute w-100 h-100 rounded-1 over-opacity" ></div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h3 class="card-title text-center">Mujer</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="index.php?link=productos&categoria=accesorios" class="text-decoration-none">
                    <div class="card text-bg-dark position-relative">

                    <picture>
                        <source media="(min-width: 768px)" srcset="./img/categorias/desktop/accesorios-banner-cat.jpg">
                        <source media="(max-width: 767px)" srcset="./img/categorias/accesorios-banner-cat.jpg" type="image/jpg">
                        <img src="./img/categorias/accesorios-banner-cat.jpg" alt="Banner Categoria accesorios" class="card-img fit-cover">
                    </picture>
                    
                        <div class="overlay position-absolute w-100 h-100 rounded-1 over-opacity"></div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h3 class="card-title text-center">Accesorios</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section>
    <?PHP
    require_once "views/oferta_corto.php";
    ?>
</section>
