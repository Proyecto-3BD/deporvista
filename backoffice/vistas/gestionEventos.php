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
                <h5 class="card-title">Alta Eventos</h5>
                <form action="/altaEvento" method="post">
                    <div class="form-group">
                        <input type="datetime-local" placeholder="" name="fechaHora">
                        <span>Fecha, Hora</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="resultado">
                        <span>Resultado</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="infracciones">
                        <span>Infracciones</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="ubicacion">
                        <span>Ubicacion</span>
                    </div>
                    <div class="form-group">
                        <select name="idLocatario">
                            <?php
                                $equipos = EquipoControlador::Listar();
                                
                                if($equipos == "") :?>
                                    <option value="">No hay Equipos ingresadas</option>
                            <?php 
                                else :?>
                                <? foreach($equipos as $fila) :?>
                                    
                                    <option value="<?= $fila['idEquipo'] ?>">
                                        <?=$fila['nombreEquipo'] ?> </option>
                                <? endforeach ;?>
                            <?php endif ;?>
                        </select>
                        <span>Locatario</span> 
                    </div>
                    <div class="form-group">
                    <select name="idVisitante">
                            <?php
                                $equipos = EquipoControlador::Listar();
                                if($equipos == "") :?>
                                    <option value="">No hay Equipos ingresadas</option>
                            <?php 
                                else :?>
                                <? foreach($equipos as $fila) :?>

                                    <option value="<?= $fila['idEquipo'] ?>">
                                        <?=$fila['nombreEquipo'] ?> </option>
                                <?php endforeach ;?>
                            <?php endif ; ?>
                        </select>
                        <span>Visitante</span> 
                    </div>
                    <div class="form-group">
                            <select name="idCompeticion">
                            <?php
                                $competiciones = CompeticionesControlador::Listar();
                                if($competiciones == "") :?>
                                    <option value="">No hay Competiciones ingresadas</option>
                            <?php 
                                    else :?>
                                <? foreach($competiciones as $fila) :?>
                                    
                                    <option value="<?= $fila['idCompeticion'] ?>">
                                        <?=$fila['anio'] ." - " . $fila['nombreCompeticion'] ?> </option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
                    </div>
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
                                        <?=$fila['nombreDeporte'] ?> </option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
                            <span>Deporte</span>
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
                <form action="/modificarEvento" method="post">
                    <div class="form-group">
                            <select name="idEvento">
                            <?php
                                $eventos = EventoControlador::Listar();
                                if($eventos == "") :?>
                                  <option value="">No hay Eventos ingresados</option>
                            <?php 
                                else :?>
                                <? foreach($eventos as $fila) :?>
                                    <option value="<?= $fila['idEvento'] ?>">
                                        <?=$fila['idEvento'] ?></option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
                            <span>Id</span>
                    </div>
                    
                    <div class="form-group">
                        <input type="datetime-local" placeholder="" name="fechaHora">
                        <span>Fecha, Hora</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="resultado">
                        <span>Resultado</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="infracciones">
                        <span>Infracciones</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="ubicacion">
                        <span>Ubicacion</span>
                    </div>
                    <div class="form-group">
                        <select name="idLocatario">
                            <?php
                                $equipos = EquipoControlador::Listar();
                                
                                if($equipos == "") :?>
                                    <option value="">No hay Equipos ingresadas</option>
                            <?php 
                                else :?>
                                <? foreach($equipos as $fila) :?>
                                    
                                    <option value="<?= $fila['idEquipo'] ?>">
                                        <?=$fila['nombreEquipo'] ?> </option>
                                <? endforeach ;?>
                            <?php endif ;?>
                        </select>
                        <span>Locatario</span> 
                    </div>
                    <div class="form-group">
                    <select name="idVisitante">
                            <?php
                                $equipos = EquipoControlador::Listar();
                                if($equipos == "") :?>
                                    <option value="">No hay Equipos ingresadas</option>
                            <?php 
                                else :?>
                                <? foreach($equipos as $fila) :?>

                                    <option value="<?= $fila['idEquipo'] ?>">
                                        <?=$fila['nombreEquipo'] ?> </option>
                                <?php endforeach ;?>
                            <?php endif ; ?>
                        </select>
                        <span>Visitante</span> 
                    </div>
                    <div class="form-group">
                            <select name="idCompeticion">
                            <?php
                                $competiciones = CompeticionesControlador::Listar();
                                if($competiciones == "") :?>
                                    <option value="">No hay Competiciones ingresadas</option>
                            <?php 
                                    else :?>
                                <? foreach($competiciones as $fila) :?>
                                    
                                    <option value="<?= $fila['idCompeticion'] ?>">
                                        <?=$fila['anio'] ." - " . $fila['nombreCompeticion'] ?> </option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
                    </div>
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
                                        <?=$fila['nombreDeporte'] ?> </option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
                            <span>Deporte</span>
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
                <h5 class="card-title">Eventos Deportivos</h5>

                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Ficha/Hora</th>
                        <th>Locatario</th>
                        <th>Resultado</th>
                        <th>Visitante</th>
                        <th>Competición</th>
                        <th>Infracciones</th>
                        <th>Ubicación</th>
                        <th>Deporte</th>
                        <th> </th>
                    </tr>
                  
                    <?php
                        $resultados = EventoControlador::Listar();
                        
                        if($resultados == "") :?>
                            <tr>
                                <td><bold>No hay Eventos ingresados</bold></td>
                            </tr>
                    <?php 
                        else :?>
                        <? foreach($resultados as $fila) :?>
                            <tr>
                                <td> <?=$fila['idEvento'] ?></td> 
                                <td> <?=$fila['fechaHora'] ?></td>
                                <td> <?=$fila['locatario'] ?></td>
                                <td> <?=$fila['resultado'] ?></td>
                                <td> <?=$fila['visitante'] ?></td>
                                <td> <?=$fila['nombreCompeticion'] ?></td>
                                <td> <?=$fila['infracciones'] ?></td>
                                <td> <?=$fila['ubicacion'] ?></td>
                                <td> <?=$fila['nombreDeporte'] ?></td>
                                <td> 
                                    <form action="/bajaEvento" method="post">
                                       <button type="submit" name="idEvento" value="<?= $fila['idEvento'] ?>" class="btn btn-primary">Eliminar</button>
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

