<?php
$title = 'Carrito de Compra';
include 'Views/templates/header.php';
?>

<main class="container py-4">
    <h1 class="mb-4">Tu Carrito de Compra</h1>

    <?php
    // Mostrar mensaje cuando el carrito está vacío
    if (empty($carrito)):
        ?>
        <div class="alert alert-info d-flex align-items-center shadow-hover">
            <i class="fas fa-info-circle me-3"></i>
            <div>
                El carrito está vacío. <a href="index.php" class="alert-link">Ir a la tienda</a>
            </div>
        </div>
    <?php
        // Mostrar tabla con productos y opciones cuando hay productos en el carrito
    else:
        ?>
        <div class="table-responsive product-card p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Iterar sobre cada producto en el carrito
                    foreach ($carrito as $producto):
                        ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php
                                    // Mostrar imagen del producto si el archivo existe
                                    if (!empty($producto['imagen']) && file_exists('assets/img/' . $producto['imagen'])):
                                        ?>
                                        <img src="/assets/img/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="">
                                            alt="<?= htmlspecialchars($producto['nombre']) ?>"
                                            class="img-thumbnail me-3 admin-producto-imagen" style="width: 80px; height: 80px;">
                                    <?php endif; ?>

                                    <span><?= htmlspecialchars($producto['nombre']) ?></span>
                                </div>
                            </td>

                            <td class="text-center"><?= number_format($producto['precio'], 2, ',', '.') ?> €</td>

                            <td class="text-center"><?= $producto['cantidad'] ?></td>

                            <td class="text-center product-price">
                                <?= number_format($producto['subtotal'], 2, ',', '.') ?> €
                            </td>

                            <td class="text-center">
                                <a href="index.php?controller=cart&action=remove&id=<?= $producto['id'] ?>" class="btn delete-btn"
                                    onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Total:</td>
                        <td class="text-center product-price">
                            <?= number_format(calcularTotalCarrito(), 2, ',', '.') ?> €
                        </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="index.php" class="btn btn-outline-secondary shadow-hover">
                <i class="fas fa-arrow-left me-2"></i>Seguir comprando
            </a>

            <a href="index.php?controller=order&action=checkout" class="btn btn-primary">
                Realizar Pedido <i class="fas fa-shopping-cart ms-2"></i>
            </a>
        </div>
    <?php endif; ?>
</main>

<?php include 'Views/templates/footer.php'; ?>