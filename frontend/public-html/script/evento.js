let url = "http://localhost:8084/eventos";
        fetch(url)
            .then(response => response.json())
            .then(data => mostrarData(data))
            .catch(error => console.log(error))


            const mostrarData = (data) => {
                console.log(data)
                let body = ''
                for (let i = 0; i < data.length; i++) {
                    body += `<tr><td>${data[i].idEvento /*match llave de json*/}</td><td>${data[i].fechaHora}</td><td>${data[i].resultado}</td><td>${data[i].infracciones}</td><td>${data[i].ubicacion}</td></tr>`
                }
                document.getElementById('data-finalizados').innerHTML = body;
}
