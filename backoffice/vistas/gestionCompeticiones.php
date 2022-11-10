<?php
	    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /login");
    }
    require 'templates/head.php'; ?>
    <div class='container-fluid'>
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
                <form action="/modificarCompeticion" method="post">
                    <div class="form-group">
                        <span>Id: </span>
                        <select name="idCompeticion">
                            <?php
                                $competiciones = CompeticionesControlador::Listar();
                                if($competiciones == "") :?>
                                    <option value="">No hay Competiciones ingresadas</option>
                            <?php 
                                    else :?>
                                <? foreach($competiciones as $fila) :?>
                                    <option value="<?= $fila['idCompeticion'] ?>">
                                        <?= $fila['idCompeticion']; ?> </option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
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
                <h5 class="card-title">Competiciones</h5>

                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>País</th>
                        <th>Año</th>
                        <th></th>
                    </tr>
                  
                    <?php
                        $competiciones = CompeticionesControlador::Listar();
                        if($competiciones === "") :?>
                            No hay competiciones ingresados
                    <?php 
                        else :?>
                        <? foreach($competiciones as $fila) :?>
                            <tr>
                                <td> <?= $fila['idCompeticion'] ?></td> 
                                <td> <?=$fila['nombreCompeticion'] ?></td>
                                <td> <?=$fila['paisCompeticion'] ?></td>
                                <td> <?=$fila['anio'] ?></td>
                                <td> 
                                    <form action="/bajaCompeticion" method="post">
                                        <button type="submit" name="idCompeticion" value="<?= $fila['idCompeticion'] ?>" class="btn btn-primary">Eliminar</button>
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

