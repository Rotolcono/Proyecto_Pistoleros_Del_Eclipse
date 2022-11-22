<?php
include_once '../resources/templates/header.php';
include '../resources/templates/funciones.php';
?>
<div class="container"><br>
    <form action="login.php" method="POST"> 
        <fieldset>
            <legend class='text-center'>Inicia Sesión</legend>
            
            <?php
            //Almacenamos las variablees enviadas por POST
            if(isset($_POST['login'])){
            if(isset($_POST['nombre'])){
                $usuario = $_POST['nombre'];
            }
            
            if(isset($_POST['clave'])){
                $password = $_POST['clave'];
                //Damos formatos sha256 a la contraseña para compararla en la base de datos
                $password= hash('sha256', $password);
            }
            $booleano = iniciar_sesion($usuario, $password);
            if($booleano == true){
                crear_variables_sesion($usuario, $password);
                header('Location: indexusu.php');
            }else{
                $mensaje="Credenciales invalidas";
                
            }
            }
            ?>
            <h2><?php if(isset($mensaje)){echo $mensaje;} ?></h2>
            <?php
            //Iniciio de sesion

            ?>
            
            <!--action -> controlador y la ACCION!! -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Teclea usuario</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" value="">
                <div id="emailHelp" class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Teclea contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="clave" value="">
                <div id="emailHelp" class="form-text">
                </div>
            </div>

            <button type="submit" name="login" class="btn btn-success container-xxl ">Entrar</button>

            </div>
        </fieldset>
        <br>
    </form>

</div>
<?php
include_once '../resources/templates/footer.php';
?>
