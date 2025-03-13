<!DOCTYPE html>
<html>

<head>
    <title>Editar Producto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <div class="container py-4">
        <div class="mb-4">
            <a href="index.php?controller=admin&action=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver al Panel de Control
            </a>
        </div>

        <div class="mb-4">
            <h2><i class="fas fa-edit me-2"></i>Editar Producto</h2>
        </div>

        <form method="POST" enctype="multipart/form-data" class="card p-4 border-0 shadow-sm">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="nombre" class="form-label fw-bold">Nombre del producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-bold">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="5"
                            required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="precio" class="form-label fw-bold">Precio (€)</label>
                        <div class="input-group">
                            <span class="input-group-text">€</span>
                            <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0"
                                value="<?php echo $producto['precio']; ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="stock" class="form-label fw-bold">Stock disponible</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                            <input type="number" class="form-control" id="stock" name="stock" min="0"
                                value="<?php echo $producto['stock']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Imagen actual</label>
                        <div class="border p-3 text-center rounded">
                            <?php if (!empty($producto['imagen']) && file_exists('assets/img/' . $producto['imagen'])): ?>
                            <img src="/assets/img/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="">
                                    alt="<?php echo $producto['nombre']; ?>" class="img-fluid" style="max-height: 200px;">
                            <?php else: ?>

                                <p class="text-muted">Sin imagen</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="imagen" class="form-label fw-bold">Cambiar imagen</label>
                        <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-3">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?controller=admin&action=index'">
                    <i class="fas fa-times me-2"></i>Cancelar
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Guardar Cambios
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>