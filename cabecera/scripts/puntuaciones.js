var peticion_http = new XMLHttpRequest();


// function hola(){
//     alert ("hola ");
// }


//console.log(window.location.host);
var ip = window.location.host;
var url = "http://"+ip+"/proyectoDAW/guardarPuntuacion.php";


export function enviarPuntuacion(puntuacion){
    
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
        
            alert(peticion_http.responseText);
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


