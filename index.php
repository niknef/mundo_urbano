<?php
//Traemos el array de productos
require_once 'includes/productos.php';

//Obtenemos la categoría seleccionada por url
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : FALSE;

//Array con los links válidos
$links_validos = [
    '404' => [
        'title' => '404 - Página no encontrada',
    ],
    'inicio' => [
        'title' => 'Tienda Online de Indumentaria y Calzado',
    ],
    'todos_productos' => [
        'title' => 'Todos los Productos',
    ],
    'nosotros' => [
        'title' => 'Nosotros',
    ],
    'productos' => [
        'title' => $categoriaSeleccionada,
    ],
    'detalle_producto' => [
        'title' => 'Detalle del Producto',
    ]
];

//Obtenemos el link solicitado por url
$link = isset($_GET['link']) ? $_GET['link'] : 'inicio';


// Verificamos si la sección solicitada es válida
if (!array_key_exists($link, $links_validos)) {
    //si no es valida lo mandamos al 404
    $vista = '404';
} else {
    //si es valida la asignamos a la variable vista
    $vista = $link;
}

//Si se selecciona una categoría
if ($categoriaSeleccionada) {
    //Verificamos si la categoría seleccionada existe en el array de productos
    if (array_key_exists($categoriaSeleccionada, $productos)) {
        //Si existe, asignamos el array de productos de esa categoría a la variable catalogo
        $catalogo = $productos[$categoriaSeleccionada];
        // Cambiamos la vista a 'productos' si se selecciona una categoría
        $vista = 'productos'; 
    } else {
        // Si la categoría no existe, asigna un array vacío
        $catalogo = []; 
    }
} else {
    //Si no se selecciona una categoría, mostramos todos los productos
    $catalogo = [];
    // Unimos todos los productos en un solo array
    foreach ($productos as $subCatalogo) {
        $catalogo = array_merge($catalogo, $subCatalogo);
    }
};

// Obtén el ID del producto si está presente en la URL
$idProducto = isset($_GET['id']) ? $_GET['id'] : FALSE;

// Verifica si el ID está presente y si es un producto válido
if ($idProducto && array_key_exists($idProducto, $catalogo)) {
    // Si el ID es válido, cambiamos la vista a 'detalle_producto'
    $vista = 'detalle_producto';
} else if ($idProducto) {
    // Si el ID no es válido, cambiamos la vista a '404'
    $vista = '404';
};
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <title>Mundo Urbano | <?= ucfirst($links_validos[$vista]['title']) ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Estilos CSS -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./img/logo.svg" alt="logo Mundo Urbano">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?link=inicio">Inicio</a>
                </li>
                <li class="nav-item custom-dropdown">
                    <a class="nav-link" href="index.php?link=todos_productos">Productos</a>
                    <div class="custom-dropdown-content px-2">
                        <a href="index.php?link=todos_productos&categoria=zapatillas">Zapatillas</a>
                        <a href="index.php?link=todos_productos&categoria=hombre">Hombre</a>
                        <a href="index.php?link=todos_productos&categoria=mujer">Mujer</a>
                        <a href="index.php?link=todos_productos&categoria=accesorios">Accesorios</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?link=nosotros">Nosotros</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <?php
    //Incluimos la vista correspondiente
    require_once "views/$vista.php";
    ?>
</main>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 px-3 my-4 border-top bg-dark rounded">
        <p class="col-md-4 mb-0 text-white-50">&copy; 2024 Mundo Urbano</p>
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none navbar-brand">
            <img src="./img/logo.svg" alt="Logo Mundo Urbano">
        </a>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown custom-dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Productos
                </a>
                <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="index.php?link=todos_productos&categoria=zapatillas">Zapatillas</a></li>
                    <li><a class="dropdown-item" href="index.php?link=todos_productos&categoria=hombre">Hombre</a></li>
                    <li><a class="dropdown-item" href="index.php?link=todos_productos&categoria=mujer">Mujer</a></li>
                    <li><a class="dropdown-item" href="index.php?link=todos_productos&categoria=accesorios">Accesorios</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?link=nosotros">Nosotros</a>
            </li>
        </ul>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>