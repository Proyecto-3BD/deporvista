let url = "http://localhost:8084/deportistas";
        fetch(url)
            .then(response => response.json())
            .then(datadeportistas => mostrarData(datadeportistas))
            .catch(error => console.log(error))


            const mostrarData = (datadeportistas) => {
                console.log(datadeportistas)
                let body = ''
                for (let i = 0; i < data.length; i++) {
                    body += `<tr><td>${datadeportistas[i].idDeportista /*match llave de json*/}</td><td>${datadeportistas[i].nombre}</td><td>${datadeportistas[i].apellidos}</td><td>${datadeportistas[i].rol}</td><td>${datadeportistas[i].pais}</td></tr>`
                }
                document.getElementById('datadeportistas').innerHTML = body;
}
