<?php
 require "Entidades.php";

$gente=new Persona($_POST['Nombre'],$_POST['Apellido'],$_POST['Edad'],$_POST['Legajo']);

$ar=fopen("archivo.txt","w");
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

if(move_uploaded_file($_FILES['Archivo']['tmp_name'], "Imagenes/".$_POST['Legajo']."Foto.jpg"))
echo "Lo logro.";

?>