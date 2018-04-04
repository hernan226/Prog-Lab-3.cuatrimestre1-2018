<?php
switch()
{
    case "Cargar"
    {
        $nombre=$_POST['Nombre'];
        $apelido=$_POST['Apellido'];

        echo $nombre.$apelido;
    }
    case "Modificar"
    {
        $nombre=$_POST['Nombre'];
        $apelido=$_POST['Apellido'];
        
        echo $nombre.$apelido;
    }
    case "Borrar"
    {
        $nombre=$_POST['Nombre'];
        $apelido=$_POST['Apellido'];
        
        echo $nombre.$apelido;
    }
}

 
?>