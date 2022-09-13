<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /loginAdmin");
    }
    require 'templates/head.php';

    

        
   