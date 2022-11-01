let url = "http://localhost:8084/eventos";
fetch(url)
    .then(response => response.json())
    .then(dataevento => mostrarData(dataevento))
    .catch(error => console.log(error))


const mostrarData = (dataevento) => {
    console.log(dataevento)
    let body = ''
    for (let i = 0; i < dataevento.length; i++) {
        body += `<tr><td>${dataevento[i].idEvento}</td><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td></tr>`
    }
    document.getElementById('dataevento').innerHTML = body;
}


function fetchEventoFinalizado() {

    let url = "http://localhost:8084/eventos";
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

                body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td></tr>`
            }
        }
        document.getElementById('dataeventoFin').innerHTML = body;
    }
}

function fetchEventoProximo() {

    let url = "http://localhost:8084/eventos";
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

                body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td></tr>`
            }
        }
        document.getElementById('dataeventoProx').innerHTML = body;
    }
}