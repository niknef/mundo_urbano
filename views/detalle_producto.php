<?PHP 
    $id = $_GET['id'] ?? 0;
    $producto = null;
    if (!empty($id)) {
        $producto = buscarProductoPorId($id);
    };
?>
 <div class="container mt-5">
    <div class="row">
        <?PHP if (!empty($producto)) { ?>
            <div class="col-md-6">
            <img src="img/productos/<?php echo $producto['img']; ?>" alt="<?php echo $producto['nombre']; ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1><?php echo $producto['nombre']; ?></h1>
            <h2 class="fw-light mb-3"><?php echo $producto['marca']; ?></h2>
            <p><strong>Tipo:</strong> <?php echo $producto['tipo']; ?></p>
            <p><strong>Color:</strong> <?php echo $producto['color']; ?></p>
            <p><?php echo $producto['descripcion']; ?></p>
            
            <p><strong>Talles disponibles:</strong>
                <?php if (count($producto['talles']) > 1): ?>
                    <select class="form-select w-25 mt-1">
                        <?php foreach ($producto['talles'] as $talle): ?>
                            <option value="<?php echo $talle; ?>"><?php echo $talle; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php else: ?>
                    <?php echo $producto['talles'][0]; ?>
                <?php endif; ?>
            </p>
            
            <h2>
                <?php 
                $precio = aplicarDescuento($producto, $temporada, $anio, $descuento);
                    if ($precio < $producto['precio']) { ?>
                        <span class='fw-lighter text-decoration-line-through text-secondary text-danger me-1'><?= "$" . number_format($producto['precio'], 0, ',', '.') ?> </span>
                        <?= "$" . number_format($precio, 0, ',', '.');?>
                    <?php } else {
                        echo "$" . number_format($producto['precio'], 0, ',', '.');
                    }
                ?>
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