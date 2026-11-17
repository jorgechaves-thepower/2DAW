<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
echo '<pre>';

//Experimento 1

$precio = 19.99;
echo 'E1: ';
var_dump(round ($precio * 100));

//Experimento 2

$carrito = 0.1 + 0.2;
echo 'E2: ';
var_dump(round($carrito,2) == 0.3);

//Experimento 3

$cpCliente = '01001';
$cpTienda = '1001';
echo 'E3: ';
var_dump($cpCliente === $cpTienda);

//Experimento 4

echo 'E4: ' . number_format(1234.5, 2, ',', '.') . "\n";

//Experimento 5

$cuenta = 100;
$personas = 3;
$parte = round($cuenta / $personas, 2);
echo 'E5: ' . $parte . ' x ' . $personas . ' = ' . ($parte*$personas) . "\n";

echo '</pre>';