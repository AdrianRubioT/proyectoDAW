var peticion_http = new XMLHttpRequest();

function cargar(){
    
    obtenerComentario();
    
}


var ip = window.location.host;
var url = "http://"+ip+"/proyectoDAW/obtenerComentarioXML.php";




function cuerporMensage(nombre, texto, id){
return `
<div class="comentario">
    <input type="hidden" value="${id}" />
    <div class="nombre">${nombre}</div>
    <div class="texto">${texto}</div>
    <button class="boton responder" type="button">Responder</button>
    
    <div class="respuesta"></div>
</div>
 `
}

function mostrar() {
    
    if(peticion_http.readyState == 4 && peticion_http.status == 200) {
        
        
        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(peticion_http.responseText, "text/xml");
        //console.log(xmlDoc);
        
        var listadoComentarios = xmlDoc.getElementsByTagName("comentario");
        
        
        for (var i = 0; i < listadoComentarios.length ; i++ ) {
            
            var id = listadoComentarios[i].childNodes[0].textContent;
            var nombre = listadoComentarios[i].childNodes[1].textContent;
            var texto = listadoComentarios[i].childNodes[2].textContent;
            
            document.getElementById("comentarios").innerHTML += (cuerporMensage(nombre, texto, id));
        }
        
        
        var botones = document.querySelectorAll(".responder");
        //console.log(botones);
        for (var i = 0; i < botones.length ; i++ ) {
            
            botones[i].addEventListener("click", mostrarCaja);
            
        }
        
        //console.log(xmlDoc.getElementsByTagName("comentario")[0].childNodes[0]);
        
        
        
    }
}

function mostrarCaja(event){
    // alert("hola");
    
}


function obtenerComentario(){
    
    var ID_juego = getUrlVars()["ID_juego"];
    
    peticion_http.onreadystatechange = mostrar;
    peticion_http.open('GET', url + "?" + "ID_juego="+ ID_juego, true);
    peticion_http.send(null);
    
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