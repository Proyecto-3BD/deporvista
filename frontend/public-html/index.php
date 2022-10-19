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

    <div class="main">
        <div class="publi-uno">
            <p>publi</p>
        </div>
        <aside class="sidebar">
            <div class="contenido-side">
                <div>
                    <p>Ligas</p>
                    <ul>
                        <li><a href="">Tab 1</a></li>
                        <li><a href="">Tab 1</a></li>
                        <li><a href="">Tab 1</a></li>
                    </ul>
                </div>
                <div>
                    <p>Favoritos</p>
                    <ul>
                        <li><a href="">Tab 1</a></li>
                        <li><a href="">Tab 1</a></li>
                        <li><a href="">Tab 1</a></li>
                    </ul>
                </div>
                <div>
                    <p>Paises</p>
                    <ul>
                        <li><a href="">Tab 1</a></li>
                        <li><a href="">Tab 1</a></li>
                        <li><a href="">Tab 1</a></li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="resultados">

            <div class="resultados-div-exterior">
                <ul>
                    <li>
                        <a href="">Todos</a>
                    </li>
                    <li>
                        <a href="">En directo</a>
                    </li>
                    <li>
                        <a href="">Finalizados</a>
                    </li>
                    <li>
                        <a href="">Proximos</a>
                    </li>
                    <li>
                        <a href="">Fecha</a>
                    </li>
                </ul>
                <div class="resultados-div-interior">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button onclick="changecolor()" class="accordion-button" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Pais: Liga o campeonato
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="hora">
                                        <p>21:30</p>
                                    </div>
                                    <div class="equipos">
                                        <p>Equipo X</p>
                                        <p>Equipo Y</p>
                                    </div>
                                    <div class="tantos">
                                        <p>-</p>
                                        <p>-</p>
                                    </div>
                                    <div class="accion">
                                        <button>Seguir</button>
                                        <button>Ver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    Pais: Liga o campeonato
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <div class="hora">
                                        <p>21:30</p>
                                    </div>
                                    <div class="equipos">
                                        <p>Equipo X</p>
                                        <p>Equipo Y</p>
                                    </div>
                                    <div class="tantos">
                                        <p>-</p>
                                        <p>-</p>
                                    </div>
                                    <div class="accion">
                                        <button>Seguir</button>
                                        <button>Ver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    Pais: Liga o campeonato
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <div class="hora">
                                        <p>21:30</p>
                                    </div>
                                    <div class="equipos">
                                        <p>Equipo X</p>
                                        <p>Equipo Y</p>
                                    </div>
                                    <div class="tantos">
                                        <p>-</p>
                                        <p>-</p>
                                    </div>
                                    <div class="accion">
                                        <button>Seguir</button>
                                        <button>Ver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseFour">
                                    Pais: Liga o campeonato
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">
                                    <div class="hora">
                                        <p>21:30</p>
                                    </div>
                                    <div class="equipos">
                                        <p>Equipo X</p>
                                        <p>Equipo Y</p>
                                    </div>
                                    <div class="tantos">
                                        <p>-</p>
                                        <p>-</p>
                                    </div>
                                    <div class="accion">
                                        <button>Seguir</button>
                                        <button>Ver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="publi-dos">
            <p>publi</p>

        </div>
    </div>
</body>



</html>