<?php

require_once "./Clases/Cliente.php";
require_once "./Clases/Helados.php";
var_dump($_POST);
var_dump($_GET);
if(isset($_POST))
{
    switch($_POST['submit'])
    {
        case "cargarCliente":
            $cliente=new Cliente($_POST['nombre'], $_POST['correo'], $_POST['clave']);
            $cliente->GuardarEnArchivo();
            break;
        case "validar":
            $cliente=new Cliente($_POST['nombre'], $_POST['correo'], $_POST['clave']);
            echo $cliente->ValidarCliente();            
            break;
        case "cargarHelado":
            $helado = new Helados($_POST['sabor'], $_POST['precio']);
            $helado->GuardarHelado($helado);
            break;
            
    }
}
if(isset($_GET))
{    
    switch($_GET['submit'])
    {
        case "vender":
            $helado= new Helados($_GET['sabor'], $_GET['precio']);
            $helado->VenderHelado($_GET['cantidad']);

    }
}
?>