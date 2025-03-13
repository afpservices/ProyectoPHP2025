<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Filipshop' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="assets/css/estilos.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Filipshop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex me-auto" action="index.php" method="GET">
                    <input type="hidden" name="controller" value="products">
                    <input type="hidden" name="action" value="search">
                    <div class="input-group">
                        <input class="form-control" type="search" name="termino" placeholder="Buscar productos..."
                            aria-label="Search">
                        <button class="btn btn-light" type="submit">Buscar</button>
                    </div>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=cart&action=index">
                            Carrito
                            <?php if (contarProductosCarrito() > 0): ?>(<?php echo contarProductosCarrito(); ?>)<?php endif; ?>
                        </a>
                    </li>

                    <?php
                    if (isset($_SESSION['admin_logueado'])):
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=admin&action=index">Administración</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=admin&action=logout">Cerrar sesión</a>
                        </li>
                    <?php elseif (isset($_SESSION['usuario_logueado'])):
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=admin&action=logout">Cerrar sesión</a>
                        </li>
                    <?php else:
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=admin&action=login">Iniciar sesión</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>