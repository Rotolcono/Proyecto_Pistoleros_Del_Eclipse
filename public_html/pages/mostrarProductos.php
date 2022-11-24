<?php

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
    //echo "existe la cookie";
    $carrito = unserialize($_COOKIE['carrito']);
    //var_dump($carrito);
    //Capturamos todas las variables POSTy las guardamos. 
    $nombre = $_POST['nombre'];
    $idcliente = $_SESSION['idcliente'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    //Capturamos toda la informacion en un array.

    $producto = array('idcliente' => $idcliente, 'nombre' => $nombre, 'precio' => intval($precio), 'cantidad' => intval($cantidad));
    //echo"<br>";
    //echo "aaaaaa";
    //var_dump($carrito);
    //Necesario para que al introducir un producto que ya esta en el carrito solo sume las unidades.
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
    //var_dump($carrito);

    $carrito = serialize($carrito);
    setcookie("carrito", $carrito, time()+3600);
    unset($_POST['añadir']);
    //echo "ddd";
}


//var_dump($carrito);
?>

<?php
mostrar_catalogo_user();
?>



<?php

include_once '../../resources/templates/footer.php';
?>

