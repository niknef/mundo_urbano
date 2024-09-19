<?PHP 
    $id = $_GET['id'] ?? 0;
    $producto = Producto::buscarProductoPorId($id);
?>
 <div class="container mt-5">
    <div class="row">
        <?PHP if (!empty($producto)) { ?>
            <div class="col-md-6">
            <img src="img/productos/<?= $producto->getImg() ?>" alt="<?= $producto->getNombre() ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1><?= $producto->getNombre() ?></h1>
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
            
            <h2>
                <?= $producto->obtenerPrecioConDescuento($temporada, $anio, $descuento); ?>
            </h2>
            <button class="btn btn-info btn-lg mt-2 w-50 text-white fw-semibold boton-comprar">Comprar</button>
        </div>

        <?PHP } else {?>
            <div class="alert alert-danger text-center">
                <h1> No se encontró el producto solicitado. </h1>
                <img src="img/sad-svg.svg" alt="No se encontró el producto" class="img-fluid" style="max-width: 400px;">
            </div>
        <?PHP }; ?>
        
    </div>
</div>


<section>
    <?PHP
    require_once "views/oferta_corto.php";
    ?>
</section>