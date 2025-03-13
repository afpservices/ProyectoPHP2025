<?php
$title = 'Resultados de Búsqueda';
include 'Views/templates/header.php';
?>

<main class="container py-4">
    <h1>Resultados de Búsqueda</h1>

    <form action="index.php" method="GET" class="mb-4">
        <input type="hidden" name="controller" value="products">
        <input type="hidden" name="action" value="search">
        <div class="input-group">
            <input type="text" name="termino" class="form-control" placeholder="Buscar productos" value="<?= htmlspecialchars($termino) ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <?php
    // Si no hay resultados, mostramos un mensaje informativo
    if (empty($resultados)): ?>
        <div class="alert alert-info">
            <p>No se encontraron productos que coincidan con tu búsqueda.</p>
        </div>
    <?php
        // Si si hay mostramos la lista de productos
    else: ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            // Iteramos sobre cada producto encontrado
            foreach ($resultados as $producto): ?>
                <div class="col">
                    <div class="card h-100 producto">
                        <!-- Mostrar imagen del producto -->
                        <?php if (!empty($producto['imagen']) && file_exists('assets/img/' . $producto['imagen'])): ?>
                        <img src="/assets/img/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="">
                        <?php else: ?>
                            <div class="card-img-top bg-light d-flex justify-content-center align-items-center" style="height: 200px;">
                                Sin imagen disponible
                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <!-- Mostrar nombre del producto -->
                            <h3 class="card-title"><?= htmlspecialchars($producto['nombre']) ?></h3>

                            <!-- Mostrar descripción del producto -->
                            <p class="card-text">
                                <?= htmlspecialchars(substr($producto['descripcion'], 0, 100)) . (strlen($producto['descripcion']) > 100 ? '...' : '') ?>
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <!-- Mostrar precio  -->
                                <span class="h5 mb-0"><?= number_format($producto['precio'], 2, ',', '.') ?> €</span>

                                <a href="index.php?controller=products&action=show&id=<?= $producto['id'] ?>" class="btn btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php include 'Views/templates/footer.php'; ?>