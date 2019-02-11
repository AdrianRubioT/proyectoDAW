//Movida ajax



function ajaxCon(juego) {
    xhr.open("GET","http://asdf/juego/"+juego);
    
    
    if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("tablero").innerHTML = xhr.responseText;
    }
}