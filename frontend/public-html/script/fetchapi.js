/* LOGIN */
let formulario = document.getElementById("formularioenvio");
formulario.addEventListener('submit', function (e) {
    e.preventDefault();

    let datos = new FormData(formulario);

    /* objeto con los datos del formulario */
    let objeto = {};
    datos.forEach((value, key) => objeto[key] = value);
    console.log(objeto);

    /* array del objeto anterior*/
    var objetoArray = Object.entries(objeto);
    console.log(objetoArray);

    /* pasar a string el json de objetos */
    let datosjson = JSON.stringify([objeto]);
    console.log(datosjson);


    /*
    fetch("post.php", {
        method: "POST", 
        headers: {
            "Content-Type": "application/JSON"
        },
        body: datosjson
    })

    .then( res => res.json())
    .then( data => {
        console.log(data) 
    })
*/


});




/* FIN LOGIN */

/* REGISTRO */
let formularioregistro = document.getElementById("formularioregistro");
formularioregistro.addEventListener('submit', function (h) {
    h.preventDefault();
    console.log("prueba de funcion");

    let datos = new FormData(formularioregistro);

    /* objeto con los datos del formulario */
    let objeto = {};
    datos.forEach((value, key) => objeto[key] = value);
    console.log(objeto);

    /* array del objeto anterior*/
    var objetoArray = Object.entries(objeto);
    console.log(objetoArray);

    /* pasar a string el json de objetos */
    let datosjson = JSON.stringify([objeto]);
    console.log(datosjson);

/*
    fetch("post.php", {
        method: "POST", 
        headers: {
            "Content-Type": "application/JSON"
        },
        body: datosjson
    })

    .then( res => res.json())
    .then( data => {
        console.log(data) 
    })
*/

});

/* FIN REGISTRO */

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

/* PUBLI 1*/
let publi1 = "http://localhost:8081/dameAnuncio";

fetch(publi1)
.then(function(res){
	return res.json();
})
.then(function(data){
    
	let body = '';
	data.forEach(function(d){
        body += `<tr><td><img src="http://localhost:8083/${d.src}"></tr></td>`;	
	});
			
    document.getElementById('publi1').innerHTML = body;

})


/* PUBLI 2 */
let publi2 = "http://localhost:8081/dameAnuncio";

fetch(publi2)
.then(function(res){
	return res.json();
})
.then(function(data){
    
	let body = '';
	data.forEach(function(d){
        body += `<tr><td><img src="http://localhost:8083/${d.src}"></tr></td>`;	
	});
			
    document.getElementById('publi2').innerHTML = body;

})


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
    document.getElementById('generaltenis').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";

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
    document.getElementById('generaltenis').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
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







/* LALIGA */

document.getElementById('generallaliga').style.display = "none";
let actuallaliga = document.getElementById("laliga");
let activarlaliga = actuallaliga.addEventListener('click', laliga);

function laliga() {
    document.getElementById('generaltenis').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "block";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";


    document.getElementById("hoylaliga").style.display = "block";
    document.getElementById("finalizadoslaliga").style.display = "none";
    document.getElementById("proximoslaliga").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "LaLiga") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventolaliga').innerHTML = body;
    }
}



function fetchEventoFinalizadolaliga() {

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
            if (dataevento[i].competicion == "LaLiga") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinlaliga').innerHTML = body;
    }
}

function fetchEventoProximolaliga() {

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
            if (dataevento[i].competicion == "LaLiga") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxlaliga').innerHTML = body;
    }
}

/* FIN LALIGA */


/* PREMIER */
document.getElementById('generalpremier').style.display = "none";
let actualprmeier = document.getElementById("premier");
let activarpremier = actualprmeier.addEventListener('click', premier);

function premier() {
    document.getElementById('generaltenis').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "block";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";


    document.getElementById("hoypremier").style.display = "block";
    document.getElementById("finalizadospremier").style.display = "none";
    document.getElementById("proximospremier").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "Premier League") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventopremier').innerHTML = body;
    }
}



function fetchEventoFinalizadopremier() {

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
            if (dataevento[i].competicion == "Premier League") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinpremier').innerHTML = body;
    }
}

function fetchEventoProximopremier() {

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
            if (dataevento[i].competicion == "Premier League") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxpremier').innerHTML = body;
    }
}


/* FIN PREMIER */


/* PRIMERA UY */

document.getElementById('generalprimerauy').style.display = "none";
let actualprimerauy = document.getElementById("primerauy");
let activarprimerauy = actualprimerauy.addEventListener('click', primerauy);

function primerauy() {
    document.getElementById('generaltenis').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "block";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";



    document.getElementById("hoyprimerauy").style.display = "block";
    document.getElementById("finalizadosprimerauyr").style.display = "none";
    document.getElementById("proximosprimerauy").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


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
        document.getElementById('dataeventoprimerauy').innerHTML = body;
    }
}



function fetchEventoFinalizadoprimerauy() {

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
            if (dataevento[i].competicion == "Primera division de Uruguay") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinprimerauy').innerHTML = body;
    }
}

