<?php

session_name("Login");
session_start();

/**
 * Funcion que realiza la conexion con la base de datos, en caso de error advertira con el 
 * error en cuestion
 */ 
function conexion_bbdd() {
    //Base de datos de ejemplo
    $cadena_conexion = "mysql:dbname=BBDD_eclipse;host=127.0.0.1";
    $usuario = "root";
    $clave = "";
    try {
        //Se crea la conexión con la base de datos
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        // Opcional en MySQL, dependiendo del controlador 
        // de base de datos puede ser obligatorio

        return $bd;
    } catch (Exception $e) {
        echo "Error al crear la conexion con la BBDD: " . $e->getMessage();
    }
}

/**
 * Funcion para cerrar sesion.
 */
function cerrar_sesion_bbdd() {
    $bd = null;
}

/**
 * Funcion la cual se le pasa por parametro un usuario y contraseña, esta funcion verifica que 
 * la contraseña introducida corresponda al usuario, devolviendo true si asi es
 * @param type $user --> Variable que almacena el usuario que inicia sesion y requiere de las variables de session
 * @param type $password --> Variable que almacena la contraseña del usuario que inicia sesion 
 * @return boolean --> Sera el valor devuelto, si es true es que el nombre
 * corresponde con la contraseña y el longin debe de realizarse.
 */
