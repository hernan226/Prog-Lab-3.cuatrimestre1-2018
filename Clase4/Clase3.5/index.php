<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="ejemplo1.php" method="POST" enctype="multipart/form-data">        
    <input type="text" name="Nombre" value=Juan>
    </br>
    <input type="text" name="Apellido" value=Diaz>
    </br>
    <input type="text" name="Edad" value=22>
    </br>
    <input type="text" name="Legajo" value=2>
    </br>
    <input type="file" name="Archivo" value="Archivo">
    </br>
    <input type="submit" name="Cargar"  value="Cargar">
    <input type="submit" name="Modificar"  value="Modificar">
    <input type="submit" name="Borrar"  value="Borrar">
    </form>    
    
</body>
</html>