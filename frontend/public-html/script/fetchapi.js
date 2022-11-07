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

const mostrarData = (dataevento) => {
    console.log(dataevento)
    let body = ''
    for (let i = 0; i < dataevento.length; i++) {
        if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

            body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
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

        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        dataevento.reverse();


        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {

            if (dataevento[i].fechaHora <= fecha) {

                body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
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



        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        console.log(dataevento);


        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].fechaHora >= fecha) {

                body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
            }
        }
        document.getElementById('dataeventoProx').innerHTML = body;
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
        body += `<tr><th>Fecha y hora: </th><td>${dataevento[i - 1].fechaHora}</td></tr><tr><th>Ubicacion: </th><td>${dataevento[i - 1].ubicacion}</td></tr><tr><th>Equipo Local: </th><td>${dataevento[i - 1].locatario}</td></tr><tr><th>Jugadores locales: </th><td>${dataevento[i - 1].locatario}</td></tr><tr><th>Equipo Visitante: </th><td>${dataevento[i - 1].visitante}</td></tr><tr><th>Jugadores Visitantes: </th><td>${dataevento[i - 1].visitante}</td></tr>`

        document.getElementById('detallesdeevento').innerHTML = body;
    }

}

/* FIN DETALLE DE EVENTOS */


/* FUTBOL */
document.getElementById('generalfutbol').style.display = "none";
let actualfutbol = document.getElementById("futbol");
let activarfutbol = actualfutbol.addEventListener('click', futbol);

function futbol() {
    document.getElementById('generalfutbol').style.display = "block";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";

    document.getElementById('hoyfutbol').style.display = "block";
    document.getElementById('finalizadosfutbol').style.display = "none";
    document.getElementById('proximosfutbol').style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


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
        document.getElementById('dataeventofutbol').innerHTML = body;
    }
}

function fetchEventoFinalizadoFutbol() {

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))

    const mostrarData = (dataevento) => {

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
        document.getElementById('dataeventoFinfutbol').innerHTML = body;
    }
}

function fetchEventoProximoFutbol() {

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
            if (dataevento[i].deporte == "futbol") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxfutbol').innerHTML = body;
    }
}

/* FIN FUTBOL */


/* BASKET */
document.getElementById('generalbasket').style.display = "none";
let actualbasket = document.getElementById("basket");
let activarbasket = actualbasket.addEventListener('click', basket);

function basket() {
    document.getElementById('generalbasket').style.display = "block";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoybasket").style.display = "block";
    document.getElementById("finalizadosbasket").style.display = "none";
    document.getElementById("proximosbasket").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


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
        document.getElementById('dataeventobasket').innerHTML = body;
    }
}

function fetchEventoFinalizadobasket() {

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))

    const mostrarData = (dataevento) => {

        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        dataevento.reverse();


        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].deporte == "basketball") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinbasket').innerHTML = body;
    }
}

function fetchEventoProximobasket() {

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
        document.getElementById('dataeventoProxbasket').innerHTML = body;
    }
}

/* FIN BASKET */