function fetchEventoProximoprimerauy() {

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
        document.getElementById('dataeventoProxprimerauy').innerHTML = body;
    }
}

/* FIN PRIMERA UY */


/* PRIMERA ARG*/
document.getElementById('generalprimeraarg').style.display = "none";
let actualprimeraarg = document.getElementById("primeraarg");
let activarprimeraarg = actualprimeraarg.addEventListener('click', primeraARG);

function primeraARG() {
    document.getElementById('generaltenis').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "block";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";


    document.getElementById("hoyprimeraARG").style.display = "block";
    document.getElementById("finalizadosprimeraARG").style.display = "none";
    document.getElementById("proximosprimeraARG").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "Primera division de Argentina") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoprimeraARG').innerHTML = body;
    }
}



function fetchEventoFinalizadoprimeraARG() {

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
            if (dataevento[i].competicion == "Primera division de Argentina") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinprimeraARG').innerHTML = body;
    }
}

function fetchEventoProximoprimeraARG() {

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
            if (dataevento[i].competicion == "Primera division de Argentina") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxprimeraARG').innerHTML = body;
    }
}
/* FIN PRIMERA ARG*/



/* SERIE A */

document.getElementById('generalserieA').style.display = "none";
let actualserieA = document.getElementById("serieA");
let activarserieA = actualserieA.addEventListener('click', serieA);

function serieA() {

    document.getElementById('generaltenis').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "block";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyserieA").style.display = "block";
    document.getElementById("finalizadosserieA").style.display = "none";
    document.getElementById("proximosserieA").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "Serie A") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoserieA').innerHTML = body;
    }
}



function fetchEventoFinalizadoprimeraARG() {

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
            if (dataevento[i].competicion == "Serie A") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinserieA').innerHTML = body;
    }
}

function fetchEventoProximoprimeraARG() {

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
            if (dataevento[i].competicion == "Serie A") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxserieA').innerHTML = body;
    }
}
/* FIN SERIE A*/



/* TENIS */
document.getElementById('generaltenis').style.display = "none";
let actualtenis = document.getElementById("tenis");
let activartenis = actualtenis.addEventListener('click', tenis);

function tenis() {
    document.getElementById('generaltenis').style.display = "block";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyTenis").style.display = "block";
    document.getElementById("finalizadosTenis").style.display = "none";
    document.getElementById("proximosTenis").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].deporte == "tenis") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventotenis').innerHTML = body;
    }
}

function fetchEventoFinalizadotenis() {

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
            if (dataevento[i].deporte == "tenis") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFintenis').innerHTML = body;
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
            if (dataevento[i].deporte == "tenis") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxtenis').innerHTML = body;
    }
}

/* FIN TENIS */





/*NBA ESTE*/
document.getElementById('generalnbaeste').style.display = "none";
let actualnbaeste = document.getElementById("NBAeste");
let activarnbaeste = actualnbaeste.addEventListener('click', nbaeste);

function nbaeste() {
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "block";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generaltenis').style.display = "none";

    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyNBAeste").style.display = "block";
    document.getElementById("finalizadosNBAeste").style.display = "none";
    document.getElementById("proximosNBAeste").style.display = "none";



    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "NBA Este") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventonbaeste').innerHTML = body;
    }
}



function fetchEventoFinalizadoNBAESTE() {

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
            if (dataevento[i].competicion == "NBA Este") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinnbaeste').innerHTML = body;
    }
}

function fetchEventoProximoNBAESTE() {

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
            if (dataevento[i].competicion == "NBA Este") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxnbaeste').innerHTML = body;
    }
}
/*FIN NBA ESTE*/





/*NBA OESTE*/
document.getElementById('generalnbaoeste').style.display = "none";
let actualnbaoeste = document.getElementById("NBAoeste");
let activarnbaoeste = actualnbaoeste.addEventListener('click', nbaoeste);

function nbaoeste() {
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "block";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generaltenis').style.display = "none";

    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyNBAoeste").style.display = "block";
    document.getElementById("finalizadosNBAoeste").style.display = "none";
    document.getElementById("proximosNBAoeste").style.display = "none";




    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "NBA Oeste") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventonbaoeste').innerHTML = body;
    }
}



function fetchEventoFinalizadoNBAoESTE() {

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
            if (dataevento[i].competicion == "NBA Oeste") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinnbaoeste').innerHTML = body;
    }
}

function fetchEventoProximoNBAoESTE() {

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
            if (dataevento[i].competicion == "NBA Oeste") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxnbaoeste').innerHTML = body;
    }
}



/*FIN NBA OESTE*/

/*LUB*/
document.getElementById('generallub').style.display = "none";
let actuallub = document.getElementById("lub");
let activarlub = actuallub.addEventListener('click', LUB);

function LUB() {
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "block";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generaltenis').style.display = "none";

    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyLUB").style.display = "block";
    document.getElementById("finalizadosLUB").style.display = "none";
    document.getElementById("proximosLUB").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "LUB") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoLUB').innerHTML = body;
    }
}



