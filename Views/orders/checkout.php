<?php
$title = 'Finalizar Compra - Filipshop';
include 'Views/templates/header.php';
?>

<main class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-container">
                <h2 class="header-title text-center">Finalizar Compra</h2>

                <form method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección de envío</label>
                        <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Confirmar Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'Views/templates/footer.php'; ?>