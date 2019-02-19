var peticion_http = new XMLHttpRequest();

var GET;
function cargar(){
    
    GET = getUrlVars();
    obtenerComentario();
    
}


var ip = window.location.host;
var url = "http://"+ip+"/proyectoDAW/obtenerComentarioXML.php";






function CuerpoRespuesta(id_padre, id_juego){
return`
<div class="responder">
    <button class="boton cerrar" type="button">cerrar</button>
    <form action="guardarComentario.php" method = "GET">
        <input type="hidden" name="ID_juego" value="${id_juego}">
        <input type="hidden" name="ID_padre" value="${id_padre}">
        <textarea name="textoComentario"></textarea>
        <input type="submit" value="Comentar"/>
    </form>
</div>
`
}

function cuerporMensage(comentarioXML){
    // console.log(comentarioXML);
    var id = comentarioXML.childNodes[0].textContent;
    var nombre = comentarioXML.childNodes[1].textContent;
    var texto = comentarioXML.childNodes[2].textContent;
    
    var out = `
<div class="comentario">
    <input type="hidden" value="${id}" />
    <div class="nombre">${nombre}</div>
    <div class="texto">${texto}</div>
    <button class="boton responder" type="button">Responder</button>
    <div class="respuesta">`;
    
    if (comentarioXML.childNodes[3] != null) {
        out += cuerporMensage(comentarioXML.childNodes[3]);
    }
    out += 
    `</div>
</div>`;
    
return out;
}

function mostrar() {
    
    if(peticion_http.readyState == 4 && peticion_http.status == 200) {
        
        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(peticion_http.responseText, "text/xml");
        // console.log(xmlDoc.childNodes[0].childNodes);
        
        var listadoComentarios = xmlDoc.childNodes[0].childNodes;
        
        for (var i = 0; i < listadoComentarios.length ; i++ ) {
            

            
            document.getElementById("comentarios").innerHTML += (cuerporMensage(listadoComentarios[i]));
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
    // console.log(event.target.parentElement.childNodes);
    
    // div que esta para contener el bloque de responder
    var divRespuesta = event.target.parentElement.childNodes[9];
    
    // var con el id del input hiden del cometario;
    var idPadre = event.target.parentElement.childNodes[1].value;
    
    // aniadir el bloque para responder al mensage
    divRespuesta.innerHTML = CuerpoRespuesta(idPadre, GET["ID_juego"]);
    
    // TODO aniadir la funcion de quitar el bloque de respuesta
    
    
}


function obtenerComentario(){
    
    var ID_juego = GET["ID_juego"];
    
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