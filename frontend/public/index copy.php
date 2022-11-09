<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
        crossorigin="anonymous"></script>
    <script src="script/script.js">
    </script>
    <title>Entrega</title>
</head>

<body>
    <header>
        <nav>
            <div class="nav-color">
                <div class="nav-uno contenedor">
                    <div class="logo">
                        <img src="img/logo.png" alt="Logo">
                    </div>
                    <div class="nav-uno-concetar">
                        <div>
                            <input type="text" placeholder="Buscar">
                        </div>
                        <div class="iniciar-sesion">
                            <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter"
                                onclick="inicio()">Conectar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-dos">
                <div class="lista-nav">
                    <ul>
                        <li>
                            <a href="">Deporte</a>
                        </li>
                        <li>
                            <a href="">Deporte</a>
                        </li>
                        <li>
                            <a href="">Deporte</a>
                        </li>
                        <li>
                            <a href="">Deporte</a>
                        </li>
                        <li>
                            <a href="">Deporte</a>
                        </li>

                    </ul>


                </div>
                <div class="dropdown drop">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false" onclick="drop()">
                        Todos los deportes
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Deporte</a></li>
                        <li><a class="dropdown-item" href="#">Deporte</a></li>
                        <li><a class="dropdown-item" href="#">Deporte</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-contenido">
                        <div class="modal-estatico">
                            <p>Descripcion de suscripción</p>
                            <p>Descripcioón de precios</p>
                        </div>
                        <div class="modal-form">
                            <div class="cabecera-modal">
                                <div class="cerrar">
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="cabecera-form">
                                    <p id="inicio-p" onclick="inicio()">Ingresar</p>
                                    <p id="registro-p" onclick="registro()">Suscripción</p>
                                </div>
                            </div>
                            <div id="conect" class="conect">
                                <form>
                                    <input type="text" placeholder="Nombre" id="fname" name="fname"><br>
                                    <input type="text" placeholder="Password" id="lname" name="lname">
                                    <button>Iniciar Sesión</button>

                                </form>
                            </div>
                            <div id="registro" class="registro">
                                <form>
                                    <input type="text" placeholder="Mail" id="lname" name="lname">
                                    <input type="text" placeholder="Nombre" id="lname" name="lname">
                                    <input type="text" placeholder="Apellido" id="lname" name="lname">
                                    <input type="text" placeholder="Usuarios" id="lname" name="lname">
                                    <input type="text" placeholder="Telefono" id="lname" name="lname">
                                    <input type="text" placeholder="Metodo de pago" id="lname" name="lname">
                                    <button>Suscribirse</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>



</html>