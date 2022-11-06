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
                <h5 class="card-title">Alta Evento</h5>
                <form action="/altaEvento" method="post">
                    <div class="form-group">
                        <input type="datetime-local" id="fechaHora" name="fechaHora">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Resultado" name="resultado">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Infracciones" name="infracciones">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Ubicación" name="ubicacion">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Locatario" name="locatario">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Visitante" name="visitante">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Deporte" name="nombreDeporte">
                    </div>
                    <div class="form-group">
                    <?php
                        $eventos = CompeticionesControlador::Listar();
                        if($eventos == "") :?>
                            <select name="competiciones" id="competiciones">
                            <option value="volvo">Sin Competiciones</option>
                            </select>
                    <?php 
                        else :?>
                        <? foreach($eventos as $fila) :?>
                            <select name="competiciones" id="competiciones">
                                <option value="volvo">Volvo</option>
                                <option value="saab>Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
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
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modificar Competiciones</h5>
                <form action="" method="post">
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
                <h5 class="card-title">Eventos</h5>

                <table class="table table-striped">
                    <tr>
                        <th style="">Id</th>
                        <th style="">Locatario</th>
                        <th style="">Resultado</th>
                        <th style="">Visitante</th>
                        <th style="">Infracciones</th>
                        <th style="">Ubicacion</th>
                        <th style="">Competicion</th>
                    </tr>
                  
                    <?php
                        $eventos = ResultadosControlador::ResultadoEquipo();
                        if($eventos == "") :?>
                            No hay competiciones ingresados
                    <?php 
                        else :?>
                        <? foreach($eventos as $fila) :?>
                            <tr>
                                <td style=""> <?=$fila['idEvento'] ?></td> 
                                <td style=""> <?=$fila['locatario'] ?></td>
                                <td style=""> <?=$fila['resultado'] ?></td>
                                <td style=""> <?=$fila['visitante'] ?></td>
                                <td style=""> <?=$fila['infracciones'] ?></td>
                                <td style=""> <?=$fila['ubicacion'] ?></td>
                                <td style=""> <?=$fila['competicion'] ?></td>
                                <td style=""> 
                                    <form action="/bajaCompeticion" method="post">
                                        <input type="radio" name="idSuscriptor" value="<?= $fila['idCompeticion'] ?>">
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ;?>
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

