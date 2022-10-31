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