function fetchEventoFinalizadoLUB() {

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
            if (dataevento[i].competicion == "LUB") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinLUB').innerHTML = body;
    }
}

function fetchEventoProximoLUB() {

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
            if (dataevento[i].competicion == "LUB") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxLUB').innerHTML = body;
    }
}
/*FIN LUB*/






 
/*us opem*/
document.getElementById('generalusopen').style.display = "none";
let actualusopen = document.getElementById("usopen");
let activarusopen = actualusopen.addEventListener('click', usopen);

function usopen() {
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "block";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generaltenis').style.display = "none";

    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyUSOPEN").style.display = "block";
    document.getElementById("finalizadosUSOPEN").style.display = "none";
    document.getElementById("proximosUSOPEN").style.display = "none";

    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "US Open") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventousopen').innerHTML = body;
    }
}



function fetchEventoFinalizadousopen() {

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
            if (dataevento[i].competicion == "US Open") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinusopen').innerHTML = body;
    }
}

function fetchEventoProximousopen() {

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
            if (dataevento[i].competicion == "US Open") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxUSOPEN').innerHTML = body;
    }
}
/*FIN us opem*/


/*Wimbledon*/
document.getElementById('generalwimbledon').style.display = "none";
let actualwimbledon = document.getElementById("wimble");
let activarwimbledon = actualwimbledon.addEventListener('click', wimbledon);

function wimbledon() {
    document.getElementById('generalwimbledon').style.display = "block";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generaltenis').style.display = "none";

    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyWimbledon").style.display = "block";
    document.getElementById("finalizadosWimbledon").style.display = "none";
    document.getElementById("proximosWimbledon").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "Wimbledon") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoWIMB').innerHTML = body;
    }
}



function fetchEventoFinalizadowimbledon() {

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
            if (dataevento[i].competicion == "Wimbledon") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinWIMB').innerHTML = body;
    }
}

function fetchEventoProximowimbledon() {

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
            if (dataevento[i].competicion == "Wimbledon") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxWIMB').innerHTML = body;
    }
}
/*FIN Wimbledon*/

/*Roland Garros*/
document.getElementById('generalroland').style.display = "none";
let actualroland = document.getElementById("roland");
let activarroland = actualroland.addEventListener('click', roland);

function roland() {
    document.getElementById('generalroland').style.display = "block";
    document.getElementById('generalAUS').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generaltenis').style.display = "none";

    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyRoland").style.display = "block";
    document.getElementById("finalizadosRoland").style.display = "none";
    document.getElementById("proximosRoland").style.display = "none";


    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "Roland-Garros") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoroland').innerHTML = body;
    }
}



function fetchEventoFinalizadoRolandGarros() {

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
            if (dataevento[i].competicion == "Roland-Garros") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinroland').innerHTML = body;
    }
}

function fetchEventoProximoRolandGarros() {

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
            if (dataevento[i].competicion == "Roland-Garros") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxroland').innerHTML = body;
    }
}
/*FIN Roland Garros*/

/*Austarlian Open*/
document.getElementById('generalAUS').style.display = "none";
let actualaus = document.getElementById("Ausopen");
let activaraus = actualaus.addEventListener('click', aus);

function aus() {
    document.getElementById('generalAUS').style.display = "block";
    document.getElementById('generalroland').style.display = "none";
    document.getElementById('generalusopen').style.display = "none";
    document.getElementById('generalwimbledon').style.display = "none";
    document.getElementById('generallub').style.display = "none";
    document.getElementById('generalnbaoeste').style.display = "none";
    document.getElementById('generalnbaeste').style.display = "none";
    document.getElementById('generalserieA').style.display = "none";
    document.getElementById('generalprimeraarg').style.display = "none";
    document.getElementById('generaltenis').style.display = "none";

    document.getElementById('generalprimerauy').style.display = "none";
    document.getElementById('generalpremier').style.display = "none";
    document.getElementById('generallaliga').style.display = "none";
    document.getElementById('generalbasket').style.display = "none";
    document.getElementById('general').style.display = "none";
    document.getElementById('generalfutbol').style.display = "none";

    document.getElementById("hoyAUSOPEN").style.display = "block";
    document.getElementById("finalizadosAUSOPEN").style.display = "none";
    document.getElementById("proximosAUSOPEN").style.display = "none";



    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].competicion == "Austarlian Open") {
                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoAUS').innerHTML = body;
    }
}



function fetchEventoFinalizadoaus() {

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
            if (dataevento[i].competicion == "Austarlian Open") {

                if (dataevento[i].fechaHora <= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoFinAUS').innerHTML = body;
    }
}

function fetchEventoProximoaus() {

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
            if (dataevento[i].competicion == "Austarlian Open") {
                if (dataevento[i].fechaHora >= fecha) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td><td data-bs-toggle="modal" data-bs-target="#exampleModalCenterDos" onclick="detalleEvento(${dataevento[i].idEvento})">Detalles</td></tr>`
                }
            }
        }
        document.getElementById('dataeventoProxrAUS').innerHTML = body;
    }
}
/*FIN Austarlian Open*/