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
                <h5 class="card-title">Alta Equipos</h5>
                <form action="/altaEquipo" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="" name="nombreEquipo">
                        <span>Nombre Equipo</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="paisEquipo">
                        <span>País</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="dt">
                        <span>Técnico</span>
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
                <h5 class="card-title">Modificar Equipo</h5>
                <form action="/modificarEquipo" method="post">
                    <div class="form-group">
                            <select name="idEquipo">
                            <?php
                                $equipos = EquipoControlador::Listar();
                                if($equipos == "") :?>
                                  <option value="">No hay Equipo ingresados</option>
                            <?php 
                                else :?>
                                <? foreach($equipos as $fila) :?>
                                    <option value="<?= $fila['idEquipo'] ?>">
                                        <?=$fila['idEquipo'] ?></option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
                            <span>Id</span>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="" name="nombreEquipo">
                        <span>Nombre Equipo</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="paisEquipo">
                        <span>País Equipo</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="dt">
                        <span>Técnico</span>
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
                <h5 class="card-title">Equipos</h5>

                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nombre Equipo</th>
                        <th>País</th>
                        <th>Técnico</th>
                        <th> </th>
                    </tr>
                  
                    <?php
                        $equipos = EquipoControlador::Listar();
                        if($equipos == "") :?>
                            No hay Equipos ingresados
                    <?php 
                        else :?>
                        <? foreach($equipos as $fila) :?>
                            <tr>
                                <td> <?= $fila['idEquipo'] ?></td> 
                                <td> <?=$fila['nombreEquipo'] ?></td>
                                <td> <?=$fila['paisEquipo'] ?></td>
                                <td> <?=$fila['dt'] ?></td>
                                <td> 
                                    <form action="/bajaEquipo" method="post">
                                       <button type="submit" name="idEquipo" value="<?= $fila['idEquipo'] ?>" class="btn btn-primary">Eliminar</button>
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

