<?php
 require "Entidades.php";

switch($_POST['Submit'])
{
    case "Cargar":
        $gente=new Persona($_POST['Nombre'],$_POST['Apellido'],$_POST['Edad'],$_POST['Legajo']);

        $ar=fopen("archivo.txt","a");
        fwrite($ar,$gente.'-'."Foto.jpg".PHP_EOL);
        fclose($ar);
        
        $aux= array();
        
        $ar=fopen("archivo.txt","r");
        while(!feof($ar))
        {
            $aux[]=fgets($ar);
        }
        fclose($ar);
        
        for($i=0;$i<count($aux);$i++)
        {
            if(strcmp($aux[$i],$gente.'-'."Foto.jpg"))
            {        
                copy("Imagenes/".$_POST['Legajo']."Foto.jpg","Backup/".$_POST['Legajo']."Foto.jpg");
                break;
            }
        }
        
        move_uploaded_file($_FILES['Archivo']['tmp_name'], "Imagenes/".$_POST['Legajo']."Foto.jpg");
        break;

    case "Modificar":
        $nombre=$_POST['Nombre'];
        $apelido=$_POST['Apellido'];
        
        echo $nombre.$apelido;
        break;
        
    case "Borrar":
        $nombre=$_POST['Nombre'];
        $apelido=$_POST['Apellido'];
        
        echo $nombre.$apelido;
        break;
}

?>