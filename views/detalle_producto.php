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
            <p><strong>Tipo:</strong><?= $producto->getTipo() ?></p>
            <p><strong>Color:</strong><?= $producto->getColor() ?></p>
            <p><?= $producto->getDescripcion() ?></p>
            
            <p><strong>Talles disponibles:</strong>
                <?php if (count($producto->getTalles()) > 1): ?>
                    <select class="form-select w-25 mt-1">
                        <?php foreach ($producto->getTalles() as $talle): ?>
                            <option value="<?= $talle ?>"><?= $talle; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php else: ?>
                    <?= $producto->getTalles()[0]; ?>
                <?php endif; ?>
            </p>
            
            <h3>
                <?= $producto->obtenerPrecioConDescuento($temporada, $anio, $descuento); ?>
            </h3>
            <button class="btn btn-info btn-lg mt-2 w-50 text-white fw-semibold boton-comprar">Comprar</button>
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