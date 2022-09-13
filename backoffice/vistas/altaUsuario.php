<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body">
    <div>
        <div>
            <h3>Ingrese sus Datos</h3>
        </div>
        <form action="/usuario/altaUsuario" method="post">
            <p><input type="text" name="nombreUsuario" placeholder="Nombre de Usuario"></p>
            <p><input type="email" name="email" placeholder="E-Mail"></p>
            <p><input type="password" name="password" placeholder="Password"></p>
            <p><input type="text" name="documento" placeholder="Documento"></p>
            <p><input type="text" name="nombre" placeholder="Nombre"></p>
            <p><input type="text" name="apellidos" placeholder="Apellidos"></p>
            <p><input type="text" name="telefono" placeholder="Teléfono"></p>

            <p><label for="metodoPago">Método de Pago:</label></p>
            <p><select id="metodoPago" name="metodoPago">
                <option value="mercadoPago">Mercado Pago</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="paypal">PayPal</option>
            </select></p>

            <p>
                <input type="submit" value="Crear Usuario">
                <input type="reset" value="Borrar">
            </p>
        </form>
        <?php if(isset($parametros['error']) && $parametros['error'] === true ) :?>
            <div style="color: red;">Error en el ingreso.</div>
        <?php endif;?>
    </div>
</body>
</html>