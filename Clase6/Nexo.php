<?php

require_once "./Clases/Cliente.php";
require_once "./Clases/Helados.php";
if(isset($_POST))
{
    switch($_POST['submit'])
    {
        case "cargarCliente":
            GuardarEnArchivo(new Cliente($_POST['nombre'], $_POST['correo'], $_POST['clave']));
            break;
        case "validar":
            echo ValidarCliente(new Cliente($_POST['nombre'], $_POST['correo'], $_POST['clave']));
            break;
        case "cargarHelado":
            $helado = new Helados($_POST['sabor'], $_POST['precio']);
            $helado->GuardarHelado($helado);
            break;
            
    }
}/*
elseif(isset($_GET))
{    
    switch($_GET['submit'])
    {
        case "vender":
            if(strcmp($_GET['sabor'],))
            {

            }
    }
}
else
    echo "ERROR!!!";
*/

?>