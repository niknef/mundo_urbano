<?PHP 
    $producto = $catalogo[$idProducto];
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="img/<?php echo $producto['img']; ?>" alt="<?php echo $producto['nombre']; ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1><?php echo $producto['nombre']; ?></h1>
            <h2><?php echo $producto['marca']; ?></h2>
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
            
            <h2>$<?php echo number_format($producto['precio'], 0, ',', '.'); ?></h2>
            <button class="btn btn-info btn-lg mt-2 w-50 text-white fw-semibold boton-comprar">Comprar</button>
        </div>
    </div>
</div>