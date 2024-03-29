<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /login");
    }
    require 'templates/head.php'; 
    ?>
    
<div class='container-fluid'>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alta de Banner</h5>
                <form action="/altaBanners" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <small class="form-text text-muted">Agregue Id para modificar</small>
                        <input type="text" placeholder="Id" name="idBanner">
                    </div>
                    <div>
                        <select name="publicado">
                            <option value="1">Publicar</option>
                            <option value="0">No publicar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" placeholder="Subir Archivo" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Cargar Archivo</button>
                        <?php if(isset($parametros['ingresado']) && $parametros['ingresado'] == 'true') :?>
                                <div style='color: green;'>Anuncio ingresado</div>
                        <?php elseif (isset($parametros['error']) && $parametros['error'] == 'true')  :?>
                                <div style='color: red;'>Seleccione archivo</div>
                        <?php endif; ?>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modificar</h5>
                <form action="/modificarBanners" method="post">
                    <div class="form-group">
                        <span>Id: </span>
                        <select name="idBanner">
                            <?php
                                $banners = BannersControlador::Listar();
                                if($banners == "") :?>
                                    <option value="">No hay Anuncios ingresadas</option>
                            <?php 
                                    else :?>
                                <? foreach($banners as $fila) :?>
                                    
                                    <option value="<?= $fila['idBanner'] ?>">
                                        <?= $fila['idBanner']; ?> </option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <select name="publicado">
                            <option value=1>Publicar</option>
                            <option value=0>No publicar</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cargar Archivo</button>
                        <?php if(isset($parametros['modificado']) && $parametros['modificado'] == 'true') :?>
                                <div style='color: green;'>Anuncio modificado</div>
                        <?php elseif (isset($parametros['errorModificado']) && $parametros['errorModificado'] == 'true')  :?>
                                <div style='color: red;'>Ingrese ID de Banner</div>
                        <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Banners</h5>

                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Ruta</th>
                        <th>Publicado</th>
                        <th></th>
                    </tr>
                  
                    <?php
                        $banner = BannersControlador::Listar();
                        if($banner === "") :?>
                            No hay banner ingresados
                    <?php 
                        else :?>
                        <? foreach($banner as $fila) :?>
                            <tr>
                                <td><?= $fila['idBanner'] ?></td>                                 
                                <td><?=$fila['src'] ?></td>
                                <td><?=$fila['publicado'] ?></td>
                                <td> 
                                    <form action="/bajaBanners" method="post">
                                    <button type="submit" name="idBanner" value="<?= $fila['idBanner'] ?> "  class="btn btn-primary">Eliminar</button>
                                    </form>
                                </td>
                            </tr>                                          
                        <? endforeach ;?>
                    <?php endif ; ?>
                         
                    <?php if(isset($parametros['eliminado']) && $parametros['eliminado'] == 'true') :?>
                            <div style='color: darkred;'>Banner eliminado</div>
                    <?php endif; ?>
                                    
                </table>
            </div>  
        </div>
    </div>  
    <?php require 'templates/foot.php'; ?>