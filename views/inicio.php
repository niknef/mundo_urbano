<header>
    <div id="myCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- Zapatillas Slide -->
            <div class="carousel-item active">
                <img src="img/banner/banner-zapas-dc.jpg" alt="Banner Dc Zapatillas" class="bd-placeholder-img" height="100%" width="100%" >
                <div class="carousel-overlay">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Zapatillas</h1>
                            <p class="fs-5 fw-light">Encuentra las mejores zapatillas para todas tus necesidades.</p>
                            <p ><a class="btn btn-outline-info" href="index.php?link=productos&categoria=zapatillas">Ver productos</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hombre Slide -->
            <div class="carousel-item">
                <img src="img/banner/banner-hombre-dc.jpg" alt="Banner Dc Zapatillas" class="bd-placeholder-img" height="100%" width="100%">
                <div class="carousel-overlay">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Hombre</h1>
                            <p class="fs-5 fw-light">Descubre nuestra colección para hombre, desde ropa hasta accesorios.</p>
                            <p><a class="btn btn-outline-info" href="index.php?link=productos&categoria=hombre">Ver productos</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mujer Slide -->
            <div class="carousel-item">
                <img src="img/banner/banner-rusty-mujer.jpg" alt="Banner Dc Zapatillas" class="bd-placeholder-img" height="100%" width="100%">
                <div class="carousel-overlay">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Mujer</h1>
                            <p class="fs-5 fw-light">Explora nuestra selección de productos para mujer, con estilos para todas.</p>
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
</header>

<section>
    <div class="container custom-card rounded-1">
        <div class="row g-2">
            
            <div class="col-12 col-md-3">
                <a href="index.php?link=productos&categoria=zapatillas" class="text-decoration-none">
                    <div class="card text-bg-dark position-relative">
                        <img src="./img/banner/zapatillas-banner-cat.jpg" class="card-img" alt="Banner Categoria Zapatillas" style="object-fit: cover;">
                        <div class="overlay position-absolute w-100 h-100 rounded-1" style="background-color: rgba(0, 0, 0, 0.2);"></div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h2 class="card-title text-center">Zapatillas</h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="index.php?link=productos&categoria=hombre" class="text-decoration-none">
                    <div class="card text-bg-dark position-relative">
                        <img src="./img/banner/hombre-banner-cat.jpg" class="card-img" alt="Baner Categoria Hombre" style="object-fit: cover;">
                        <div class="overlay position-absolute w-100 h-100 rounded-1" style="background-color: rgba(0, 0, 0, 0.2);"></div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h2 class="card-title text-center">Hombre</h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="index.php?link=productos&categoria=mujer" class="text-decoration-none">
                    <div class="card text-bg-dark position-relative">
                        <img src="./img/banner/mujer-banner-cat.jpg" class="card-img" alt="Baner Categoria Mujer" style="object-fit: cover;">
                        <div class="overlay position-absolute w-100 h-100 rounded-1" style="background-color: rgba(0, 0, 0, 0.2);"></div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h2 class="card-title text-center">Mujer</h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="index.php?link=productos&categoria=accesorios" class="text-decoration-none">
                    <div class="card text-bg-dark position-relative">
                        <img src="./img/banner/accesorios-banner-cat.jpg" class="card-img" alt="Baner Categoria Accesorios" style="object-fit: cover;">
                        <div class="overlay position-absolute w-100 h-100 rounded-1" style="background-color: rgba(0, 0, 0, 0.2);"></div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h2 class="card-title text-center">Accesorios</h2>
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
