<?php

include '../../resources/templates/funciones.php';
include_once '../../resources/templates/header.php';

//Hola esto es un milagro
?>


<?php
sesion_inactividad();
unset($_SESSION['nombre']);
unset($_SESSION['rol']);
session_destroy();
header('Location: ../index.php');
?>


<?php

include_once '../../resources/templates/footer.php';
?>

