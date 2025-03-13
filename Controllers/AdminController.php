<?php
require_once 'db/Database.php';
require_once 'Models/Producto.php';

class AdminController
{
    public function index()
    {

        // Verificamos si es admin
        if (!isset($_SESSION['admin_logueado'])) {
            header('Location: index.php?controller=admin&action=login');
            exit;
        }

        $productos = obtenerProductos();
        include 'Views/admin/panel.php';
    }

    public function login()
    {

        // Procesamos el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtenemos los datos 
            $usuario = $_POST['usuario'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($usuario === 'felipe' && $password === 'felipe') {
                $_SESSION['usuario_logueado'] = true;
                $_SESSION['usuario_id'] = 999;
                $_SESSION['usuario_nombre'] = 'Felipe';
                $_SESSION['es_admin'] = false;

                header('Location: index.php');
                exit;
            }


            try {
                $db = conectarDB();

                // busqueda para buscar el usuario admin
                $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND es_admin = true");
                $stmt->bindParam(':usuario', $usuario);
                $stmt->execute();

                $admin = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($admin && password_verify($password, $admin['password'])) {
                    $_SESSION['admin_logueado'] = true;
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_nombre'] = $admin['nombre'];

                    header('Location: index.php?controller=admin&action=index');
                    exit;
                }
            } catch (PDOException $e) {
                error_log("Error de inicio de sesión: " . $e->getMessage());
            }
        }

        include 'Views/admin/login.php';
    }

    public function logout()
    {

        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
        exit;
    }

    public function createProduct()
    {

        if (!isset($_SESSION['admin_logueado'])) {
            header('Location: index.php?controller=admin&action=login');
            exit;
        }

        // Comprueba si el formulario ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validacion de campos
            if (
                !empty($_POST['nombre']) && !empty($_POST['descripcion']) &&
                !empty($_POST['precio']) && is_numeric($_POST['precio']) &&
                !empty($_POST['stock']) && is_numeric($_POST['stock'])
            ) {
                // Inicializa la variable para el nombre de la imagen
                $nombreImagen = '';

                // Procesamos la imagen, solo si hay alguna imagen subida
                if (!empty($_FILES['imagen']['name'])) {
                    $directorioImagenes = 'assets/img/';

                    // Creamos el directorio en caso de no existir
                    if (!file_exists($directorioImagenes)) {
                        mkdir($directorioImagenes, 0755, true);
                    }

                    $nombreImagen = time() . '_' . $_FILES['imagen']['name'];
                    $rutaCompleta = $directorioImagenes . $nombreImagen;

                    // Movemos la imagen a la carpeta img
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta);
                }

                // Creamos un array de la info del producto 
                $nuevoProducto = [
                    'nombre' => $_POST['nombre'],
                    'descripcion' => $_POST['descripcion'],
                    'precio' => floatval($_POST['precio']),
                    'imagen' => $nombreImagen,
                    'stock' => intval($_POST['stock'])
                ];

                // Guardamos el producto añadido en la base de datos
                if (guardarNuevoProducto($nuevoProducto)) {
                    header('Location: index.php?controller=admin&action=index');
                    exit;
                } else {
                    header('Location: index.php?controller=admin&action=index');
                    exit;
                }
            }
        }

        include 'Views/admin/create_product.php';
    }

    public function editProduct()
    {


        if (!isset($_SESSION['admin_logueado'])) {
            header('Location: index.php?controller=admin&action=login');
            exit;
        }

        // Obtenemos el ID del producto
        $id = $_GET['id'] ?? null;
        $producto = null;

        //obtenemos los datos del producto según el ID recibido
        if ($id) {
            $producto = obtenerProductoPorId($id);
        }

        // Si no se encuentra el producto, redirecciona al panel de control
        if (!$producto) {
            header('Location: index.php?controller=admin&action=index');
            exit;
        }

        // Procesamos el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validacion de campos
            if (
                !empty($_POST['nombre']) && !empty($_POST['descripcion']) &&
                !empty($_POST['precio']) && is_numeric($_POST['precio']) &&
                !empty($_POST['stock']) && is_numeric($_POST['stock'])
            ) {
                // le idicamos que mantenga la imagen que ya trae, en caso de modificarla pues se cambia
                $nombreImagen = $producto['imagen'];

                // Si se ha subido una nueva imagen, se cambia
                if (!empty($_FILES['imagen']['name'])) {
                    $directorioImagenes = 'assets/img/';

                    // Eliminamos la imagen anteriror si este existe
                    if (!empty($producto['imagen'])) {
                        $rutaImagenAnterior = $directorioImagenes . $producto['imagen'];
                        if (file_exists($rutaImagenAnterior)) {
                            unlink($rutaImagenAnterior); // Borramos la imagen anterior
                        }
                    }

                    // Generamos un nombre
                    $nombreImagen = time() . '_' . $_FILES['imagen']['name'];
                    $rutaCompleta = $directorioImagenes . $nombreImagen;

                    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta);
                }

                // Creamos array con los datos del producto
                $productoActualizado = [
                    'nombre' => $_POST['nombre'],
                    'descripcion' => $_POST['descripcion'],
                    'precio' => floatval($_POST['precio']),
                    'imagen' => $nombreImagen,
                    'stock' => intval($_POST['stock'])
                ];

                // actualizamos el producto en la base de datos
                if (actualizarProducto($id, $productoActualizado)) {
                    header('Location: index.php?controller=admin&action=index');
                    exit;
                } else {
                    header('Location: index.php?controller=admin&action=index');
                    exit;
                }
            }
        }

        include 'Views/admin/edit_product.php';
    }
}