<?php
require_once 'Models/Producto.php';
require_once 'Models/Carrito.php';

class ProductsController
{
    public function index()
    {

        $productos = obtenerProductos();

        require 'views/products/index.php';
    }

    public function show()
    {

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: index.php');
            exit;
        }

        $producto = obtenerProductoPorId($id);

        if (!$producto) {
            header('Location: index.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            agregarAlCarrito($id, $_POST['cantidad']);
            header('Location: index.php?controller=cart&action=index');
            exit;
        }

        require 'views/products/show.php';
    }

    public function search()
    {
        $termino = $_GET['termino'] ?? '';
        $resultados = buscarProductos($termino);
        require 'views/products/search.php';
    }
}