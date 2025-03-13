<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear Nuevo Producto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">

</head>

<body>
    <div class="container py-4">
        <div class="admin-header mb-4">
            <h1 class="admin-title">
                <i class="fas fa-plus-circle"></i> Crear Nuevo Producto
            </h1>
            <div>
                <a href="index.php?controller=admin&action=index" class="btn btn-outline-secondary shadow-hover">
                    <i class="fas fa-arrow-left me-2"></i>Volver al Panel
                </a>
            </div>
        </div>

        <div class="card product-card border-0">
            <div class="card-body p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nombre" class="form-label fw-semibold">Nombre del producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4"
                                required><?php echo isset($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion']) : ''; ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="precio" class="form-label fw-semibold">Precio (€)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01"
                                    min="0.01"
                                    value="<?php echo isset($_POST['precio']) ? htmlspecialchars($_POST['precio']) : ''; ?>"
                                    required>
                                <span class="input-group-text">€</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="stock" class="form-label fw-semibold">Stock disponible</label>
                            <input type="number" class="form-control" id="stock" name="stock" min="0"
                                value="<?php echo isset($_POST['stock']) ? htmlspecialchars($_POST['stock']) : ''; ?>"
                                required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="imagen" class="form-label fw-semibold">Imagen del producto</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="index.php?controller=admin&action=index" class="btn btn-outline-secondary shadow-hover">
                            <i class="fas fa-times me-1"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Guardar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>