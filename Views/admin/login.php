<!DOCTYPE html>
<html>

<head>
    <title>Login Administración</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="login-container">
                    <div>
                        <h3 class="mb-4" style="text-align: center;">Iniciar Sesión</h3>
                    </div>
                    <div class="card-body p-4">

                        <form method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="usuario" name="usuario"
                                    placeholder="Usuario" required>
                                <label for="usuario"><i class="fas fa-user me-2"></i>Usuario</label>
                            </div>


                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Contraseña" required> <!-- Campo obligatorio tipo password -->
                                <label for="password"><i class="fas fa-lock me-2"></i>Contraseña</label>

                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                                </button>
                            </div>
                        </form>
                    </div>
                    <footer class="bg-white text-dark py-4 mt-4">
                        <div class="container text-center">
                            <p class="mb-2">&copy; 2025 Filipshop</p>
                            <p class="mb-2">Email: info@filipshop.com | Teléfono: 924 36 30 60</p>
                            <div class="mt-3">
                                <a href="index.php" class="text-dark mx-2 text-decoration-none">Inicio</a>
                                <a href="index.php?controller=products&action=index" class="text-dark mx-2 text-decoration-none">Productos</a>
                                <a href="#" class="text-dark mx-2 text-decoration-none">Contacto</a>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>