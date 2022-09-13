<?php 
    require "../utils/autoload.php";

    Routes::AddView("/","inicio");
    Routes::AddView("/login","login");
    Routes::AddView("/usuario/altaUsuario","altaUsuario");
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/usuario/altaUsuario","post","UsuarioControlador::Alta");
    Routes::Add("/cerrarSesion","get","SesionControlador::CerrarSesion");    
    
    Routes::Run();
