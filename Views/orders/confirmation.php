<?php
$title = 'Pedido Confirmado - Filipshop';
include 'Views/templates/header.php';
?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                    </div>

                    <h1 class="display-4 mb-4">¡Gracias por tu pedido!</h1>
                    <p class="lead mb-4">Tu pedido ha sido recibido y está siendo procesado.</p>

                    <hr class="my-4">

                    <p class="mb-4">Recibirás un correo electrónico con los detalles de tu compra.</p>

                    <div class="d-grid gap-2 col-md-6 mx-auto">
                        <a href="index.php" class="btn btn-primary btn-lg">
                            <i class="fas fa-home me-2"></i>Volver a la tienda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'Views/templates/footer.php'; ?>