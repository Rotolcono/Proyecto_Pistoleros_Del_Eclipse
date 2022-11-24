<?php
//Incluyo tanto las funciones necesarias como la cabecera
include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';
?>
<?php

if ($_SESSION["rol"] == 1) {               
    header('Location: login.php?demonio=2');
}

sesion_inactividad();

$carrito = array();
//Si existe la cookie entro
if (isset($_COOKIE['carrito']) && isset($_POST['añadir'])) {
    $carrito = unserialize($_COOKIE['carrito']);
    //Capturamos todas las variables POST y las guardamos. 
    $nombre = $_POST['nombre'];
    $idcliente = $_SESSION['idcliente'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    //Capturamos toda la informacion en un array.

    $producto = array('idcliente' => $idcliente, 'nombre' => $nombre, 'precio' => intval($precio), 'cantidad' => intval($cantidad));
    
    //Necesario para que al introducir un producto que ya esta en el carrito, sobreescriba las cantidades.
}if (isset($_POST['añadir'])) {
    //Capturamos todas las variables POSTy las guardamos.
    $nombre = $_POST['nombre'];
    $idcliente = $_SESSION['idcliente'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    //Capturamos toda la informacion en un array.
    $producto = array('idcliente' => $idcliente, 'nombre' => $nombre, 'precio' => intval($precio), 'cantidad' => intval($cantidad));
    //array_push($carrito, $producto);
    $carrito[$nombre] = $producto;
    
    //Serializamos para añadir el array a la cookie y poder recuperar el array en otro lado
    $carrito = serialize($carrito);
    setcookie("carrito", $carrito, time()+3600);
    unset($_POST['añadir']);
    
}



?>

<?php
mostrar_catalogo_user();
?>



<?php
//Incluyo el pie de la pagina
include_once '../../resources/templates/footer.php';
?>

