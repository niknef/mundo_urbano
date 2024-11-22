<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="p-4 shadow rounded bg-light">
            <h2 class="text-center mb-4 fw-bold">Registrar Nuevo Usuario</h2>

            <form action="admin/actions/add_user_acc.php" method="POST">
                <!-- Nombre y Apellido -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label fw-bold">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo" required>
                </div>

                <!-- Alias de Usuario -->
                <div class="mb-4">
                    <label for="alias_usuario" class="form-label fw-bold">Alias de Usuario</label>
                    <input type="text" class="form-control" id="alias_usuario" name="alias_usuario" placeholder="Crea tu alias" required>
                </div>

                <!-- Contraseña -->
                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Crea tu contraseña" required>
                </div>


                <!-- Campo oculto para el rol -->
                <input type="hidden" name="rol" value="usuario">

                <!-- Botón de registro -->
                <div class="text-center">
                    <button type="submit" class="btn boton-custom px-5">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

