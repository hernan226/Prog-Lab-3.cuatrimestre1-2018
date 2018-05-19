
var URL = "http://localhost:3000/login";
var httpReq = new XMLHttpRequest();
var notas = new Array();
var lista = new Array();
    var callback = function () {
        loading();
        if (httpReq.readyState == 4){
            console.log(httpReq.status);
            if (httpReq.status == 200){ 
                var tipo = JSON.parse(httpReq.responseText);

                if(tipo.type != "error")
                {
                    unloading(); 
                    var str= {"type" :tipo.type , "email" :document.getElementById('email').value };
                    localStorage.setItem("user", JSON.stringify(str));
                    location.href ="http://localhost/ParcialLabo3/index.html";
            
                }

                if(tipo.type == "error")
                {
                   document.getElementById('err').hidden = false;
                   document.getElementsById('email').style.borderColor= "solid red";
                   document.getElementById('pass').style.borderColor = "red";

                }
            }
            else
                alert("OCURRIO UN ERROR EN LA PETICION")
            }
    }

    var callback2 = function () {
        loading();
        if (httpReq.readyState == 4){
            if (httpReq.status == 200){
                unloading(); 
                lista = JSON.parse(httpReq.responseText);
                crearTabla(lista);
            }
            else
                alert("OCURRIO UN ERROR EN LA PETICION")
            }
    }
    var callback3 = function () {            
        loading();
        if (httpReq.readyState == 4){
            if (httpReq.status == 200){ 
                unloading();
                location.href = "";
                alert("REGISTRO ACTUALIZADO!");
                
            }
            else
                
                alert("OCURRIO UN ERROR EN LA PETICION");
            }   
    }
    function Login(email,pass)
    {
        httpReq.onreadystatechange = callback; 
        httpReq.open("post", URL, true);
        httpReq.setRequestHeader("Content-Type", "application/json");
        var obj = {"email":email ,"password":pass};
        httpReq.send(JSON.stringify(obj));

    }

    function verificar()
    {
        httpReq.onreadystatechange = callback2;
        httpReq.open("GET", "http://localhost:3000/notas", true);
        httpReq.send();
    }

    function crearTabla(lista)
    {
        var tabla = document.getElementById('tabla');
        var body = document.getElementById('cuerpo');
        var n; var m;
        var user = JSON.parse(localStorage.getItem('user'));
        var type = user.type;

        if(user.type == 'Admin')
        {
            tabla.innerHTML ="<th>LEGAJO</th><th>NOMBRE</th><th>MATERIA</th><th>NOTA</th><th></th>";
        }
        else
            tabla.innerHTML = "<th>LEGAJO</th><th>NOMBRE</th><th>MATERIA</th><th>NOTA</th>";


        for( var i = 0; i < lista.length; i++){
                if(user.type == 'Admin')
                    m = "<td><a onclick='cargarRegistro(" +i+",event)' href='#'>Editar</a></td></tr>";
                else
                    m = "</tr>";

                if(lista[i].nota < 4)
                    n = "<td bgcolor='red'><font color= 'white'>" + lista[i].legajo + "</td>" +
                        "<td bgcolor='red'><font color= 'white'>" + lista[i].nombre + "</td>" +
                        "<td bgcolor='red'><font color= 'white'>" + lista[i].materia + "</td>" +
                        "<td bgcolor='red'><font color= 'white'>" + lista[i].nota + "</td>" + m;
                else
                    n = "<td>" + lista[i].legajo + "</td>" +
                        "<td>" + lista[i].nombre + "</td>" +
                        "<td>" + lista[i].materia + "</td>" +"<td>" + lista[i].nota + "</td>" + m; 

                body.innerHTML += n;
                                    
    
            }
    }

    function cargarRegistro(ind, event)
    {
        var leg = document.getElementById('legajo');
        var nombre = document.getElementById('nombre');
        var materia = document.getElementById('materia');
        var nota = document.getElementById('nota');
        document.getElementById('modificar').style.display = 'block';

        leg.value = lista[ind].legajo;
        nombre.value = lista[ind].nombre;
        materia.value = lista[ind].materia;
        nota.value = lista[ind].nota;

        document.getElementById("guardar").onclick = function() 
        {
            var jsonNuevo = {"id": lista[ind].id, "legajo": leg.value, "nombre": nombre.value, "materia": materia.value, "nota": nota.value};
            httpReq.onreadystatechange = callback3; 
            httpReq.open("post", "http://localhost:3000/editarNota", true);
            httpReq.setRequestHeader("Content-Type", "application/json");
            httpReq.send(JSON.stringify(jsonNuevo));
        }
    }
    
    function loading()
    {
        document.getElementById('spinner').style.display = 'block';
        document.getElementById('fondo').style.display = 'block';
    }

    function unloading()
    {
        document.getElementById('spinner').style.display = 'none';
        document.getElementById('fondo').style.display = 'none';   
    }