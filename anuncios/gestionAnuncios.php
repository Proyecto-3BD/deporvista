<?php 
    require $_SERVER['DOCUMENT_ROOT'] ."/utils/autoload.php";
    if(!isset($_SESSION['autenticado']))
        header("Location: /loginAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <title>Bienvenido</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="admin.php" target="_blank">Hola <?= $_SESSION['nombre'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item active">
                    <a class="nav-link " href="gestionUsuarios.php">Usuarios</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="gestionAnuncios.php">Anuncios</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="gestionAdministrador.php">Administradores</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/cerrarAdmin.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-title">
                        <h3>Ingresar Anuncios</h3>
                    </div>
                    <div class="card-body">
                        <form action="cargarAnuncios.php" method="post" enctype="multipart/form-data">
                            <input type="radio" id="grande" name="tipo" value="grande">
                            <label for="grande">Anuncio Grande</label>
                            <input type="radio" id="chico" name="tipo" value="chico">
                            <label for="chico">Anuncio Chico</label><br>

                            <input type="file" name="file"><br>
                            <input type="submit" value="cargar Archivos">
                            <?php if(isset($_GET['ingresado'])  == 'true') :?>
                                    <div style='color: green;'>Anuncio ingresado</div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- div class="col-sm-6">
                <div class="card">modificar</div>
            </div -->
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="card-title">
                        <h3>Anuncios</h3>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th style="border: solid;">ID</th>
                                <th style="border: solid;">Tipo</th>
                                <th style="border: solid;">URL</th>
                            </tr>
                          
                            <?php
                                $anuncios = AnunciosControlador::Listar();
                                if($anuncios === "") :?>
                                    No hay anuncios ingresados
                            <?php 
                                else :?>
                                <?php foreach($anuncios as $fila) :?>
                            <tr>
                                <td style="border: solid;"> <?= $fila['id'] ?> </td> 
                                <td style="border: solid;"> <?= $fila['tipo'] ?> </td> 
                                <td style="border:solid;"> <?= $fila['ubicacion'] ?> </td>
                                <td style="border:solid;"> <a href="/eliminarAnuncio.php?id=<?= $fila['id'] ?>"><button>Eliminar</button></a> </td>
                                <td style="border:solid;"> <a href="/ServirAnuncio.php?id=<?= $fila['id'] ?>"><button>Publicar</button></a> </td>
                            </tr>
                                <?php endforeach ;?>
                            <?php endif ; ?>
                                 
                            <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] == 'true') :?>
                                    <div style='color: darkred;'>Anuncio eliminado</div>
                            <?php endif; ?>
                            <?php if(isset($_GET['publicado']) && $_GET['publicado'] == 'true') :?>
                                    <div style='color: green;'>Anuncio publicado</div>
                            <?php endif; ?>
                                    
                        </table>                     
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>