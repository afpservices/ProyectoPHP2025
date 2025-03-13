<?php
// Front Controller
session_start(); // Única llamada a session_start() en toda la aplicación

// Definir controlador y acción por defecto
$controller = $_GET['controller'] ?? 'products';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Incluir controladores
require_once 'Controllers/ProductsController.php';
require_once 'Controllers/CartController.php';
require_once 'Controllers/OrderController.php';
require_once 'Controllers/AdminController.php';

// Enrutamiento
switch ($controller) {
    case 'products':
        $controller = new ProductsController();
        if ($action == 'show') {
            $controller->show();
        } elseif ($action == 'search') {
            $controller->search();
        } else {
            $controller->index();
        }
        break;
        
    case 'cart':
        $controller = new CartController();
        if ($action == 'add') {
            $controller->add();
        } elseif ($action == 'remove') {
            $controller->remove();
        } else {
            $controller->index();
        }
        break;
        
    case 'order':
        $controller = new OrderController();
        if ($action == 'confirm') {
            $controller->confirm();
        } else {
            $controller->checkout();
        }
        break;
        
    case 'admin':
        $controller = new AdminController();
        
        if ($action == 'login') {
            $controller->login();
        } elseif ($action == 'logout') {
            $controller->logout();
        } elseif ($action == 'createProduct') {
            $controller->createProduct();
        } elseif ($action == 'editProduct') {
            $controller->editProduct();
        } else {
            $controller->index();
        }
        break;
        
    default:
        // Página no encontrada, redirigir a la página principal
        header('Location: index.php');
        exit;
}