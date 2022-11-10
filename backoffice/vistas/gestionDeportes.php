<?php
        require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /login");
    }
    require 'templates/head.php'; ?>
    <div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alta Deportes</h5>
                <form action="/altaDeporte" method="post">
                    
                    <div class="form-group">
                        <input type="text"name="nombreDeporte">
                        <span>Deporte</span>
                    </div>
                    <div class="form-group">
                        <select name="tipoDeporte">
                            <option value="porPuntos">Por Puntos</option>
                            <option value="porTiempo">Por Tiempo</option>
                            <option value="porSets">Por Sets</option>
                        </select>
                        <span>Tipo de Deporte</span>
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
                <h5 class="card-title">Modificar Evento</h5>
                <form action="/modificarDeporte" method="post">
                    <div class="form-group">
                        <select name="idDeporte">
                        <?php
                            $deportes = DeporteControlador::Listar();
                            if($deportes == "") :?>
                                <option value="">No hay Deportes ingresados</option> 
                        <?php 
                                else :?>
                            <? foreach($deportes as $fila) :?>
                                
                                <option value="<?= $fila['idDeporte'] ?>">
                                    <?=$fila['idDeporte'] . " - "  . $fila['nombreDeporte']?> </option>
                            <? endforeach ;?>
                        <?php endif ; ?>
                        </select>
                        <span>Id - Deporte Ingresado</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="nombreDeporte">
                        <span>Nombre deporte</span>
                    </div>
                    <div class="form-group">
                        <select name="tipoDeporte">
                            <option value="porPuntos">Por Puntos</option>
                            <option value="porTiempos">Por Tiempos</option>
                            <option value="porSets">Por Sets</option>
                        </select>
                        <span>Tipo de Deporte</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Modificar</button>
                    <?php if(isset($parametros['modificado']) && $parametros['modificado'] == 'true') :?>
                                <div style='color: green;'>Evento Actualizado</div>
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
                <h5 class="card-title">Deportes</h5>

                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>nombreDeporte</th>
                        <th>Tipo de Deportes</th>
                        <th></th>
                    </tr>
                  
                    <?php
                        $deportes = DeporteControlador::Listar();
                        if($deportes == "") :?>
                            No hay Deportes ingresados
                    <?php 
                        else :?>
                        <? foreach($deportes as $fila) :?>
                            <tr>
                                <td> <?= $fila['idDeporte'] ?></td> 
                                <td> <?=$fila['nombreDeporte'] ?></td>
                                <td> <?=$fila['tipoDeporte'] ?></td>
                                <td> 
                                    <form action="/bajaDeporte" method="post">
                                       <button type="submit" name="idDeporte" value="<?= $fila['idDeporte'] ?>" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <? endforeach ;?>
                    <?php endif ; ?>
                         
                    <?php if(isset($parametros['eliminado']) && $parametros['eliminado'] == 'true') :?>
                            <div style='color: darkred;'>Evento eliminado</div>
                    <?php endif; ?>
                                    
                </table>

            </div>  
        </div>
    </div>
    </div>
</div>

