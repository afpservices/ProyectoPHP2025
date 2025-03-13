<?php
// Eliminamos la inicialización de sesión
require_once __DIR__ . '/../db/Database.php';

//Obtiene todos los productos disponibles
function obtenerProductos()
{
    try {
        $db = conectarDB();
        $stmt = $db->query("SELECT * FROM productos ORDER BY id DESC");
        $productos = [];

        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[$producto['id']] = $producto;
        }

        return $productos;
    } catch (PDOException $e) {
        // Si hay un error, devuelve array vacío y registra el error
        error_log("Error al obtener productos: " . $e->getMessage());
        return [];
    }
}

//Obtiene un producto por su ID
function obtenerProductoPorId($id)
{
    try {
        $db = conectarDB();
        $stmt = $db->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto ? $producto : null;
    } catch (PDOException $e) {
        error_log("Error al obtener producto por ID: " . $e->getMessage());
        return null;
    }
}

// Guarda un nuevo producto en la base de datos
function guardarNuevoProducto($producto)
{
    try {
        $db = conectarDB();
        $stmt = $db->prepare("INSERT INTO productos (nombre, descripcion, precio, imagen, stock) 
                              VALUES (:nombre, :descripcion, :precio, :imagen, :stock)");

        $stmt->bindParam(':nombre', $producto['nombre']);
        $stmt->bindParam(':descripcion', $producto['descripcion']);
        $stmt->bindParam(':precio', $producto['precio']);
        $stmt->bindParam(':imagen', $producto['imagen']);
        $stmt->bindParam(':stock', $producto['stock'], PDO::PARAM_INT);//datos del producto que tenemos que guardar

        $stmt->execute();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        error_log("Error al guardar producto: " . $e->getMessage());
        return false;
    }
}


//Actualiza un producto existente
function actualizarProducto($id, $producto)
{
    try {
        $db = conectarDB();

        // Si la imagen no se cambia lo que hace que mantiene la imagen que esta ya 
        if (empty($producto['imagen'])) {
            $stmt = $db->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, 
                                 precio = :precio, stock = :stock WHERE id = :id");
        } else {
            $stmt = $db->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, 
                                 precio = :precio, imagen = :imagen, stock = :stock WHERE id = :id");
            $stmt->bindParam(':imagen', $producto['imagen']);
        }

        $stmt->bindParam(':nombre', $producto['nombre']);
        $stmt->bindParam(':descripcion', $producto['descripcion']);
        $stmt->bindParam(':precio', $producto['precio']);
        $stmt->bindParam(':stock', $producto['stock'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error al actualizar producto: " . $e->getMessage());
        return false;
    }
}
//Elimina un producto por su ID
function eliminarProducto($id)
{
    try {
        $db = conectarDB();
        $stmt = $db->prepare("DELETE FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error al eliminar producto: " . $e->getMessage());
        return false;
    }
}


//Busca productos por nombre o descripción
function buscarProductos($termino)
{
    try {
        $db = conectarDB();
        $busqueda = "%$termino%";

        $stmt = $db->prepare("SELECT * FROM productos WHERE nombre LIKE :termino OR descripcion LIKE :termino");
        $stmt->bindParam(':termino', $busqueda);
        $stmt->execute();

        $productos = [];
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[$producto['id']] = $producto;
        }

        return $productos;
    } catch (PDOException $e) {
        error_log("Error al buscar productos: " . $e->getMessage());
        return [];
    }
}
// carga los productos
$productos = obtenerProductos();