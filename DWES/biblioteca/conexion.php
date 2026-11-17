<?php

$servidor = "localhost"; // la base de datos está en este mismo ordenador
$baseDatos = "biblioteca"; // nombre de la base de datos que creamos
$usuario = "root"; // usuario por defecto de XAMPP
$clave = ""; // en XAMPP, root no tiene contraseña

try {
    // PDO es la "llave" que usa PHP para hablar con la base de datos
    $pdo = new PDO(
    "mysql:host=$servidor;dbname=$baseDatos;charset=utf8mb4",
    $usuario,
    $clave
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
$generos = [
"Clásico", "Novela", "Ciencia ficción",
"Fantasía", "Infantil", "Informática"
];