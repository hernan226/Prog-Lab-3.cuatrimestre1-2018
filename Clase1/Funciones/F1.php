<?php
/* las funciones en PHP no necesitan un tipo de dato de retorno*/
/*Las funciones en PHP no son keySensitive*/
/*en PHP no se pueden sobrecargar funciones, pero colocando un valor default ($apellido='') es una forma de emular eso*/
function Saludar($Nombre, $Apellido='')
{    
    echo "Hola soy una funcion.<br/>";
    return "Hola $Nombre $Apellido";
}
?>