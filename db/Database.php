<?php
//Establece conexión a la base de datos
function conectarDB()
{
    $host = 'mariadb';  // o 'localhost' si no estás usando Docker
    $usuario = 'root';
    $password = 'changepassword';
    $database = 'Proyectophp';

    try {
        // Primero conectamos sin especificar la base de datos
        $conexion = new PDO("mysql:host=$host", $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("CREATE DATABASE IF NOT EXISTS `$database`");

        // Nos conectamos nuevamente pero ahora especificando la base de datos
        $conexion = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexion;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}