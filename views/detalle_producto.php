<?PHP 
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $producto = Producto::buscarProductoPorId($id);
?>
<section>
 <div class="container mt-5">
    <div class="row">
        <?PHP if (!empty($producto)) { ?>
            <div class="col-md-6">
            <img src="img/productos/<?= $producto->getImg() ?>" alt="<?= $producto->getNombre() ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2><?= $producto->getNombre() ?></h2>
            <h2 class="fw-light mb-3"><?= $producto->getMarca() ?></h2>
            <p><strong>Tipo: </strong><?= $producto->getTipo() ?></p>
            <div class="d-flex align-items-center gap-3">
                <p class="mb-0"><strong>Color: </strong></p>
                <span class="badge-personalizado d-flex align-items-center">
                    <span class="bola" style="background-color: <?= $producto->getCodigoColor() ?>;"></span>
                    <?= $producto->getColor() ?>
                </span>
            </div>
            <p class="mt-2"><?= $producto->getDescripcion() ?></p>
            
            <p><strong>Talles disponibles:</strong></p>
                <?php
                $tallesDisponibles = array_filter($producto->getTalles(), function ($detalleTalle) {
                    return $detalleTalle['cantidad'] > 0; // Filtrar talles con cantidad mayor a 0
                });

                $totalStock = array_sum(array_column($producto->getTalles(), 'cantidad')); // Calculo el stock total
                ?>

                <?php if (!empty($tallesDisponibles)) : ?>
                    <select class="form-select mt-1 talle-ancho">
                        <?php foreach ($tallesDisponibles as $detalleTalle) : ?>
                            <option value="<?= $detalleTalle['talle']->getTalle(); ?>">
                                <?= $detalleTalle['talle']->getTalle(); ?> (Stock: <?= $detalleTalle['cantidad']; ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php else : ?>
                    <p class="text-muted">No hay talles disponibles.</p>
                <?php endif; ?>

                <p class="mt-2"><strong>Stock total:</strong> <?= $totalStock > 0 ? $totalStock : 'Sin stock'; ?></p>
            
            <h3>
                <?= $producto->obtenerPrecioConDescuento($temporada, $anio, $descuento); ?>
            </h3>
            <button class="btn boton-custom btn-lg mt-2 w-50 text-white fw-semibold boton-comprar">Comprar</button>
        </div>

        <?PHP } else {?>
            <div class="alert alert-danger text-center">
                <h2> No se encontró el producto solicitado. </h2>
                <img src="img/sad-svg.svg" alt="No se encontró el producto" class="img-fluid" style="max-width: 400px;">
            </div>
        <?PHP }; ?>
        
    </div>
</div>

</section>
<section>
    <?PHP
    require_once "views/oferta_corto.php";
    ?>
</section>