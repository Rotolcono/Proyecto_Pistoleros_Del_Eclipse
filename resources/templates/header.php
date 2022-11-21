<?php
session_start();
?>

<html lang="es">
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <title>Ejercicio.</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css"/>
    </head>
    <body>
        <!-- Cabecera -->
        <div>

        </div>
        <div>
            <?php
            
            if(!isset($_SESSION['rol'])){
                echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img src="../../public_html/images/Logotipo.PNG"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar Sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>';
            }else if($_SESSION['rol']==2){
                echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img src="../../public_html/images/Logotipo.PNG"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="mostrarproductos.php">Ver Catalogo</a>
                        </li>
                    </ul>
                </div>
            </nav>';
            }else if($_SESSION['rol']==1){
                echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img src="../../public_html/images/Logotipo.PNG"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="insertar_productos.php">Insertar Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cerrarsesion.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>';
            }
            ?>
            
            
            
        </div>
