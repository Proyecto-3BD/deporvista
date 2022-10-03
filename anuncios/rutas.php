<?php 
    require "../utils/autoload.php";

    Routes::Add('/dameAnuncio', 'get', "PublicidadControlador::EnviarPublicidad");
    
    Routes::Run();

       