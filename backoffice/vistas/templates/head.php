<?php 
    require "../utils/autoload.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Teiku Codewar">

    <title>Administrador Deporvista</title>

    <link rel="canonical" href="index.html">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
  </head>

  <body>
    <div >
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="/">Deporvista</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/suscriptores">Suscriptores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gestionBanners">Anuncios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gestionEventos">Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gestionCompeticiones">Competiciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gestionDeportes">Deportes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gestionEquipos">Equipos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gestionDeportistas">Deportistas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gestionAdministradores">Administradores</a>
          </li>
        
          <?php if(isset($_SESSION['autenticado'])): ?>

                <li class="nav-item">
                    <a class="nav-link" href="/cerrarSesion">Salir</a>
                </li>
            
          <?php endif; ?>
        </ul>
        
      </div>

    </nav>