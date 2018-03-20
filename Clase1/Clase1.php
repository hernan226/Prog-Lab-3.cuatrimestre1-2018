<?php

$Nombre="Jose";
echo 'Hola $Nombre <br/>';// asi no se pueden pasar valores de variables.
echo "Hola $Nombre <br/>";// asi se pueden pasar valores de variables.

$edad=20;
$sueldo= 8500.20;
print("edad: $edad<br/>");
printf("sueldo: %.2f <br/>",$sueldo);

echo strtoupper($Nombre);
echo "<br/>";

$arr1= array(1,5,3,4,77,5,1);
var_dump($arr1);
echo "<br/>";
$arr2[]=1;
$arr2[]=3;
$arr2[]=5;

var_dump($arr2);

echo "<br/>";
$arr2[22]=3;

var_dump($arr2);

echo "<br/>";
$arr2["Pedro"]=1;

var_dump($arr2);

foreach($arr2 as $valor){
    echo "$valor <br/>";
}

/*foreach($arr2 as $5=>$valor){
    echo "$valor <br/>";
}*/

sort($arr1);
var_dump($arr1);
echo "<br/>";
rsort($arr1);
var_dump($arr1);
echo "<br/>";
asort($arr1);
var_dump($arr1);
echo "<br/>";
arsort($arr1);
var_dump($arr1);
echo "<br/>";
?>