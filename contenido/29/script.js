
// require("cabecera/scripts/puntuaciones.js");

var puntos;

function cargar(){
    
    puntos = document.getElementById("puntos");
    
    document.getElementById("acumular").addEventListener("click", contar);
    document.getElementById("enviar").addEventListener("clikc", enviar);
}

// function enviar(){
//     hola();
//     //enviarPuntuacion(puntos.innerText);
// }

function contar(){
    //console.log(puntos);
    puntos.value++;
    
}



document.addEventListener("DOMContentLoaded", cargar, false);