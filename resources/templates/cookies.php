<?php

function cookieVisitasPaginaPrincipal() {
    if (!isset($_COOKIE ["visitas"])) {
        //Expira en 10 segundos
        setcookie("visitas", "1", time() + 10);
        echo "<h1>Bienvenido a Pistoleros del Eclipse</h1>";
    }
    //si no es la primera que visitamos esa página 
    else {
        //No olvidar hacer casting a entero
        $visitas = ((int) $_COOKIE["visitas"]);
        $visitas++; //Se actualiza la variable 
        setcookie("visitas", $visitas, time() + 10);
        echo "<h1>Bienvenido a Pistoleros del Eclipse</h1>";
    }
}

function cookieLoginUsers() {
    if (!isset($_COOKIE ["visitasUsers"])) {
        //Expira en 10 segundos
        setcookie("visitasUsers", "1", time() + 3600 * 60);
    }
    //si no es la primera que visitamos esa página 
    else {
        //No olvidar hacer casting a entero
        $visitas = ((int) $_COOKIE["visitasUsers"]);
        $visitas++; //Se actualiza la variable 
        setcookie("visitas", $visitas, time() + 10);
    }
}
?>

