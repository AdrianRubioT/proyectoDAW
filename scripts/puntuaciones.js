
var peticion_http = new XMLHttpRequest();
var url = "http://18.224.32.38:8080/proyectoDAW/funciones/guardarPuntuacion.php";

function cargar(){

    enviarPuntuacion(4);
    
}



function enviarPuntuacion(puntuacion){
    
    var ID_juego = getUrlVars()["ID_juego"];
    
    // console.log(getUrlVars()["ID_juego"]);
    
    
    peticion_http.onreadystatechange = mostrar;
    
    peticion_http.open('GET', url + "?" + "IDjuego="+ID_juego +"&"+ "puntuacion="+puntuacion, true);
    peticion_http.send();
    
}

function mostrar() {
    if(peticion_http.readyState == 4 && peticion_http.status == 200) {
        console.log(peticion_http.responseText);
    }
}


function getUrlVars() {
    // https://html-online.com/articles/get-url-parameters-javascript/
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}


document.addEventListener("DOMContentLoaded", cargar, false);