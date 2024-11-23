<?php
require_once "functions/autoload.php";

$carrito = Carrito::get_carrito();
$precioTotal = Carrito::precio_total();
?>

<div class="row my-5">
    <div class="col">
        <h2 class="text-center fw-bold mb-5">Tu Carrito</h2>

        <?php if (!empty($carrito)) : ?>
            <form action="admin/actions/update_carrito_acc.php" method="POST">
                <table class="table table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Talle</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carrito as $key => $item) : ?>
                            <tr class="text-center">
                                <td class="text-start">
                                    <img src="img/productos/<?= $item['imagen'] ?>" alt="<?= $item['nombre'] ?>" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                    <span class="ms-2"><?= $item['nombre'] ?></span>
                                </td>
                                <td>
                                    <?php 
                                    $talle = $item['talle_id'] ? Talle::get_x_id($item['talle_id']) : null;
                                    echo $talle ? $talle->getTalle() : 'Sin especificar'; 
                                    ?>
                                </td>
                                <td>
                                    <input type="number" name="cantidades[<?= $key ?>]" value="<?= $item['cantidad'] ?>" min="1" class="form-control text-center w-50 mx-auto">
                                </td>
                                <td>
                                    $<?= number_format($item['precio'], 2, ',', '.') ?>
                                </td>
                                <td>
                                    $<?= number_format($item['precio'] * $item['cantidad'], 2, ',', '.') ?>
                                </td>
                                <td>
                                <a class="btn btn-sm btn-rojo" href="admin/actions/remove_carrito_acc.php?id=<?= $key?>">
                                    <i class="bi bi-trash-fill"></i> Eliminar
                                </a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center fw-bold">
                            <td colspan="4">Total</td>
                            <td colspan="2">$<?= number_format($precioTotal, 2, ',', '.') ?></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="index.php?link=productos" class="btn boton-custom">
                        <i class="bi bi-plus-circle"></i> Agregar Más Productos
                    </a>
                    <button type="submit" formaction="admin/actions/clear_carrito_acc.php" class="btn btn-rojo">
                        <i class="bi bi-trash"></i> Vaciar Carrito
                    </button>
                    <button type="submit" class="btn boton-custom">
                        <i class="bi bi-arrow-repeat"></i> Actualizar Cantidades
                    </button>
                    <a href="index.php?link=checkout" class="btn boton-custom">
                        <i class="bi bi-bag-check"></i> Finalizar Compra
                    </a>
                </div>
            </form>
        <?php else : ?>
            <div class="alert alert-warning text-center">
                <h3>Tu carrito está vacío</h3>
                <p><a href="index.php?link=productos" class="btn boton-custom mt-3">Explorar Productos</a></p>
            </div>
        <?php endif; ?>
    </div>
</div>