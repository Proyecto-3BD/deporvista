<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /login");
    }
    require 'templates/head.php';     ?>

<div class="container-fluid">
    <div class="row">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ingreso de Datos</h5>
                <form action="altaAdmin" method="post">
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
                <form action="/modificarAdmin" method="post">
                    <div class="form-group">
                        <span>Id: </span>
                        <select name="idAdmin">
                            <?php
                                $administradores = AdministradorControlador::Listar();
                                if($administradores == "") :?>
                                    <option value="">No hay Administrador ingresadas</option>
                            <?php 
                                    else :?>
                                <? foreach($administradores as $fila) :?>
                                    
                                    <option value="<?= $fila['idAdmin'] ?>">
                                        <?= $fila['idAdmin']; ?> </option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
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
                <h5 class="card-title">Administradores</h5>

                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nombre de Usuario</th>
                        <th>Correo Electrónico</th>
                        <th></th>
                    </tr>
                  
                    <?php
                        $administradores = AdministradorControlador::Listar();
                        if($administradores == "") :?>
                            No hay administradores ingresados
                    <?php 
                        else :?>
                        <? foreach($administradores as $fila) :?>
                            <tr>
                                <td> <?= $fila['idAdmin'] ?></td> 
                                <td> <?=$fila['nombreAdmin'] ?></td>
                                <td> <?=$fila['email'] ?></td>
                                <td> 
                                    <form action="bajaAdmin" method="post">
                                        <button type="submit"  name="idAdmin" value="<?= $fila['idAdmin'] ?>" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <? endforeach ;?>
                    <?php endif ; ?>
                         
                    <?php if(isset($parametros['eliminado']) && $parametros['eliminado'] == 'true') :?>
                            <div style='color: darkred;'>Administrador eliminado</div>
                    <?php endif; ?>
                                    
                </table>

            </div>  
        </div>
    </div>