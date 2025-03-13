<?php
require_once 'Models/Producto.php';
require_once 'Models/Carrito.php';

class CartController
{
    public function index()
    {


        if (isset($_GET['eliminar'])) {
            eliminarDelCarrito($_GET['eliminar']);
            header('Location: index.php?controller=cart&action=index');
            exit;
        }

        $carrito = obtenerCarrito();
        include 'Views/cart/index.php';
    }

    public function add()
    {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        $cantidad = $_POST['cantidad'] ?? 1;

        if ($id) {
            agregarAlCarrito($id, $cantidad);
        }

        header('Location: index.php?controller=cart&action=index');
        exit;
    }

    public function remove()
    {

        $id = $_GET['id'] ?? null;

        if ($id) {
            eliminarDelCarrito($id);
        }

        header('Location: index.php?controller=cart&action=index');
        exit;
    }
}