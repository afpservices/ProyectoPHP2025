<?php
$title = htmlspecialchars($producto['nombre']) . ' - Filipshop';
include 'Views/templates/header.php';
?>

<main class="container py-5">
    <div class="producto-detalle-contenedor">
        <div class="row">
            <div class="col-md-6">
                <div class="producto-imagen mb-4">
                    <?php
                    // Mostrar imagen del producto
                    if (!empty($producto['imagen']) && file_exists('assets/img/' . $producto['imagen'])):
                        ?>
                        <img src="/assets/img/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="">
                    <?php else:
                        // Si no hay imagen, no se muestra nada
                        ?>

                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="producto-info">
                    <h1 class="mb-3"><?= htmlspecialchars($producto['nombre']) ?></h1>

                    <div class="d-flex align-items-center mb-3">
                        <span class="h3 text-primary mb-0 me-3">
                            <?= number_format($producto['precio'], 2, ',', '.') ?> €
                        </span>

                        <?php if ($producto['stock'] > 0): ?>
                            <span class="badge bg-success">Disponible</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Agotado</span>
                        <?php endif; ?>
                    </div>

                    <?php
                    // Mostrar formulario de cantidad solo si hay stock disponible
                    if ($producto['stock'] > 0):
                        ?>
                        <form method="POST" class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text">Cantidad</span>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" value="1"
                                    min="1" max="<?= $producto['stock'] ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-shopping-cart me-2"></i>Añadir al carrito
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>

                    <div class="seccion-descripcion">
                        <h4 class="mb-3">Descripción del Producto</h4>
                        <p><?= htmlspecialchars($producto['descripcion']) ?></p>

                        <div class="row mt-4">
                            <div class="col-6">
                                <strong>Disponibilidad:</strong>
                                <?php if ($producto['stock'] > 0): ?>
                                    <?= $producto['stock'] ?> unidades en stock
                                <?php else: ?>
                                    Producto agotado
                                <?php endif; ?>
                            </div>
                            <div class="col-6">
                                <a href="index.php" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-arrow-left me-2"></i>Volver a la tienda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'Views/templates/footer.php'; ?>