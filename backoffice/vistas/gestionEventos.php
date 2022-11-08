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
                        <select name="locatario">
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
                            <?php endif ; ?>
                        </select>
                        <span>Locatario</span> 
                    </div>
                    <div class="form-group">
                    <select name="visitante">
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
                                <?php endforeach ;?>
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
                <h5 class="card-title">Suscriptores</h5>

                <table class="table table-striped">
                    <tr>
                        <th style="">Id</th>
                        <th style="">Ficha/Hora</th>
                        <th style="">Locatario</th>
                        <th style="">Resultado</th>
                        <th style="">Visitante</th>
                        <th style="">Competición</th>
                        <th style="">Deporte</th>
                    </tr>
                  
                    <?php
                        $resultados = ResultadosControlador::ResultadoEquipo();
                        if($resultados == "") :?>
                            No hay Eventos ingresados
                    <?php 
                        else :?>
                        <? foreach($resultados as $fila) :?>
                            <tr>
                                <td style=""> <?= $fila['idEvento'] ?></td> 
                                <td style=""> <?=$fila['fechaHora'] ?></td>
                                <td style=""> <?=$fila['locatario'] ?></td>
                                <td style=""> <?=$fila['resultado'] ?></td>
                                <td style=""> <?=$fila['visitante'] ?></td>
                                <td style=""> <?=$fila['competicion'] ?></td>
                                <td style=""> <?=$fila['deporte'] ?></td>
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
                            <div style='color: darkred;'>Evento eliminado</div>
                    <?php endif; ?>
                                    
                </table>

            </div>  
        </div>
    </div>
    </div>
</div>

