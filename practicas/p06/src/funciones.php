<?php

//problema 1
function es_multiplo7y5($num)
{
    if ($num%5==0 && $num%7==0)
    {
        echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
    }
    else
    {
        echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
    }
}

//problema 2
function generarSecuencias()
{
    $matriz = [];
    $iteraciones = 0;
    
    while (true) {
        $num1 = rand(1, 999);
        $num2 = rand(1, 999);
        $num3 = rand(1, 999);
        
        if ($num1 % 2 != 0 && $num2 % 2 == 0 && $num3 % 2 != 0) {
            $matriz[] = [$num1, $num2, $num3];
            if (count($matriz) >= 4) break;
        }
        $iteraciones++;
    }
    return [$matriz, $iteraciones];
}

//problema 3
function encontrarMultiplo($n) {
    do {
        $random = rand(1, 1000);
    } while ($random % $n != 0);
    return $random;
}


?>