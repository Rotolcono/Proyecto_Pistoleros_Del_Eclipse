<?php
//Incluyo tanto las funciones necesarias como la cabecera
include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';

?>


<?php
//Cada vez que llegamos a esta vista (al pulsar cerrar sesion), eliminamos las variables de session
//y destruimos la session
sesion_inactividad();
unset($_SESSION['nombre']);
unset($_SESSION['rol']);
session_destroy();
//Redirigimos al index
header('Location: ../index.php');
?>


<?php
//Incluyo el pie de la pagina
include_once '../../resources/templates/footer.php';
?>

