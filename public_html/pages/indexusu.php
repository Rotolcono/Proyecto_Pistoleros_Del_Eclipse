<?php
//Incluyo tanto las funciones necesarias como la cabecera y las cookies
include '../../resources/templates/cookies.php';
include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';

//Hola esto es un milagro
?>

<?php
sesion_inactividad();

if ($_SESSION['nombre']=="usuario" && $_SESSION['nombre']="usuario"){  
    cookieLoginUsers();
}

echo "<h1>Bienvenido " . $_SESSION['nombre'] . "</h1>";
?>

<?php
//Incluyo el pie de la pagina
include_once '../../resources/templates/footer.php';
?>

