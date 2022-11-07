<?php
	    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /login");
    }
    require 'templates/head.php';
    require 'templates/sidebar.php'; ?>
    <div class="content">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alta Competiciones</h5>
                <form action="/altaCompeticion" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="Competición" name="nombreCompeticion">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="País" name="paisCompeticion">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Año" name="anio">
                    </div>
                    <button type="submit" class="btn btn-primary">Alta</button>
                    <?php if(isset($parametros['ingresado']) && $parametros['ingresado'] == 'true') :?>
                                <div style='color: green;'>Alta Exitosa</div>
                    <?php elseif (isset($parametros['error']) && $parametros['error'] == 'true')  :?>
                                <div style='color: red;'>Error en el Ingreso</div>
                    <?php endif; ?>
                </form>
            </div>
            
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modificar Competición</h5>
                <form action="/usuario/modificarSuscriptor" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="Id" name="idCompeticion">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Competicion" name="nombreCompeticion">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="País" name="paisCompeticion">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Año" name="anio">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Modificar</button>
                    <?php if(isset($parametros['modificado']) && $parametros['modificado'] == 'true') :?>
                                <div style='color: green;'>Competición Actualizada</div>
                    <?php elseif (isset($parametros['errorModificado']) && $parametros['errorModificado'] == 'true')  :?>
                                <div style='color: red;'>Error en el Ingreso</div>
                    <?php endif; ?>
                </form>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Suscriptores</h5>

                <table class="table table-striped">
                    <tr>
                        <th style="">Id</th>
                        <th style="">Nombre</th>
                        <th style="">País</th>
                        <th style="">Año</th>
                    </tr>
                  
                    <?php
                        $competiciones = CompeticionesControlador::Listar();
                        if($competiciones === "") :?>
                            No hay competiciones ingresados
                    <?php 
                        else :?>
                        <? foreach($competiciones as $fila) :?>
                            <tr>
                                <td style=""> <?= $fila['idCompeticion'] ?></td> 
                                <td style=""> <?=$fila['nombreCompeticion'] ?></td>
                                <td style=""> <?=$fila['paisCompeticion'] ?></td>
                                <td style=""> <?=$fila['anio'] ?></td>
                                <td style=""> 
                                    <form action="/bajaCompeticion" method="post">
                                        <input type="radio" name="idSuscriptor" value="<?= $fila['idCompeticion'] ?>">
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <? endforeach ;?>
                    <?php endif ; ?>
                         
                    <?php if(isset($parametros['eliminado']) && $parametros['eliminado'] == 'true') :?>
                            <div style='color: darkred;'>Competición eliminada</div>
                    <?php endif; ?>
                                    
                </table>

            </div>  
        </div>
    </div>
    </div>
</div>

