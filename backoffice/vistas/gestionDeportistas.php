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
                <h5 class="card-title">Alta Deportistas</h5>
                <form action="/altaDeportista" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="" name="nombreDeportista">
                        <span>Nombres</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="apellidos">
                        <span>Apellidos</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="paisDeportista">
                        <span>País</span>
                    </div>
                    <div class="form-group">
                        <select name="idEquipo">
                            <?php
                                $equipos = EquipoControlador::Listar();
                                
                                if($equipos == "") :?>
                                    <option value="">No hay Equipos ingresadas</option>
                            <?php 
                                else :?>
                                <? foreach($equipos as $fila) :?>
                                    
                                    <option value="<?= $fila['idEquipo'] ?>">
                                        <?=$fila['nombreEquipo'] . "  -  "  . $fila['paisEquipo']?> </option>
                                <? endforeach ;?>
                            <?php endif ;?>
                        </select>
                        <span>Equipo</span> 
                    </div>
                    <div class="form-group">
                        <input type="text"name="rol">
                        <span>Rol</span>
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
                <h5 class="card-title">Modificar Deportistas</h5>
                <form action="/modificarDeportista" method="post">
                    <div class="form-group">
                            <select name="idDeportista">
                            <?php
                                $deportistas = DeportistaControlador::ListarDepEquipo();
                                if($deportistas == "") :?>
                                  <option value="">No hay Deportistas ingresados</option>
                            <?php 
                                else :?>
                                <? foreach($deportistas as $fila) :?>
                                    <option value="<?= $fila['idDeportista'] ?>">
                                        <?= $fila['nombreDeportista'] .  " " .$fila['apellidos'] ?></option>
                                <? endforeach ;?>
                            <?php endif ; ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="" name="nombreDeportista">
                        <span>Nombres</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="apellidos">
                        <span>Apellidos</span>
                    </div>
                    <div class="form-group">
                        <input type="text"name="paisDeportista">
                        <span>País</span>
                    </div>
                    <div class="form-group">
                        <select name="idEquipo">
                            <?php
                                $equipos = EquipoControlador::Listar();
                                
                                if($equipos == "") :?>
                                    <option value="">No hay Equipos ingresadas</option>
                            <?php 
                                else :?>
                                <? foreach($equipos as $fila) :?>
                                    
                                    <option value="<?= $fila['idEquipo'] ?>">
                                        <?=$fila['nombreEquipo'] . "  -  "  . $fila['paisEquipo']?> </option>
                                <? endforeach ;?>
                            <?php endif ;?>
                        </select>
                        <span>Equipo</span> 
                    </div>
                    <div class="form-group">
                        <input type="text"name="rol">
                        <span>Rol</span>
                    </div>
                    <div class="form-group">

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
                <h5 class="card-title">Deportistas</h5>

                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Pais</th>
                        <th>Equipo</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                  
                    <?php
                        $deportistas = DeportistaControlador::ListarDepEquipo();
                        if($deportistas == "") :?>
                            No hay Deportista ingresados
                    <?php 
                        else :?>
                        <? foreach($deportistas as $fila) :?>
                            <tr>
                                <td> <?= $fila['idDeportista'] ?></td> 
                                <td> <?=$fila['nombreDeportista'] ?></td>
                                <td> <?=$fila['apellidos'] ?></td>
                                <td> <?=$fila['paisDeportista'] ?></td>
                                <td><?=$fila['nombreEquipo'] ?></td>
                                <td> <?=$fila['rol'] ?></td>
                                <td> 
                                    <form action="/bajaDeportista" method="post">
                                       <button type="submit" name="idDeportista" value="<?= $fila['idDeportista'] ?>" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <? endforeach ;?>
                    <?php endif ; ?>
                         
                    <?php if(isset($parametros['eliminado']) && $parametros['eliminado'] == 'true') :?>
                            <div style='color: darkred;'>Deportista eliminado</div>
                    <?php endif; ?>
                                    
                </table>

            </div>  
        </div>
    </div>
    </div>
</div>

