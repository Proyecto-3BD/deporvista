function drop() {
    document.getElementById("dropdownMenuLink").style.backgroundColor = "#205720";
}

function registro() {
    document.getElementById("conect").style.display = "none";
    document.getElementById("registro").style.display = "block";
    document.getElementById("inicio-p").style.backgroundColor = "#369741";
    document.getElementById("inicio-p").style.color = "#000000";

    document.getElementById("registro-p").style.backgroundColor = "#093a0d";
    document.getElementById("registro-p").style.color = "#ffffff";

}

function inicio() {
    document.getElementById("conect").style.display = "block";
    document.getElementById("registro").style.display = "none";
    document.getElementById("inicio-p").style.backgroundColor = "#093a0d";
    document.getElementById("inicio-p").style.color = "#ffffff";

    document.getElementById("registro-p").style.backgroundColor = "#369741";

    document.getElementById("registro-p").style.color = "#000000";
}


 /* todos */

function directo() {
    document.getElementById("hoy").style.display = "block";
    document.getElementById("finalizados").style.display = "none";
    document.getElementById("proximos").style.display = "none";
}


function finalizado() {
    document.getElementById("hoy").style.display = "none";
    document.getElementById("finalizados").style.display = "block";
    document.getElementById("proximos").style.display = "none";
}


function proximo() {
    document.getElementById("hoy").style.display = "none";
    document.getElementById("finalizados").style.display = "none";
    document.getElementById("proximos").style.display = "block";

}



/*  futbol */
function directofutbol() {
    document.getElementById("hoyfutbol").style.display = "block";
    document.getElementById("finalizadosfutbol").style.display = "none";
    document.getElementById("proximosfutbol").style.display = "none";
}


function finalizadofutbol() {
    document.getElementById("hoyfutbol").style.display = "none";
    document.getElementById("finalizadosfutbol").style.display = "block";
    document.getElementById("proximosfutbol").style.display = "none";
}


function proximofutbol() {
    document.getElementById("hoyfutbol").style.display = "none";
    document.getElementById("finalizadosfutbol").style.display = "none";
    document.getElementById("proximosfutbol").style.display = "block";

}


 /* basket */
 function directobasket() {
    document.getElementById("hoybasket").style.display = "block";
    document.getElementById("finalizadosbasket").style.display = "none";
    document.getElementById("proximosbasket").style.display = "none";
}


function finalizadobasket() {
    document.getElementById("hoybasket").style.display = "none";
    document.getElementById("finalizadosbasket").style.display = "block";
    document.getElementById("proximosbasket").style.display = "none";
}


function proximobasket() {
    document.getElementById("hoybasket").style.display = "none";
    document.getElementById("finalizadosbasket").style.display = "none";
    document.getElementById("proximosbasket").style.display = "block";

}





 /* liga */

 function directoLiga() {
    document.getElementById("hoyLiga").style.display = "block";
    document.getElementById("finalizadosLiga").style.display = "none";
    document.getElementById("proximosLiga").style.display = "none";
}


function finalizadoLiga() {
    document.getElementById("hoyLiga").style.display = "none";
    document.getElementById("finalizadosLiga").style.display = "block";
    document.getElementById("proximosLiga").style.display = "none";
}


function proximoLiga() {
    document.getElementById("hoyLiga").style.display = "none";
    document.getElementById("finalizadosLiga").style.display = "none";
    document.getElementById("proximosLiga").style.display = "block";

}