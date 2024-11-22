<?PHP
$mail = $_GET['mail'];
$usuario = Usuario::usuario_x_mail($mail);
?>

<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="p-4 shadow rounded bg-light">
            <h2 class="text-center mb-4 fw-bold">Editar Usuario</h2>

            <form id="editarUsuarioForm" action="admin/actions/edit_user_acc.php" method="POST">
                
                <div class="mb-4">
                    <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $usuario->getEmail() ?>" readonly>
                </div>

                <!-- Nombre y Apellido -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario->getNombre() ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label fw-bold">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $usuario->getApellido() ?>" required>
                    </div>
                </div>

                <!-- Alias de Usuario -->
                <div class="mb-4">
                    <label for="alias_usuario" class="form-label fw-bold">Alias de Usuario</label>
                    <input type="text" class="form-control" id="alias_usuario" name="alias_usuario" value="<?= $usuario->getAlias_usuario() ?>" required>
                </div>

                <!-- Botón de Guardar -->
                <div class="text-center">
                    <button type="submit" class="btn boton-custom px-5">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
