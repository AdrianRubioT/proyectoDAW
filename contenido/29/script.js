

var puntos;

function cargar(){
    
    puntos = document.getElementById("puntos");
    
    document.getElementById("acumular").addEventListener("click", contar);
    document.getElementById("enviar").addEventListener("click", enviar);
}

function enviar(){
    console.log("hola");
    enviarPuntuacion(puntos.value);
    
}

function contar(){
    puntos.value++;
    
}

document.addEventListener("DOMContentLoaded", cargar, false);


// copia y pega del scrip con las funciones de enviar puntuaciones
//
//****************************************************************
var peticion_http = new XMLHttpRequest();



//console.log(window.location.host);
var ip = window.location.host;
var url = "http://"+ip+"/proyectoDAW/guardarPuntuacion.php";


function enviarPuntuacion(puntuacion){
    
    var ID_juego = getUrlVars()["ID_juego"];
    
    peticion_http.onreadystatechange = mostrar;
    //console.log(url + "?" + "IDjuego="+ ID_juego +"&"+ "puntuacion="+puntuacion);

    

    peticion_http.open('GET', url + "?" + "IDjuego="+ ID_juego +"&"+ "puntuacion="+puntuacion, true);
    peticion_http.send(null);
    
}



function mostrar() {
    //console.log(peticion_http.readyState);
    if(peticion_http.readyState == 4 && peticion_http.status == 200) {
        //lugar para posible funcionalidad 
        
        if(peticion_http.responseText != ""){
            alert(peticion_http.responseText);
        }
        
        //console.log(peticion_http.responseText);
        // console.log("respuesta");
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


