<?php
//Incluyo tanto las funciones necesarias como la cabecera
include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';
?>


<?php
if ($_SESSION["rol"] == 2) {               
    header('Location: login.php?demonio=2');
}

sesion_inactividad();

if (isset($_POST['borrar'])) {
    //Almacenamos el id del producto
    $idprod = $_POST['idproducto'];
    //Ejecuta la funcion que elimina el producto pasandole por parametro su id.
    borrar_producto($idprod);
}

mostrar_productos_admin();
?>

<?php
//Incluyo el pie de la pagina
include_once '../../resources/templates/footer.php';
?>

