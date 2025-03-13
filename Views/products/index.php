<?php
$title = 'Filipshop';
include 'Views/templates/header.php';
?>

<main class="container py-4">
    <section>
        <h2 class="mb-4">Nuestros Productos</h2>

        <?php
        // Mensaje para cuando no hay productos disponibles
        if (empty($productos)):
            ?>
            <div class="alert alert-info">
                <p>No hay productos disponibles en este momento.</p>
            </div>
            <?php
        else:
            ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                // Iterar sobre cada producto para mostrarlo en una tarjeta
                foreach ($productos as $id => $producto):
                    ?>
                    <div class="col">
                        <div class="card h-100 producto">
                            <?php
                            // Mostrar imagen del producto si existe
                            if (!empty($producto['imagen']) && file_exists('assets/img/' . $producto['imagen'])):
                                ?>
                                <img src="/assets/img/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="">
                                
                                <?php
                            else:
                                ?>
                                <div class="card-img-top bg-light d-flex justify-content-center align-items-center"
                                    style="height: 250px;">
                                    Sin imagen disponible
                                </div>
                            <?php endif; ?>

                            <div class="card-body">
                                <h3 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h3>

                                <p class="card-text">
                                    <?php
                                    // Mostrar primeros 100 caracteres de la descripción para no ocupar toda la pagina
                                    echo htmlspecialchars(substr($producto['descripcion'], 0, 100)) .
                                        (strlen($producto['descripcion']) > 100 ? '...' : '');
                                    ?>
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <!-- Precio del producto -->
                                    <span class="h5 mb-0">
                                        <?php echo number_format($producto['precio'], 2, ',', '.'); ?> €
                                    </span>

                                    <?php
                                    if ($producto['stock'] > 0):
                                        ?>
                                        <!-- Enlace a página de detalle del producto -->
                                        <a href="index.php?controller=products&action=show&id=<?php echo $id; ?>" class="btn btn-primary">Ver detalles</a>
                                    <?php else:
                                        // "Agotado" cuando no hay stock
                                        ?>
                                        <span class="badge bg-danger">Agotado</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include 'Views/templates/footer.php'; ?>