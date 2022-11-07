let date = new Date();

let fecha =
    date.getFullYear() + "-" +
    ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
    ("00" + date.getDate()).slice(-2) + " " +

    ("00" + date.getHours()).slice(-2) + ":" +
    ("00" + date.getMinutes()).slice(-2) + ":" +
    ("00" + date.getSeconds()).slice(-2);
console.log(fecha);

let principioDia =
    date.getFullYear() + "-" +
    ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
    ("00" + date.getDate()).slice(-2) + " " +

    ("00" + 00).slice(-2) + ":" +
    ("00" + 00).slice(-2) + ":" +
    ("00" + 00).slice(-2);
console.log(principioDia);


let finDia =
    date.getFullYear() + "-" +
    ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
    ("00" + date.getDate()).slice(-2) + " " +

    ("00" + 23).slice(-2) + ":" +
    ("00" + 59).slice(-2) + ":" +
    ("00" + 59).slice(-2);
console.log(finDia);


let url = "http://localhost:8084/resultados";
fetch(url)
    .then(response => response.json())
    .then(dataevento => mostrarData(dataevento))
    .catch(error => console.log(error))

/*
let date = new Date();

let principioDia =
    date.getFullYear() + "-" +
    ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
    ("00" + date.getDate()).slice(-2) + " " +

    ("00" + 00).slice(-2) + ":" +
    ("00" + 00).slice(-2) + ":" +
    ("00" + 00).slice(-2);
console.log(principioDia);

let finDia =
    date.getFullYear() + "-" +
    ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
    ("00" + date.getDate()).slice(-2) + " " +

    ("00" + 23).slice(-2) + ":" +
    ("00" + 59).slice(-2) + ":" +
    ("00" + 59).slice(-2);
console.log(finDia);
*/

const mostrarData = (dataevento) => {
    console.log(dataevento)
    let body = ''
    for (let i = 0; i < dataevento.length; i++) {
        if (dataevento[i].deporte == "futbol") {
            if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
            }
        }
    }
    document.getElementById('dataevento').innerHTML = body;
}


function fetchEventoFinalizado() {

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {

        /*
                let date = new Date();
                let fecha =
                    date.getFullYear() + "-" +
                    ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
                    ("00" + date.getDate()).slice(-2) + " " +
        
                    ("00" + date.getHours()).slice(-2) + ":" +
                    ("00" + date.getMinutes()).slice(-2) + ":" +
                    ("00" + date.getSeconds()).slice(-2);
                console.log(fecha);
        */

        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        dataevento.reverse();


        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].deporte == "futbol") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFin').innerHTML = body;
    }
}

function fetchEventoProximo() {

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {

        /*
        let date = new Date();
        let fecha =
            date.getFullYear() + "-" +
            ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
            ("00" + date.getDate()).slice(-2) + " " +

            ("00" + date.getHours()).slice(-2) + ":" +
            ("00" + date.getMinutes()).slice(-2) + ":" +
            ("00" + date.getSeconds()).slice(-2);
        console.log(fecha);
*/

        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        console.log(dataevento);


        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].deporte == "futbol") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProx').innerHTML = body;
    }
}


/*  BASKET */

let mibasket = document.getElementById("basket");
let eventobasket = mibasket.addEventListener('click', basket);


function basket() {
    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))

    document.getElementById("hoy").style.display = "block";
    document.getElementById("finalizados").style.display = "none";
    document.getElementById("proximos").style.display = "none";


    let basket = document.getElementById('barraResultados');
    let htmlCode = '<ul id="barraBasket"><li><a onclick="directo();" >Hoy</a></li><li><a onclick="finalizado(); fetchEventoFinalizadoBasket()">Finalizados</a></li><li><a onclick="proximo(); fetchEventoProximoBasket()">Proximos</a></li></ul>';
    basket.insertAdjacentHTML('beforebegin', htmlCode);
    document.getElementById('barraResultados').style.display = "none";


    let barradeporte = document.getElementById('barraDeportes');
    let htmlCodes = '<ul id=""><li><a href="">Futbol</a></li><li><a id="">Basketball</a></li><li><a href="">Tenis</a></li><li><a href="">Rugby</a></li><li><a href="">Golf</a></li></ul>';
    barradeporte.insertAdjacentHTML('beforebegin', htmlCodes);
    document.getElementById('barraDeportes').style.display = "none";


    /*

let date = new Date();

let principioDia =
    date.getFullYear() + "-" +
    ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
    ("00" + date.getDate()).slice(-2) + " " +

    ("00" + 00).slice(-2) + ":" +
    ("00" + 00).slice(-2) + ":" +
    ("00" + 00).slice(-2);
console.log(principioDia);


let finDia =
    date.getFullYear() + "-" +
    ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
    ("00" + date.getDate()).slice(-2) + " " +

    ("00" + 23).slice(-2) + ":" +
    ("00" + 59).slice(-2) + ":" +
    ("00" + 59).slice(-2);
console.log(finDia);
*/

    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {

            if (dataevento[i].deporte == "basketball") {

                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataevento').innerHTML = body;
    }
}




