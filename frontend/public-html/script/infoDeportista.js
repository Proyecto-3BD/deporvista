let url = "http://localhost:8084/deportistas";
        fetch(url)
            .then(response => response.json())
            .then(data => mostrarData(data))
            .catch(error => console.log(error))


            const mostrarData = (data) => {
                console.log(data)
                let body = ''
                for (let i = 0; i < data.length; i++) {
                    body += `<tr><td>${data[i].idDeportista /*match llave de json*/}</td><td>${data[i].nombre}</td><td>${data[i].apellidos}</td><td>${data[i].rol}</td><td>${data[i].pais}</td></tr>`
                }
                document.getElementById('data-deportistas').innerHTML = body;
}
