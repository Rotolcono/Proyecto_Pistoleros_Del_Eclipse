<?php

include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';
?>

<?php

if (isset($_POST['vaciar'])) {
    unset($_COOKIE['carrito']);
    setcookie("carrito", $carrito, time() - 3600);
    header('Location: mostrarCarrito.php');
}
if (isset($_POST['comprar'])) {
    $idcliente = $_SESSION['idcliente'];
    $observaciones = $_POST['observaciones'];
    $total = $_POST['total'];

    realizar_compra($idcliente, $observaciones, $total);
    
}
if (isset($_COOKIE['carrito'])) {
    $observaciones = "";
    $carrito = unserialize($_COOKIE['carrito']);
    //var_dump($carrito);
    $total = 0;
    echo '<table class="table">';
    //Titulos (thead)
    echo '<thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total producto</th>
                </tr>
            </thead>';

    //Cuerpo tabla, toda la informacion
    echo '<tbody>';
    foreach ($carrito as $producto => $fila) {
        //Observaciones
        $notas = $producto . " X " . $fila['cantidad'];
        $observaciones = $observaciones . "" . $notas . ", ";
        echo '<tr>';
        echo '<td>' . $producto . '</td>';
        echo '<td>' . $fila['cantidad'] . '</td>';
        echo '<td>' . $fila['precio'] . '</td>';
        //Operaciones para sacar el total de cada producto y el total de la compra.
        $total_producto = $fila['precio'] * $fila['cantidad'];
        echo '<td>' . $total_producto . '</td>';
        echo '</tr>';
        $total = $total + $total_producto;
    }
    //echo $observaciones;
    echo '<tr>';
    echo '<td colspan="3"><h2>Total:</h2></td>';
    echo '<td><h2>' . $total . '</h2></td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
    echo "<form method='post' action= 'mostrarCarrito.php'>";
    echo "<input type='text' name='observaciones'  value='" . $observaciones . "' hidden/>";
    echo "<input type='text' name='total'  value='" . $total . "' hidden/>";
    echo "<button class='btn btn-outline-success' type='submit' name='comprar'>Realizar compra</button>";
    echo "<button class='btn btn-outline-danger' type='submit' name='vaciar'>Vaciar Carrito</button>";
    echo "</form>";
} else{
    echo "<h1>Tu carrito esta vacio</h1>";
}
?>
<?php

include_once '../../resources/templates/footer.php';
?>


