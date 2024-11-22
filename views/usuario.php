<div class="row my-5 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="p-4 shadow rounded bg-light">
            <h2 class="text-center mb-4 fw-bold">Información del Usuario</h2>

            <!-- Información del usuario -->
            <div class="mb-4">
                <h3 class="fs-6 text-secondary">Nombre Completo</h3>
                <p class="fs-5 fw-bold text-dark"><?= ucfirst($userData['nombre']) ?> <?= ucfirst($userData['apellido']) ?></p>
            </div>

            <div class="mb-4">
                <h3 class="fs-6 text-secondary">Alias de Usuario</h3>
                <p class="fs-5 text-dark"><?= ucfirst($userData['alias_usuario']) ?></p>
            </div>
            <div class="mb-4">
                <h3 class="fs-6 text-secondary">Correo Electrónico</h3>
                <p class="fs-5 text-dark"><?= $userData['email']?></p>
            </div>

            <div class="mb-4">
                <h3 class="fs-6 text-secondary">Rol</h3>
                <span class="badge bg-primary"><?= ucfirst($userData['rol']) ?></span>
            </div>

            <!-- Botones de acción -->
            <div class="d-flex justify-content-between gap-3 mt-4">
                <a href="index.php?link=editar_usuario&mail=<?= $userData['email'] ?>" class="btn boton-custom-2 px-4">
                    <i class="bi bi-pencil-square me-2"></i>Editar Información
                </a>
                <a href="admin/actions/auth_logout.php" class="btn boton-custom-rojo px-4">
                    <i class="bi bi-door-open-fill me-2"></i>Cerrar Sesión
                </a>
            </div>
        </div>
    </div>
</div>