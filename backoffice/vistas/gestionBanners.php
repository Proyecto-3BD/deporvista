<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /loginAdmin");
    }
    require 'templates/head.php'; ?>

    <div class="row">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alta de Banner</h5>
                <form action="/banners/alta" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <small class="form-text text-muted">Agregue Id para modificar</small>
                        <input type="text" placeholder="Id" name="idBanner">
                    </div>
                    
                    <div class="form-group">
                        <input type="file" placeholder="Subir Archivo" name="file">
                    </div>
                  
                  <button type="submit" class="btn btn-primary">Cargar Archivo</button>
                </form>
            </div>
        </div>







        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Banners</h5>

                <table class="table table-striped">
                    <tr>
                        <th style="">Id</th>
                        <th style="">Ruta</th>
                        <th style="">Publicado</th>
                        <th style=""></th>
                    </tr>
                  
                    <?php
                        $banner = BannersControlador::Listar();
                        if($banner === "") :?>
                            No hay banner ingresados
                    <?php 
                        else :?>
                        <? foreach($banner as $fila) :?>
                            <tr>
                                <td style=""> <?= $fila['idBanner'] ?></td> 
                                <td style=""> <?=$fila['src'] ?></td>
                                <td style=""> <?=$fila['publicado'] ?></td>
                                <td style=""> 
                                    <form action="/usuario/bajaAdmin" method="post">
                                        <input type="button" value="Borrar" name="<?= $fila['idUsuario'] ?>" />
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ;?>
                    <?php endif ; ?>
                         
                    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] == 'true') :?>
                            <div style='color: darkred;'>Administrador eliminado</div>
                    <?php endif; ?>
                                    
                </table>

            </div>  
        </div>
    </div>  