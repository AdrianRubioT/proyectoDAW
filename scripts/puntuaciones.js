
var peticion_http = new XMLHttpRequest();

var ip = "18.224.32.38";
var url = "http://"+ip+":8080/proyectoDAW/funciones/guardarPuntuacion.php";

// function cargar(){
//     enviarPuntuacion(4);
// }



function enviarPuntuacion(puntuacion){
    
    var ID_juego = getUrlVars()["ID_juego"];
    
    peticion_http.onreadystatechange = mostrar;
    
    peticion_http.open('GET', url + "?" + "IDjuego="+ID_juego +"&"+ "puntuacion="+puntuacion, true);
    
    
}

function mostrar() {
    if(peticion_http.readyState == 4 && peticion_http.status == 200) {
        //lugar para posible funcionalidad 
        //console.log(peticion_http.responseText);
    }
}


function getUrlVars() {
    // https://html-online.com/articles/get-url-parameters-javascript/
    //pasa los parametros de la url a un array clave-valor
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}


//document.addEventListener("DOMContentLoaded", cargar, false);