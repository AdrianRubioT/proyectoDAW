var peticion_http = new XMLHttpRequest();

function cargar(){
    
    obtenerComentario();
    
}


var ip = window.location.host;
var url = "http://"+ip+"/proyectoDAW/obtenerComentarioXML.php";


function obtenerComentario(){
    
    var ID_juego = getUrlVars()["ID_juego"];
    
    peticion_http.onreadystatechange = mostrar;
    peticion_http.open('GET', url + "?" + "ID_juego="+ ID_juego, true);
    peticion_http.send(null);
    
}



function mostrar() {
    //console.log(peticion_http.readyState);
    if(peticion_http.readyState == 4 && peticion_http.status == 200) {
        //lugar para posible funcionalidad 
        console.log(peticion_http.responseText);
        // alert(peticion_http.responseText);
        
        
        //console.log(peticion_http.responseText);
        // console.log("respuesta");
    }
}



//pasa los parametros de la url a un array clave-valor
function getUrlVars() {
    // https://html-online.com/articles/get-url-parameters-javascript/
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}





document.addEventListener("DOMContentLoaded", cargar, false);