function fetchEventoFinalizadoBasket() {

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {

        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        dataevento.reverse();


        console.log(dataevento);
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].deporte == "basketball") {


                if (dataevento[i].fechaHora <= fecha) {
                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`

                }
            }

        }

        document.getElementById('dataeventoFin').innerHTML = body;
    }
}

function fetchEventoProximoBasket() {

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {


        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        console.log(dataevento);


        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].deporte == "basketball") {

                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }

        }
        document.getElementById('dataeventoProx').innerHTML = body;
    }
}


/* De aca para abajo prueba */
/* Liga  */
let miligaUru = document.getElementById("miligauru");
let eventomiligaUru = miligaUru.addEventListener('click', ligauy);

function ligauy() {
    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    document.getElementById("general").style.display = "none";
    document.getElementById("porliga").style.display = "block";

    document.getElementById("hoyLiga").style.display = "block";
    document.getElementById("finalizadosLiga").style.display = "none";
    document.getElementById("proximosLiga").style.display = "none";


    let basket = document.getElementById('barraResultadosLiga');
    let htmlCode = '<ul id="barraResultadosLigaActiva"><li><a onclick="directoLiga();" >Hoy</a></li><li><a onclick="finalizadoLiga(); fetchEventoFinalizadoligauy()">Finalizados</a></li><li><a onclick="proximoLiga(); fetchEventoProximoligauy()">Proximos</a></li></ul>';
    basket.insertAdjacentHTML('beforebegin', htmlCode);
    document.getElementById('barraResultadosLiga').style.display = "none";

    let barradeporte = document.getElementById('barraLigas');
    let htmlCodes = '<div id="barraLigasActiva"><p>Principales Ligas</p><div class="sidetable"><p>Futbol</p><ul><li><a id="milaliga">LaLiga</a></li><li><a id="mipremier">Premier League</a></li><li><a id="">Primera de Uruguay</a></li><li><a id="miligaarg">Primera de Argentina</a></li><li><a id="miserieA">Serie A</a></li></ul></div><div class="sidetable"><p>Basketball</p><ul><li><a id="miNBAeste">NBA Este</a></li><li><a id="miNBAoeste">NBA Oeste</a></li><li><a id="milub">LUB</a></li></ul></div><div class="sidetable"><p>Tenis</p><ul><li><a id="miusopen">US Open</a></li><li><a id="miwimble">Wimbledon</a></li><li><a id="miroland">Roland-Garros</a></li><li><a id="miausopen">Austarlian Open</a></li></ul></div></div>';
    barradeporte.insertAdjacentHTML('beforebegin', htmlCodes);
    document.getElementById('barraLigas').style.display = "none";

    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {

            if (dataevento[i].competicion == "Primera division de Uruguay") {

                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoLiga').innerHTML = body;
    }
}




function fetchEventoFinalizadoligauy() {

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {

        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        dataevento.reverse();


        console.log(dataevento);
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "Primera division de Uruguay") {


                if (dataevento[i].fechaHora <= fecha) {
                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`

                }
            }

        }

        document.getElementById('dataeventoFinLiga').innerHTML = body;
    }
}

function fetchEventoProximoligauy() {

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {


        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        console.log(dataevento);


        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "Primera division de Uruguay") {

                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }

        }
        document.getElementById('dataeventoProxLiga').innerHTML = body;
    }
}

/* DETALLE DE EVENTOS */


function detalleEvento(i) {
    console.log(i);

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {


        let body = ''
        /* body += `<tr><th>Equipo Local: </th><td>${dataevento[i-1].locatario}</td></tr><tr><th>Jugadores locales: </th><td>${dataevento[i-1].locatario}</td></tr><tr><th>Equipo Visitante: </th><td>${dataevento[i-1].visitante}</td></tr><tr><th>Jugadores Visitantes: </th><td>${dataevento[i-1].visitante}</td></tr>`*/
        body += `<tr><th>Fecha y hora: </th><td>${dataevento[i-1].fechaHora}</td></tr><tr><th>Ubicacion: </th><td>${dataevento[i-1].ubicacion}</td></tr><tr><th>Equipo Local: </th><td>${dataevento[i-1].locatario}</td></tr><tr><th>Jugadores locales: </th><td>${dataevento[i-1].locatario}</td></tr><tr><th>Equipo Visitante: </th><td>${dataevento[i-1].visitante}</td></tr><tr><th>Jugadores Visitantes: </th><td>${dataevento[i-1].visitante}</td></tr>`

        document.getElementById('detallesdeevento').innerHTML = body;
    }

}