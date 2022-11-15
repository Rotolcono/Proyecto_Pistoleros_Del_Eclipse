<?php
include_once '../resources/templates/header.php';
include '../resources/templates/funciones.php';
?>
<div class="container"><br>
    <form action="login.php" method="POST"> 
        <fieldset>
            <legend class='text-center'>Inicia Sesión</legend>
    <?php
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : "";
    $clave = isset($_POST['clave']) ? trim($_POST['clave']) : "";
    ?>

    <?php
    if (isset($titulo))
        echo "<h1 class='text-center'>$titulo</h1><hr>";
    ?>
    <?php
    if (isset($mensaje))
        echo "<h2>$mensaje</h2>";
    ?>
    <?php
    ?>

    <!--action -> controlador y la ACCION!! -->

    
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Teclea usuario</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" value="<?php echo $nombre; ?>">
                <div id="emailHelp" class="form-text">
                    </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Teclea contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="clave" value="<?php echo $clave; ?>">
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
