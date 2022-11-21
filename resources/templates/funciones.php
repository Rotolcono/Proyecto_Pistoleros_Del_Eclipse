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
        $sql = "SELECT nombre, clave, rol FROM usuarios;";

        $preparada = $bd->prepare("SELECT * from clientes;");
        $preparada->execute(array(0));
        //echo "Usuarios con rol 0--> " . $preparada->rowCount() . "<br>";
        cerrar_sesion_bbdd();
        
        foreach($preparada as $usu){
            echo $usu['nombre'];
        }
        return $preparada;
    } catch (Exception $e) {
        echo "Error al obtener los clientes: " . $e->getMessage();
    }
}

function iniciar_sesion($user,$password){
    try {

        $bd = conexion_bbdd();
        echo "Conexión realizada con éxito <br>";
                //Se construye la consulta y se guarda en una variable
                $sql="SELECT nombre, clave, rol FROM clientes";
                //Se ejecuta la consulta y se guarda en una variable
                $usuarios = $bd->query($sql);
                echo "Número de usuarios: ".$usuarios->rowCount()."<br>";
                //Se recorre el array que nos devuelve la consulta


                foreach($usuarios as $usu){
                    echo 'entro';
            if($usu['nombre']==$user && $usu['clave']==$password){
                //echo $usuarios['nombre'];
                echo "<h2>Good</h2>";
                $centinela = true;
            }else{
                //echo $usuarios['clave'];
                $centinela = false;
            }
        }
        return $centinela;
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}



?>

