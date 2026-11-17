<?php
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
    echo '<pre>';


    //EXPERIMENTO 1
    function turno(){
        static $n = 0;
        return ++$n;
    }

    echo 'E1: ' . turno() . turno() . turno() . turno() . "\n";

    //EXPERIMENTO 2
    $total = 10;
    $suma = function ($x) use (&$total) {
        return $total += $x;
    };

    echo "E2: " . $suma(5) . ' ' . $total . "\n";

    //EXPERIMENTO 3
    echo 'E3: ' . gettype(10 / 3) . "\n";

    //EXPERIMENTO 4
    echo 'E4: ';
    var_dump(round ('3.99'));

    //EXPERIMENTO 5
    echo 'E5: ';
    var_dump(PHP_INT_MAX + 1);

    echo '</pre>';