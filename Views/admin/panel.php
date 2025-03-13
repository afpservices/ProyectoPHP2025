<!DOCTYPE html>
<html>

<head>
    <title>Panel de Control - Administración</title>
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
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h1 class="admin-title"><i class="fas fa-cog me-2"></i>Panel de Administración</h1>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="index.php" class="btn btn-outline-primary me-2">
                    <i class="fas fa-store me-1"></i> Ver tienda
                </a>
                <a href="index.php?controller=admin&action=logout" class="btn btn-outline-danger">
                    <i class="fas fa-sign-out-alt me-1"></i> Cerrar sesión
                </a>
            </div>
        </div>

        <!-- Sistema de mensajes para mostrar errores o notificaciones -->
        <?php if (isset($_SESSION['error_mensaje'])): ?>
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <?php
                echo $_SESSION['error_mensaje'];
                unset($_SESSION['error_mensaje']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="mb-4">
            <a href="index.php?controller=admin&action=createProduct" class="btn btn-success">
                <i class="fas fa-plus-circle me-1"></i> Añadir Nuevo Producto
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th class="text-center">ID</th>
                        <th class="text-center">Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($productos) && is_array($productos) && !empty($productos)): ?>
                        <?php foreach ($productos as $id => $producto): ?>
                            <tr>
                                <td class="text-center"><?php echo $id; ?></td>
                                <td class="text-center">
                                    <?php if (!empty($producto['imagen']) && file_exists('assets/img/' . $producto['imagen'])): ?>
                                    <img src="/assets/img/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="">
                                            alt="<?php echo htmlspecialchars($producto['nombre']); ?>"
                                            class="admin-producto-imagen">
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Sin imagen</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td><?php echo htmlspecialchars(substr($producto['descripcion'], 0, 50)) . (strlen($producto['descripcion']) > 50 ? '...' : ''); ?>
                                </td>
                                <td class="text-center"><?php echo number_format($producto['precio'], 2, ',', '.') . ' €'; ?>
                                </td>
                                <td class="text-center"><?php echo $producto['stock']; ?></td>
                                <td class="text-center">
                                    <a href="index.php?controller=admin&action=editProduct&id=<?php echo $id; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No hay productos disponibles</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>