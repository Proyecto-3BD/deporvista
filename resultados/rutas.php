<?php 
    require "../utils/autoload.php";

    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/usuario","post","SuscriptorControlador::Alta");
    Routes::Add("/usuario","get","SuscriptorControlador::Listar");
    Routes::Add("/infoDeportista", "post", "InformacionDeportistaControlador::ListarDeportistaEquipo");
    Routes::Add('/eventos', 'get', 'EventoControlador::Listar');
    Routes::Add('/deportistas', 'get', 'DeportistaControlador::Listar');
    Routes::Add('/competiciones', 'get', 'CompeticionesControlador::Listar');
    Routes::Add('/equipos', 'get', 'EquipoControlador::Listar');

    Routes::Run();

       