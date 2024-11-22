<?php
require_once "../functions/autoload.php";

$vista = Vista::validar_vista($_GET['link'] ?? 'dashboard');
Autenticacion::verify($vista->getRestringida());
$userData = $_SESSION['loggedIn'] ?? FALSE;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>ADM Mundo Urbano | <?= ucfirst($vista->getTitulo()) ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Estilos CSS -->
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>

<header>
    <div class="bg-gris text-dark py-2 px-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <?php if ($userData) { ?>
                    <span>Bienvenido, <?= ucfirst($userData['nombre']) ?? 'Usuario' ?> </span>
                <?php } else { ?>
                    <span>Bienvenido a Mundo Urbano</span>
                <?php } ?>
            </div>
            <div>
                <?php if ($userData) { ?>
                
                    <a href="actions/auth_logout.php" class="btn btn-rojo btn-sm">
                        <i class="bi bi-door-open"></i> Cerrar Sesión
                    </a>
                <?php } else { ?>
                    <a href="index.php?link=login" class="btn btn-iniciar btn-sm">
                        <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?link=dashboard">
                <img src="../img/logo.svg" alt="logo Mundo Urbano">
                <h1 class="visually-hidden">Mundo Urbano | <?= ucfirst($vista->getTitulo()) ?></h1>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=admin_productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=admin_categorias">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=admin_marcas">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=admin_colores">Colores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=admin_talles">Talles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=edit_oferta">Oferta</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container my-4">
    
        <?php
        // Incluimos la vista correspondiente
        require_once "views/{$vista->getNombre()}.php"
        ?>
    
</main>

<footer class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 px-3 my-4 border-top bg-dark rounded">
        <p class="col-md-4 mb-0 text-white-50">&copy; 2024 Mundo Urbano</p>
        <a href="index.php?link=inicio" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none navbar-brand">
            <img src="../img/logo.svg" alt="Logo Mundo Urbano">
        </a>
        <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=admin_productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=admin_categorias">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=admin_marcas">Marcas</a>
                    </li>
                    
        </ul>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
