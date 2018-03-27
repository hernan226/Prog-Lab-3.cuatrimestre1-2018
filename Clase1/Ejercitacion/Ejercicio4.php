<?php

$suma=0;
$sumados=0;
$num=1;

while($suma<1000)
{
    $suma+=$num;
    echo("$num  ");
    $num++;
    $sumados++;
}

    echo("<br/>Se sumaron: $sumados");

?>