<?php 
    require "../utils/autoload.php";

    Routes::AddView("/","inicio");
    Routes::AddView("/login","login");
    Routes::AddView("/usuario/altaUsuario","altaUsuario");
    Routes::AddView("/suscriptores", "gestionSuscriptor");
    Routes::AddView("/usuario/administradores", "gestionAdministrador");
    Routes::AddView("/gestionBanners", "gestionBanners"); 


    
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/usuario","post","SuscriptorControlador::Alta");
    Routes::Add("/usuario/bajaSuscriptor","post","SuscriptorControlador::Baja");
    Routes::Add("/usuario/altaAdmin", "post", "AdministradorControlador::Alta");
    Routes::Add("/usuario/bajaAdmin", "post", "AdministradorControlador::Eliminar");
    Routes::Add("/usuario/modificarAdmin", "post", "AdministradorControlador::Modificar");
    Routes::Add("/cerrarSesion","get","SesionControlador::CerrarSesion");
    Routes::Add("/altaBanners", "post", "BannersControlador::Alta");
    Routes::Add("/bajaBanners", "post", "BannersControlador::Eliminar");
    Routes::Add("/modificarBanners", "post", "BannersControlador::Modificar");

    Routes::Run();

       