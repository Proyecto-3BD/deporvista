<?php 

    spl_autoload_register(function ($clase){
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/modelos/$clase.class.php"))
            require $_SERVER['DOCUMENT_ROOT'] . "/modelos/$clase.class.php";
    
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/controladores/$clase.class.php")){
            require $_SERVER['DOCUMENT_ROOT'] . "/controladores/$clase.class.php";
        }
        
    });

    require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
    session_start();
