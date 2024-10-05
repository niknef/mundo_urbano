<?php
// Procesar los datos del formulario
$datos = $_POST;
$nombre = ucfirst($datos['nombre']);
$apellido = ucfirst($datos['apellido']);
$email = $datos['email'];
$mensaje = $datos['mensaje'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Mundo Urbano | Agradecimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<section class="d-flex justify-content-center align-items-center vh-100">
    
<div class="row justify-content-center align-items-center g-5">
        <div class="col-xl-8 col-lg-7 col-md-8 col-12 bg-light p-5 rounded shadow text-center">
            <img src="../img/contact.svg" class="d-block mx-lg-auto img-fluid rounded" alt="Banner de contacto" width="700" height="500" loading="lazy">
            <h1 class="mb-3">Gracias, <?= $nombre . ' ' . $apellido ?>!</h1>
            <h2 class="mb-3">Mail:</h2>
            <p class="lead mb-4"><?= $email ?></p>
            <p class="mb-4">Recibimos tu mensaje:</p>
            <p class="lead mb-4">"<?= $mensaje ?>"</p>
            <a href="../index.php?link=inicio" class="btn btn-info w-50">Volver a Inicio</a>
        </div>
    </div>
</section>

</body>
</html>
