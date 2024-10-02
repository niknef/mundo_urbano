
<section class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center bg-white p-5 rounded shadow">
                <img src="./img/thank_you.svg" alt="Gracias" class="img-fluid mb-4" style="max-width: 150px;">
                <h2 class="display-4">¡Gracias, <?= $nombre . ' ' . $apellido ?>!</h2>
                <p class="lead mt-4">Recibimos tu mensaje: <br> <strong>"<?= $mensaje ?>"</strong></p>
                <p>Nos pondremos en contacto contigo pronto a través de tu correo: <strong><?= $email ?></strong></p>
                <a href="index.php" class="btn btn-info btn-lg mt-3">Volver al Inicio</a>
            </div>
        </div>
    </div>
</section>

