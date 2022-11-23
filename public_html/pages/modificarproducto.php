<?php
include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';
?>


<?php
if (isset($_POST['modificarr'])) {
    $idprod = $_POST['idprod'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
    //Falta de funcion insertar pasandole por parametro los valores e insertando en la base de datos.
    modificar_producto($idprod, $nombre, $precio, $tipo);
    $info_form = array('idproducto' => $idprod, 'nombre' => $nombre, 'precio' => $precio, 'tipo' => $tipo);
} else if (isset($_POST['modificar'])) {
    $idproducto = $_POST['idproducto'];
    $info_form = extraer_informacion_producto($idproducto);
    //var_dump($info_form);
}
?>
<form action="modificarproducto.php" method="POST">
    <div class="form-group">
        <label for="exampleFormControlInput1">Id producto</label>
        <input type="text" class="form-control" id="" placeholder="" name="idprod" value="<?php
        if (isset($info_form)) {
            echo $info_form['idproducto'];
        }
        ?>" readonly>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre producto</label>
        <input type="text" class="form-control" id="" placeholder="Nombre" name="nombre" value="<?php
        if (isset($info_form)) {
            echo $info_form['nombre'];
        }
        ?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Precio Producto</label>
        <input type="number" class="form-control" id="" placeholder="" name="precio" value="<?php
        if (isset($info_form)) {
            echo $info_form['precio'];
        }
        ?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Selecciona tipo:</label>
        <select class="form-control" id="exampleFormControlSelect1" placeholder="" name="tipo" value="" required>

            <option><?php
                if (isset($info_form)) {
                    echo $info_form['tipo'];
                }
                ?></option>
            <option>Otros</option>
            <option>Tarjeta gráfica</option>
            <option>Disco duro</option>
            <option>Placa base</option>
            <option>Procesador</option>
            <option>Memoria RAM</option>
            <option>Periférico</option>
        </select>
    </div>

    <button type="submit" name="modificarr" class="btn btn-success container-xxl">Modificar Producto</button>

</form>
<?php
include_once '../../resources/templates/footer.php';
?>

