
function OnClickSend(email, pass) {

    var httprequest = new XMLHttpRequest();

    var callBack = function () {
        console.log('Llego info. del servidor ' + httprequest.readyState);
        if (httprequest.readyState == 4) {
            if (httprequest.status == 200) {
                if (httprequest.response.autenticado === 'si') {
                    localStorage.setItem(usuario, httprequest.response);                
                location.replace("http://localhost:8080/asd/Index.html");
				}
				else
					alert("SOS UN PELOTUDO");
            }

            else
                alert('ocurrio un error en el server.');
        }
    }

    var url = 'http://localhost:1337/login';
    httprequest.onreadystatechange = callBack;
    httprequest.open('POST', url, true);
    httprequest.setRequestHeader('Content-Type', 'application/json');
    var data = { email: email, password: pass };
    httprequest.send(JSON.stringify(data));
}

    /*  "<a href='#' onclick="mifuncion('+i+')"> borrar </a>"    */
