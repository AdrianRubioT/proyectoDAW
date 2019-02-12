
alert("hola");
var puntos;

function cargar(){
    
    puntos = document.getElementById("puntos");
    
    document.getElementById("acumular").addEventListener("click", contar);
    document.getElementById("enviar").addEventListener("clikc", enviar);
}

function enviar(){
    //enviarPuntuacion(puntos.innerText);
}

function contar(){
    console.log(puntos);
    //puntos.innerText;
    
}



document.addEventListener("DOMContentLoaded", cargar, false);