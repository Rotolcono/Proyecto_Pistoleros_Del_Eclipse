<?php

function conexion_bbdd() {
    //Base de datos de ejemplo
    $cadena_conexion = "mysql:dbname=proyecto;host=127.0.0.1";
    $usuario = "root";
    $clave = "";
    try {
        //Se crea la conexión con la base de datos
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        // Opcional en MySQL, dependiendo del controlador 
        // de base de datos puede ser obligatorio
        //$bd->closeCursor(); 
        echo "Conexion extablecida";
        return $bd;
    } catch (Exception $e) {
        echo "Error al crear la conexion con la BBDD: " . $e->getMessage();
    }
}

function cerrar_sesion_bbdd() {
    $bd = null;
}

function obtener_clientes() {
    try {
        $bd = conexion_bbdd();
        //Se construye la consulta y se guarda en una variable
        $sql = "SELECT nombre, clave, rol FROM usuarios";

        $preparada = $bd->prepare("SELECT * from clientes");
        $preparada->execute(array(0));
        //echo "Usuarios con rol 0--> " . $preparada->rowCount() . "<br>";
        cerrar_sesion_bbdd();
        return $preparada;
    } catch (Exception $ex) {
        echo "Error al obtener los clientes: " . $ex->getMessage();
    }
}
?>

