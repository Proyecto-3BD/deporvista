<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /login");
    }
    require 'templates/head.php'; ?>

    <div class="row">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Ingreso de Datos</h5>
                
                <form action="/usuario/altaAdmin" method="post">
                    <!--<div class="form-group">
                        <small class="form-text text-muted">Agregue Id para modificar</small>
                        <input type="text" placeholder="Id" name="idAdmin">
                    </div>-->
                    
                    <div class="form-group">
                        <input type="text" placeholder="Nombre de Usuario" name="nombreAdmin">
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder="E-mail" name="email">
                    </div>
                    
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password">
                    </div>
                  
                  <button type="submit" class="btn btn-primary">Alta Administrador</button>
                    <?php if(isset($parametros['ingresado']) && $parametros['ingresado'] == 'true') :?>
                                <div style='color: green;'>Anuncio ingresado</div>
                    <?php elseif (isset($parametros['error']) && $parametros['error'] == 'true')  :?>
                                <div style='color: red;'>Error en el Ingreso</div>
                    <?php endif; ?>
                </form>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modificar</h5>
                <form action="/usuario/modificarAdmin" method="post">
                    <div class="form-group">
                        <small class="form-text text-muted">Agregue Id para modificar</small>
                        <input type="text" placeholder="Id" name="idAdmin">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" placeholder="Nombre de Usuario" name="nombreAdmin">
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder="E-mail" name="email">
                    </div>
                    
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password">
                    </div>
                  
                  <button type="submit" class="btn btn-primary">Modificar Administrador</button>
                    <?php if(isset($parametros['modificado']) && $parametros['modificado'] == 'true') :?>
                                <div style='color: green;'>Administrador modificado</div>
                    <?php elseif (isset($parametros['errorModificado']) && $parametros['errorModificado'] == 'true')  :?>
                                <div style='color: red;'>Error en el Ingreso</div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Aministradores</h5>

                <table class="table table-striped">
                    <tr>
                        <th style="">Id</th>
                        <th style="">Nombre de Usuario</th>
                        <th style="">Correo Electrónico</th>
                        <th style=""></th>
                    </tr>
                  
                    <?php
                        $administradores = AdministradorControlador::Listar();
                        if($administradores == "") :?>
                            No hay administradores ingresados
                    <?php 
                        else :?>
                        <? foreach($administradores as $fila) :?>
                            <tr>
                                <td style=""> <?= $fila['idAdmin'] ?></td> 
                                <td style=""> <?=$fila['nombreAdmin'] ?></td>
                                <td style=""> <?=$fila['email'] ?></td>
                                <td style=""> 
                                    <form action="/usuario/bajaAdmin" method="post">
                                        <input type="radio" name="idAdmin" value="<?= $fila['idAdmin'] ?>">
                                        <button type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ;?>
                    <?php endif ; ?>
                         
                    <?php if(isset($parametros['eliminado']) && $parametros['eliminado'] == 'true') :?>
                            <div style='color: darkred;'>Administrador eliminado</div>
                    <?php endif; ?>
                                    
                </table>

            </div>  
        </div>
    </div>  