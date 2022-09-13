<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /loginAdmin");
    }
    require 'templates/head.php'; ?>

    <div class="row">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Ingreso de Datos</h5>
                <form action="/usuario/altaAdmin" method="post">
                    <div class="form-group">
                        <small class="form-text text-muted">Agregue Id para modificar</small>
                        <input type="text" placeholder="Id" name="idUsuario">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" placeholder="Nombre de Usuario" name="nombreUsuario">
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder="E-mail" name="email">
                    </div>
                    
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password">
                    </div>
                  
                  <button type="submit" class="btn btn-primary">Alta Administrador</button>
                </form>
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
                        if($administradores === "") :?>
                            No hay administradores ingresados
                    <?php 
                        else :?>
                        <? foreach($administradores as $fila) :?>
                            <tr>
                                <td style=""> <?= $fila['idUsuario'] ?></td> 
                                <td style=""> <?=$fila['nombreUsuario'] ?></td>
                                <td style=""> <?=$fila['email'] ?></td>
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