<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-6 col-lg-4">

        
        <h2 class="text-center mb-4 fw-bold">Iniciar Sesión Administador</h2>


        <form class="p-4 shadow rounded bg-light" action="actions/auth_login.php" method="POST">
            
       
            <div class="mb-4">
                <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo">
            </div>

      
            <div class="mb-4">
                <label for="pass" class="form-label fw-bold">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Ingresa tu contraseña">
            </div>

   
            <div class="text-center">
                <button type="submit" class="btn boton-custom px-5">Iniciar Sesión</button>
            </div>
        </form>

    </div>
</div>
