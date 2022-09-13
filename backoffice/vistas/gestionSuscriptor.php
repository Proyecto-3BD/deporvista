
<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado'])){ 
        header("Location: /loginAdmin");
    }
    require 'templates/head.php'; ?>

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
                                <td style=""> <?= $fila['idUsuario'] ?></td> 
                                <td style=""> <?=$fila['nombreUsuario'] ?></td>
                                <td style=""> <?=$fila['email'] ?></td>
                                <td style=""> <?=$fila['nombre'] ?></td>
                                <td style=""> <?=$fila['apellidos'] ?></td>
                                <td style=""> <?=$fila['telefono'] ?></td>
                                <td style=""> <?=$fila['documento'] ?></td>
                                <td style=""> <?=$fila['metodoPago'] ?></td>
                                <td style=""> <?=$fila['fechaAlta'] ?></td>
                                <td style=""> 
                                    <form action="/usuario/bajaSuscriptor" method="post">
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
        