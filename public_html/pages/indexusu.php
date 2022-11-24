<?php
//Incluyo tanto las funciones necesarias como la cabecera y las cookies
include '../../resources/templates/cookies.php';
include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';

?>

<?php
sesion_inactividad();
if ($_SESSION['rol']==2){  
    cookieLoginUsers();
}

echo "<h1>Bienvenido " . $_SESSION['nombre'] . "</h1>";
?>

<?php
//Incluyo el pie de la pagina
include_once '../../resources/templates/footer.php';
?>

