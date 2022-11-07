<?php 
    require "../utils/autoload.php";

    Routes::AddView("/","inicio");
    Routes::AddView("/login","login");
    Routes::AddView("/usuario/altaUsuario","altaUsuario");
    Routes::AddView("/suscriptores", "gestionSuscriptor");
    Routes::AddView("/gestionAdministradores", "gestionAdministrador");
    Routes::AddView("/gestionBanners", "gestionBanners");
    Routes::AddView("/gestionCompeticiones", "gestionCompeticiones");
    Routes::AddView("/gestionEventos", "gestionEventos");
    
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/cerrarSesion","get","SesionControlador::CerrarSesion");

    Routes::Add("/usuario/altaSuscriptor","post","SuscriptorControlador::Alta");
    Routes::Add("/usuario/bajaSuscriptor","post","SuscriptorControlador::Eliminar");
    Routes::Add("/usuario/modificarSuscriptor","post","SuscriptorControlador::Modificar");
    Routes::Add("/usuario/altaAdmin", "post", "AdministradorControlador::Alta");
    Routes::Add("/usuario/bajaAdmin", "post", "AdministradorControlador::Eliminar");
    Routes::Add("/usuario/modificarAdmin", "post", "AdministradorControlador::Modificar");
    Routes::Add("/altaBanners", "post", "BannersControlador::Alta");
    Routes::Add("/bajaBanners", "post", "BannersControlador::Eliminar");
    Routes::Add("/modificarBanners", "post", "BannersControlador::Modificar");
    Routes::Add("/altaCompeticion", "post", "CompeticionesControlador::Alta");
    Routes::Add("/altaEvento", "post", "EventoControlador::Alta");


    Routes::Run();

       