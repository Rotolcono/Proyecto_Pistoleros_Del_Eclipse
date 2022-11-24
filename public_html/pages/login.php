<?php
/*Incluyo tanto las funciones necesarias como la cabecera y cambio el rol de la sesion para
  para el cambio de estilos de header */ 
include '../../resources/templates/funciones.php';
$_SESSION['rol'] = 3;
include_once '../../resources/templates/header.php';
?>
<div class="container"><br>
    <form action="login.php" method="POST"> 
        <fieldset>
            <legend class='text-center'>Inicia Sesión</legend>

            <?php
            //para la inactividad en la sesion           
            if (isset($_GET['fuera']) && $_GET['fuera'] == 1) {
                echo "<h2>Tiempo de inactividad superado</h2>";
            }
            if (isset($_GET['demonio']) && $_GET['demonio'] == 2) {
                        echo "<h2>No seas demonio</h2>";
            }


            //Almacenamos las variablees enviadas por POST
            if (isset($_POST['login'])) {
                if (isset($_POST['nombre'])) {
                    $usuario = $_POST['nombre'];
                }

                if (isset($_POST['clave'])) {
                    $password = $_POST['clave'];
                    //Damos formatos sha256 a la contraseña para compararla en la base de datos
                    $password = hash('sha256', $password);
                }
                $booleano = iniciar_sesion($usuario, $password);

                if ($booleano == true) {
                    crear_variables_sesion($usuario, $password);
                    //Inicio de sesion control                   
                    $_SESSION["autentificado"] = "SI";
                    //defino la sesión que demuestra que el usuario está autorizado
                    $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
                    
                    sesion_inactividad();                   
                    
                    header('Location: indexusu.php');
                } else {
                    $_SESSION["autentificado"] = "NO";
                    $mensaje = "Credenciales invalidas";
                }
            }
            ?>
            <h2><?php
            if (isset($mensaje)) {
                echo $mensaje;
            }
            ?></h2>
                <?php
            //Iniciio de sesion
            ?>

            <!--action -> controlador y la ACCION!! -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" value="">
                <div id="emailHelp" class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="clave" value="">
                <div id="emailHelp" class="form-text">
                </div>
            </div>

            <button type="submit" name="login" class="btn btn-outline-success container-xxl ">Entrar</button>

            </div>
        </fieldset>
        <br>
    </form>

</div>
<?php
//Incluyo el pie de la pagina
include_once '../../resources/templates/footer.php';
?>
