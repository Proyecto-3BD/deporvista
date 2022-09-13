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

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/">Deporvista</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/suscriptores">Suscriptores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contacto.php">Anuncios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contacto.php">Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/usuario/administradores">Administradores</a>
          </li>
        
          <?php if(isset($_SESSION['autenticado'])): ?>

                <li class="nav-item">
                    <a class="nav-link" href="cerrarSesion">Salir</a>
                </li>
            
          <?php endif; ?>
        </ul>
        
      </div>

    </nav>

    <main role="main" class="container">