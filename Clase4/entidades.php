<?php

//var_dump($_FILES);
if(move_uploaded_file($_FILES['Archivo']['tmp_name'], "Imagenes/".$_FILES['Archivo']['name']))
    echo "Lo logro.";

$archvo=explode('.',$_FILES['Archivo']['name']);

$nombre=$archvo[0];
$archvo=array_reverse($archvo);
$extension=$archvo[0];
$
?>