<?php
include_once '../resources/templates/header.php';
include '../resources/templates/funciones.php';
//Hola esto es un milagro
?>

<div id="">
    <?php
    $a=obtener_clientes();
    var_dump($a);
    ?>
</div>
<?php
include_once '../resources/templates/footer.php';
?>
