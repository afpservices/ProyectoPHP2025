<?php
// Eliminamos la inicialización de sesión para evitar duplicados
require_once __DIR__ . '/../db/Database.php';

// inicializamos el carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

//Aqui agregamos las funciones principales del carrito como seleccionar los datos de la base de datos 
function agregarAlCarrito($id, $cantidad = 1)
{
    try {
        $db = conectarDB();
        //Verificamos si hay suficiente stock disponible en la base de datos.
        $stmt = $db->prepare("SELECT * FROM productos WHERE id = :id AND stock >= :cantidad");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->execute();
        //Si el producto ya existe en el carrito, aumenta la cantidad.
        //Si es nuevo, lo añade al carrito con la cantidad especificada.
        if ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (isset($_SESSION['carrito'][$id])) {
                $_SESSION['carrito'][$id] += $cantidad;
            } else {
                $_SESSION['carrito'][$id] = $cantidad;
            }
            return true;
        }

        return false;
    } catch (PDOException $e) {
        error_log("Error al agregar al carrito: " . $e->getMessage());
        return false;
    }
}


//Elimina un producto del carrito
function eliminarDelCarrito($id)
{
    if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]);
    }
}

//Vacía completamente el carrito
function vaciarCarrito()
{
    $_SESSION['carrito'] = [];
}


//Obtiene el contenido del carrito con toda la información de productos
function obtenerCarrito()
{
    if (empty($_SESSION['carrito'])) {
        return [];
    }

    try {
        $db = conectarDB();
        $carrito = [];
        // Consulta la base de datos para obtener información completa de cada producto.
        foreach ($_SESSION['carrito'] as $id => $cantidad) {
            $stmt = $db->prepare("SELECT * FROM productos WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            //Añade los campos 'cantidad' y 'subtotal' a cada producto.
            if ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $producto['cantidad'] = $cantidad;
                $producto['subtotal'] = $producto['precio'] * $cantidad;
                $carrito[] = $producto;
            }
        }

        return $carrito;
    } catch (PDOException $e) {
        error_log("Error al obtener carrito: " . $e->getMessage());
        return [];
    }
}



//Esta función calcula el costo total de todos los productos en el carrito.
function calcularTotalCarrito()
{
    $total = 0;

    foreach (obtenerCarrito() as $producto) {
        $total += $producto['subtotal'];
    }

    return $total;
}


//sta función cuenta el número total de artículos en el carrito
function contarProductosCarrito()
{
    $total = 0;

    foreach ($_SESSION['carrito'] as $cantidad) {
        $total += $cantidad;
    }

    return $total;
}