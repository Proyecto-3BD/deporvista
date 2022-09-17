<?php
    require "../utils/autoload.php";
    if(isset($_SESSION['autenticado'])){
        header("Location: /");
    }
    require "templates/head.php";

?>
<div>    
    <h1>Bienvenido</h1>
    
    <form action="/login" method="post">
        Usuario <input type="text" name="nombreUsuario"> <br />
        Password <input type="password" name="password"> <br />
        <input type="submit" value="Iniciar Sesión">
    </form>

    <a href="/usuario/altaUsuario">Crear Usuario</a> <br /><br />
    
    <?php if(isset($parametros['error']) && $parametros['error'] === true ) :?>
        <div style="color: red;">Credenciales invalidas.</div>
    <?php endif;?>

    <?php if(isset($parametros['errorConexion']) && $parametros['errorConexion'] === true ) :?>
        <div style="color: red;">Hubo un problema. Intente nuevamente más tarde</div>
    <?php endif;?>
</div>
<?php
    ///ACA CARGO ANUCIO
    