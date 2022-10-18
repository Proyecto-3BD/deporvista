
<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /login");
    }
    require 'templates/head.php'; ?>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alta de Suscriptor</h5>
                <form action="/usuario/altaSuscriptor" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="Nombre de Usuario" name="nombreSuscriptor">
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="E-mail" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Documento" name="documento">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Nombre" name="nombre">
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Apellidos" name="apellidos">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Teléfono" name="telefono">
                    </div>
                    <div class="form-group">
                        <p>
                        <select id="metodoPago" name="metodoPago">
                        <option value="mercadoPago">Mercado Pago</option>
                        <option value="tarjeta">Tarjeta</option>
                        <option value="paypal">PayPal</option>
                        </select>
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary">Alta</button>
                    <?php if(isset($parametros['ingresado']) && $parametros['ingresado'] == 'true') :?>
                                <div style='color: green;'>Suscriptor Ingresado</div>
                    <?php elseif (isset($parametros['error']) && $parametros['error'] == 'true')  :?>
                                <div style='color: red;'>Error en el Ingreso</div>
                    <?php endif; ?>
                </form>
            </div>
            
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modificar Suscriptor</h5>
                <form action="/usuario/modificarSuscriptor" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="Id" name="idSuscriptor">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Nombre de Usuario" name="nombreSuscriptor">
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="E-mail" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <input type="documento" placeholder="Documento" name="documento">
                    </div>
                    <div class="form-group">
                        <input type="nombre" placeholder="Nombre" name="nombre">
                    </div>

                    <div class="form-group">
                        <input type="apellidos" placeholder="Apellidos" name="apellidos">
                    </div>
                    <div class="form-group">
                        <input type="telefono" placeholder="Teléfono" name="telefono">
                    </div>
                    <div>
                        <p>
                        <select id="metodoPago" name="metodoPago">
                        <option value="mercadoPago">Mercado Pago</option>
                        <option value="tarjeta">Tarjeta</option>
                        <option value="paypal">PayPal</option>
                        </select>
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary">Modificar</button>
                    <?php if(isset($parametros['modificado']) && $parametros['modificado'] == 'true') :?>
                                <div style='color: green;'>Suscriptor Actualizado</div>
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
                        <th style="">Nombre de Usuario</th>
                        <th style="">Correo Electrónico</th>
                        <th style="">Nombre</th>
                        <th style="">Apellidos</th>
                        <th style="">Telefono</th>
                        <th style="">Documento</th>
                        <th style="">Metodo de pago</th>
                        <th style="">Fecha de Alta</th>
                        <th></th>
                    </tr>
                  
                    <?php
                        $suscriptores = SuscriptorControlador::Listar();
                        if($suscriptores === "") :?>
                            No hay suscriptores ingresados
                    <?php 
                        else :?>
                        <? foreach($suscriptores as $fila) :?>
                            <tr>
                                <td style=""> <?= $fila['idSuscriptor'] ?></td> 
                                <td style=""> <?=$fila['nombreSuscriptor'] ?></td>
                                <td style=""> <?=$fila['email'] ?></td>
                                <td style=""> <?=$fila['nombre'] ?></td>
                                <td style=""> <?=$fila['apellidos'] ?></td>
                                <td style=""> <?=$fila['telefono'] ?></td>
                                <td style=""> <?=$fila['documento'] ?></td>
                                <td style=""> <?=$fila['metodoPago'] ?></td>
                                <td style=""> <?=$fila['fechaAlta'] ?></td>
                                <td style=""> 
                                    <form action="/usuario/bajaSuscriptor" method="post">
                                        <input type="radio" name="idSuscriptor" value="<?= $fila['idSuscriptor'] ?>">
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ;?>
                    <?php endif ; ?>
                         
                    <?php if(isset($parametros['eliminado']) && $parametros['eliminado'] == 'true') :?>
                            <div style='color: darkred;'>Suscriptor eliminado</div>
                    <?php endif; ?>
                                    
                </table>

            </div>  
        </div>
    </div>
    
        