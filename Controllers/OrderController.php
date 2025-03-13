<?php
require_once 'Models/Carrito.php';
require_once 'Models/Funciones.php';
require_once 'db/Database.php';

class OrderController
{
    public function checkout()
    {

        // Verificar que el carrito no esté vacío
        if (empty(obtenerCarrito())) {
            header('Location: index.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el pedido
            header('Location: index.php?controller=order&action=confirm');
            exit;
        }

        include 'Views/orders/checkout.php';
    }

    public function confirm()
    {

        // Vaciar el carrito después de confirmar el pedido
        $_SESSION['carrito'] = [];

        include 'Views/orders/confirmation.php';
    }
}