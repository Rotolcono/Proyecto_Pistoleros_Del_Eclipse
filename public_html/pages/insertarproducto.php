<?php
include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';
?>


<?php
sesion_inactividad();
if (isset($_POST['insertar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
    //Falta de funcion insertar pasandole por parametro los valores e insertando en la base de datos.
    insertar_producto($nombre, $precio, $tipo);
}
?>
<form action="insertarproducto.php" method="POST">

    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre producto</label>
        <input type="text" class="form-control" id="" placeholder="Nombre" name="nombre" value="" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Precio Producto</label>
        <input type="number" class="form-control" id="" placeholder="" name="precio" value="" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Selecciona tipo:</label>
        <select class="form-control" id="exampleFormControlSelect1" placeholder="" name="tipo" value="" required>
            <option>Otros</option>
            <option>Tarjeta gráfica</option>
            <option>Disco duro</option>
            <option>Placa base</option>
            <option>Procesador</option>
            <option>Memoria RAM</option>
            <option>Teclado</option>
            <option>Ratón</option>
            <option>Monitor</option>
            <option>Gabinete</option>
            <option>Refrigeración</option>
            <option>Refrigeración Líquida</option>
            <option>Fuente alimentacion</option>
            <option>Periférico</option>
        </select>
    </div>

    <button type="submit" name="insertar" class="btn btn-outline-success container-xxl">Insertar Producto</button>

</form>
<?php
include_once '../../resources/templates/footer.php';
?>
