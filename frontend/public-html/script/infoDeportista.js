let url = "http://localhost:8084/resultados";
fetch(url)
    .then(response => response.json())
    .then(dataevento => mostrarData(dataevento))
    .catch(error => console.log(error))

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


const mostrarData = (dataevento) => {
    console.log(dataevento)
    let body = ''
    for (let i = 0; i < dataevento.length; i++) {
        if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

            body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td></tr>`
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


        let date = new Date();
        let fecha =
            date.getFullYear() + "-" +
            ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
            ("00" + date.getDate()).slice(-2) + " " +

            ("00" + date.getHours()).slice(-2) + ":" +
            ("00" + date.getMinutes()).slice(-2) + ":" +
            ("00" + date.getSeconds()).slice(-2);
        console.log(fecha);

        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        dataevento.reverse();


        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].fechaHora <= fecha) {

                body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td></tr>`
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

        let date = new Date();
        let fecha =
            date.getFullYear() + "-" +
            ("00" + (date.getMonth() + 1)).slice(-2) + "-" +
            ("00" + date.getDate()).slice(-2) + " " +

            ("00" + date.getHours()).slice(-2) + ":" +
            ("00" + date.getMinutes()).slice(-2) + ":" +
            ("00" + date.getSeconds()).slice(-2);
        console.log(fecha);


        dataevento.sort((a, b) => parseFloat(a.fechaHora) - parseFloat(b.fechaHora));
        console.log(dataevento);


        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            if (dataevento[i].fechaHora >= fecha) {

                body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td></tr>`
            }
        }
        document.getElementById('dataeventoProx').innerHTML = body;
    }
}




/* probando BASKET */

/* PRUEBA */
let basket = document.getElementById('barraResultados');
let htmlCode = '<ul id="barraBasket"><li><a onclick="directo(); basket()" >Hoy</a></li><li><a onclick="finalizado()">Finalizados</a></li><li><a onclick="proximo()">Proximos</a></li></ul>';
basket.insertAdjacentHTML('beforebegin', htmlCode);
document.getElementById('barraResultados').style.display = "none";
/* FIN PRUEBA */


function basket() {
    let url = "http://localhost:8084/resultados";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))

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



    


    const mostrarData = (dataevento) => {
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {

            if (dataevento[i].deporte == "basketball") {

                if (dataevento[i].fechaHora > principioDia && dataevento[i].fechaHora < finDia) {

                    body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].locatario}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].visitante}</td><td>${dataevento[i].ubicacion}</td></tr>`
                }
            }
        }
        document.getElementById('dataevento').innerHTML = body;
    }
}