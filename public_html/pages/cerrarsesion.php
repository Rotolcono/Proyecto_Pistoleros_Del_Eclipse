<?php
//Incluyo tanto las funciones necesarias como la cabecera
include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';

?>


<?php
sesion_inactividad();
unset($_SESSION['nombre']);
unset($_SESSION['rol']);
session_destroy();
header('Location: ../index.php');
?>


<?php
//Incluyo el pie de la pagina
include_once '../../resources/templates/footer.php';
?>

