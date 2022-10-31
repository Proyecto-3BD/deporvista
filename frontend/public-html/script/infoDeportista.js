let url = "http://localhost:8084/deportistas";
        fetch(url)
            .then(response => response.json())
            .then(datadeportistas => mostrarData(datadeportistas))
            .catch(error => console.log(error))


            const mostrarData = (datadeportistas) => {
                console.log(datadeportistas)
                let body = ''
                for (let i = 0; i < datadeportistas.length; i++) {
                    body += `<tr><td>${datadeportistas[i].idDeportista /*match llave de json*/}</td><td>${datadeportistas[i].nombre}</td><td>${datadeportistas[i].apellidos}</td><td>${datadeportistas[i].rol}</td><td>${datadeportistas[i].pais}</td></tr>`
                }
                document.getElementById('datadeportistas').innerHTML = body;
}

function fetchEvento() {

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
}

function fetchEventoFinalizado() {

    let url = "http://localhost:8084/eventos";
    fetch(url)
        .then(response => response.json())
        .then(dataevento => mostrarData(dataevento))
        .catch(error => console.log(error))


    const mostrarData = (dataevento) => {


        dataevento = dataevento.sort((a, b) => {
            if (a.fechaHora < b.fechaHora) {
                return 1;
            }
        });

        
        console.log(dataevento);



        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].resultado}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td></tr>`
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
        console.log(dataevento)
        let body = ''
        for (let i = 0; i < dataevento.length; i++) {
            body += `<tr><td>${dataevento[i].fechaHora}</td><td>${dataevento[i].infracciones}</td><td>${dataevento[i].ubicacion}</td></tr>`
        }
        document.getElementById('dataeventoProx').innerHTML = body;
    }
}