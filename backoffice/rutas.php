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
    Routes::AddView("/gestionDeportes", "gestionDeportes");
    Routes::AddView("/gestionEquipos", "gestionEquipos");
    Routes::AddView("/gestionDeportistas", "gestionDeportistas");
    
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/cerrarSesion","get","SesionControlador::CerrarSesion");

    Routes::Add("/altaSuscriptor","post","SuscriptorControlador::Alta");
    Routes::Add("/bajaSuscriptor","post","SuscriptorControlador::Eliminar");
    Routes::Add("/modificarSuscriptor","post","SuscriptorControlador::Modificar");
    Routes::Add("/altaAdmin", "post", "AdministradorControlador::Alta");
    Routes::Add("/bajaAdmin", "post", "AdministradorControlador::Eliminar");
    Routes::Add("/modificarAdmin", "post", "AdministradorControlador::Modificar");
    Routes::Add("/altaBanners", "post", "BannersControlador::Alta");
    Routes::Add("/bajaBanners", "post", "BannersControlador::Eliminar");
    Routes::Add("/modificarBanners", "post", "BannersControlador::Modificar");
    Routes::Add("/altaCompeticion", "post", "CompeticionesControlador::Alta");
    Routes::Add("/bajaCompeticion", "post", "CompeticionesControlador::Eliminar");
    Routes::Add("/modificarCompeticion", "post", "CompeticionesControlador::Modificar");

    Routes::Add("/eventos", "get", "EventoControlador::Listar");

    Routes::Add("/altaEvento", "post", "EventoControlador::AltaEvento");
    Routes::Add("/modificarEvento", "post", "EventoControlador::Modificar");
    Routes::Add("/bajaEvento", "post", "EventoControlador::Eliminar");

    Routes::Add("/altaDeporte", "post", "DeporteControlador::Alta");
    Routes::Add("/modificarDeporte", "post", "DeporteControlador::Modificar");
    Routes::Add("/bajaDeporte", "post", "DeporteControlador::Eliminar");

    Routes::Add("/altaEquipo", "post", "EquipoControlador::Alta");
    Routes::Add("/modificarEquipo", "post", "EquipoControlador::Modificar");
    Routes::Add("/bajaEquipo", "post", "EquipoControlador::Eliminar");

    Routes::Add("/altaDeportista", "post", "DeportistaControlador::Alta");
    Routes::Add("/modificarDeportista", "post", "DeportistaControlador::Modificar");
    Routes::Add("/bajaDeportista", "post", "DeportistaControlador::Eliminar");

    Routes::Run();

       