function iniciar_sesion($user, $password) {
    try {
        $centinela = false;
        $bd = conexion_bbdd();
        //echo "Conexión realizada con éxito <br>";
        $sql = "SELECT nombre, clave, rol FROM clientes";
        //Se ejecuta la consulta y se guarda en una variable
        $usuarios = $bd->query($sql);
        //echo "Número de usuarios: ".$usuarios->rowCount()."<br>";
        //Se recorre el array que nos devuelve la consulta
        foreach ($usuarios as $usu) {

            if ($usu['nombre'] == $user && $usu['clave'] == $password) {
                $centinela = true;
            }
        }
        cerrar_sesion_bbdd();
        return $centinela;
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}

/**
 * Funcion necesaria para crear las variables de sesion al iniciar session,
 * @param type $user --> Variable que almacena el usuario que inicia sesion y requiere de las variables de session
 * @param type $password --> Variable que almacena el usuario que inicia sesion y requiere de las variables de session.
 * Se requieren ambos valores para verificar que el usuario se corresponda a esta contraseña
 * y poder crear las variables.
 */
function crear_variables_sesion($user, $password) {
    try {

        $bd = conexion_bbdd();
        echo "Conexión realizada con éxito <br>";
        //Se construye la consulta y se guarda en una variable
        $sql = "SELECT nombre, clave, rol , idcliente FROM clientes";
        //Se ejecuta la consulta y se guarda en una variable
        $usuarios = $bd->query($sql);
        echo "Número de usuarios: " . $usuarios->rowCount() . "<br>";
        //Se recorre el array que nos devuelve la consulta
        foreach ($usuarios as $usu) {
            echo 'entro';
            //Se verifica que las contraseña introducidad se corresponda al usuario introducido.
            if ($usu['nombre'] == $user && $usu['clave'] == $password) {
                //echo $usuarios['nombre'];
                echo "<h2>Variables de sesion creadas</h2>";
                //Creamos las variables de sesion necesarias para el control de sesion y seguridad
                $_SESSION["nombre"] = $usu['nombre'];
                $_SESSION["rol"] = $usu['rol'];
                $_SESSION["idcliente"] = $usu['idcliente'];
            }
        }
        cerrar_sesion_bbdd();
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}

/**
 * Funcion que inserta en la tabla productos los valores pasados por parametros.
 * @param type $nombre --> Nombre del producto a insertar.
 * @param type $precio --> Precio del producto a insertar.
 * @param type $tipo --> Tipo de producto a insertar.
 */
function insertar_producto($nombre, $precio, $tipo) {
    try {
        $centinela = false;
        $bd = conexion_bbdd();
        //echo "Conexión realizada con éxito <br>";
        //Los valores pasados por parametro se introducen en la consulta para asi realizar
        //
        $ins = "insert into productos(nombre, precio, tipo) values ('" . $nombre . "','" . $precio . "','" . $tipo . "');";
        $result = $bd->query($ins);
        if ($result) {
            //echo "insert correcto <br>";
            //echo "Fila(s) insertadas: ".$result->rowCount()."<br>";
            echo "<h2>Producto insertado correctamente</h2>";
        } else {
            print_r($bd->errorinfo());
        }
        //echo "Código de la fila insertada".$bd->lastInsertId()."<br>";
        cerrar_sesion_bbdd();
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}

/**
 * Funcion que elimina de la BBDD un producto pasandole por parametro el id del producto 
 * a eliminar.
 * @param type $idprod
 */
function borrar_producto($idprod) {
    try {
        $centinela = false;
        $bd = conexion_bbdd();
        //echo "Conexión realizada con éxito <br>";
        $del = "delete from productos where idproducto='" . $idprod . "'";
        $result = $bd->query($del);
        //Se comprueban los errores
        if ($result) {
            echo "<h2>Producto con el ID '" . $idprod . "' eliminado con exito.</h2>";
            //echo "Filas borradas: ".$result->rowCount()."<br>";             
        } else {
            print_r($bd->errorInfo());
        }
        cerrar_sesion_bbdd();
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}

/**
 * Funcion necesaria para que en el formulario de modificar producto, pueda dar a modificar 
 * y tengan los datos por defecto en el formulario.
 * @param type $idprod --> Variable necesaria para saber la informacion que queremos editar del 
 * producto pasado por parametro.
 */
function extraer_informacion_producto($idprod) {
    try {
        $prod = array();
        $bd = conexion_bbdd();
        //echo "Conexión realizada con éxito <br>";
        $con = "select idproducto, nombre, precio, tipo from productos where idproducto='" . $idprod . "'";
        $result = $bd->query($con);
        //Se comprueban los errores
        foreach ($result as $producto) {
            $prod = array('idproducto' => $producto['idproducto'], 'nombre' => $producto['nombre'], 'precio' => $producto['precio'], 'tipo' => $producto['tipo']);
            //var_dump($producto);
        }

        cerrar_sesion_bbdd();
        return $prod;
    } catch (Exception $e) {
        echo "Error al extraer valores: " . $e->getMessage();
    }
}

/**
 * Funcion que modificar el producto especificado en el primer valor pasado por 
 * parametro (idprod), modificando con el resto de valores.
 * Buscamos modificar el nombre, precio y tipo del idproducto pasado por parametro
 * 
 * @param type $idprod --> Id del producto a modificar
 * @param type $nombre --> Nombre del producto nuevo
 * @param type $precio --> Precio nuevo
 * @param type $tipo --> Tipo de producto.
 */
function modificar_producto($idprod, $nombre, $precio, $tipo) {
    try {
        $bd = conexion_bbdd();
        //echo "Conexión realizada con éxito <br>";
        $upd = "update productos set nombre='" . $nombre . "', precio=" . $precio . ", tipo='" . $tipo . "' where idproducto = " . $idprod . ";";
        $result = $bd->query($upd);
        //comprobamos errores
        if ($result) {
            echo "<h2>El producto con el id '" . $idprod . "' ha sido modificado correctamente</h2><br>";
            //echo "Filas actualizadas: ".$result->rowCount()."<br>";
        } else {
            print_r($bd->errorInfo());
        }
        cerrar_sesion_bbdd();
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}

/**
 * Funcion que mostrará la tabla productos de la base de datos con un enlace para modificar y
 * eliminar cada uno de ellos especifico.
 */
function mostrar_productos_admin() {
    try {
        $bd = conexion_bbdd();
        //echo "Conexión realizada con éxito <br>";

        $sql = "SELECT * from productos";

        $preparada = $bd->prepare($sql);
        $preparada->setFetchMode(PDO::FETCH_ASSOC);
        $preparada->execute();
        //echo "Usuarios con rol 0--> " . $preparada->rowCount() . "<br>";

        echo '<table class="table">';
        //Titulos (thead)
        echo '<thead>
                <tr>
                    <th scope="col">idproducto</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>';

        //Cuerpo tabla, toda la informacion
        echo '<tbody>';

        while ($usu = $preparada->fetch()) {
            echo '<tr>';
            echo '<th scope="row">' . $usu['idproducto'] . '</th>';
            echo '<td>' . $usu['nombre'] . '</td>';
            echo '<td>' . $usu['precio'] . '</td>';
            echo '<td>' . $usu['tipo'] . '</td>';
            //Enlace modificar
            echo '<td>';
            echo "<form method='post' action= 'modificarProducto.php'>";
            echo "<input type='text' name='idproducto'  value='" . $usu['idproducto'] . "' hidden/>";
            echo "<button class='btn btn-outline-success' type='submit' name='modificar'>Modificar</button>";
            echo "</form>";
            echo '</td>';
            //enlace borrar
            echo '<td>';
            echo "<form method='post' action= 'modificarBorrarProducto.php'>";
            echo "<input type='text' name='idproducto'  value='" . $usu['idproducto'] . "' hidden/>";
            echo "<button class='btn btn-outline-danger' type='submit' name='borrar'>Eliminar</button>";
            echo "</form>";
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        cerrar_sesion_bbdd();
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}

/**
 * Funcion que muestra el catalogo del usuario con botones(formulario) para añadir el producto con la
 * cantidad deseada a un carrito
 */
function mostrar_catalogo_user() {
    try {
        $bd = conexion_bbdd();
        //echo "Conexión realizada con éxito <br>";

        $sql = "SELECT * from productos";

        $preparada = $bd->prepare($sql);
        $preparada->setFetchMode(PDO::FETCH_ASSOC);
        $preparada->execute();
        //echo "Usuarios con rol 0--> " . $preparada->rowCount() . "<br>";

        echo '<table class="table">';
        //Titulos (thead)
        echo '<thead>
                <tr>
                    <th scope="col">Productos</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Añadir</th>
                </tr>
            </thead>';

        //Cuerpo tabla, toda la informacion
        echo '<tbody>';

        while ($usu = $preparada->fetch()) {
            echo '<tr>';
            echo '<td>' . $usu['nombre'] . '</td>';
            echo '<td>' . $usu['precio'] . '</td>';
            echo '<td>' . $usu['tipo'] . '</td>';
            echo '<td>' .
            "<form method='post' action= 'mostrarProductos.php'>"
            . "<input type='number' class='form-control' id='' placeholder='' name='cantidad' value='' min='0' max='100' maxlength='3' required>"
            . '</td>';
            //Enlace modificar
            echo '<td>';
            //echo "<input type='text' name='idcliente'  value='" . $_SESSION['idcliente'] . "' hidden/>";
            echo "<input type='text' name='nombre'  value='" . $usu['nombre'] . "' hidden/>";
            echo "<input type='text' name='precio'  value='" . $usu['precio'] . "' hidden/>";
            echo "<button class='btn btn-outline-success' type='submit' name='añadir'>Añadir al Carrito</button>";
            echo "</form>";
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        cerrar_sesion_bbdd();
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}

/* Funcion de inactividad de la sesion */
function sesion_inactividad() {
    if ($_SESSION["autentificado"]!= "SI") {
        //si no está logueado lo envío a la página de autentificación        
        header("Location: login.php?demonio=2");
    }
    else if($_SESSION["autentificado"]== "SI"){
        //sino, calculamos el tiempo transcurrido
        $fechaGuardada = $_SESSION["ultimoAcceso"];
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
        //comparamos el tiempo transcurrido y si paso el tiempo puesto(10 minutos) en la misma pagina, te devuelve a la principal
        if ($tiempo_transcurrido >= 600) {
            // destruyo la sesión
            session_destroy();
            //envío al usuario a la pag. de autenticación
            header("Location: login.php?fuera=1");           
            //sino, actualizo la fecha de la sesión
        } else {
            $_SESSION["ultimoAcceso"] = $ahora;
        }   
    }   
}
/**
 * Funcion que inserta la venta a la tabla ventas, se ejecuta cuuando el usuario 
 * pulsa el boton de realizar compra
 * @param type $idcliente --> id del cliente que realiza la compra
 * @param type $observaciones --> Aqui se guardan los productos con la cantidad de cada uno
 * @param type $total --> Precio total de la compra
 */
function realizar_compra($idcliente, $observaciones, $total){
    try {
        $bd = conexion_bbdd();
        //echo "Conexión realizada con éxito <br>";
        $ins = "insert into ventas(idcliente, observaciones, total) values ('" . $idcliente . "','" . $observaciones . "','" . $total . "');";
        $result = $bd->query($ins);
        if ($result) {
            //echo "insert correcto <br>";
            //echo "Fila(s) insertadas: ".$result->rowCount()."<br>";
            echo "<h2>Compra Realizada con exito</h2>";
            //unset($_COOKIE["carrito"]);
            //setcookie("carrito", $carrito, time() - 3600);
        } else {
            print_r($bd->errorinfo());
        }
        //echo "Código de la fila insertada".$bd->lastInsertId()."<br>";
        cerrar_sesion_bbdd();
    } catch (Exception $e) {
        echo "Error al iniciar sesion: " . $e->getMessage();
    }
}
?>

