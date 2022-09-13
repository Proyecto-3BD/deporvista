<?php 
    require "../utils/autoload.php";

    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/loginAdmin", "post", "AdministradorControlador::Autenticar");
    Routes::Add("/usuario","post","SuscriptorControlador::Alta");
    Routes::Add("/usuario","get","SuscriptorControlador::Listar");
    Routes::Run();

       