<section class="d-flex justify-content-center align-items-center my-5">
<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="./img/contact.svg" class="d-block mx-lg-auto img-fluid rounded" alt="Banner de contacto" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6 col-md-8 col-12 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4">Contáctanos</h1>
        <form action="php/procesar_datos.php" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                <label for="nombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>
                <label for="apellido">Apellido</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
                <label for="email">Correo Electrónico</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Ingrese su mensaje" style="height: 150px" required></textarea>
                <label for="mensaje">Mensaje</label>
            </div>
            <button type="submit" class="btn btn-info w-100">Enviar</button>
        </form>
    </div>
</div>
    
</section>
