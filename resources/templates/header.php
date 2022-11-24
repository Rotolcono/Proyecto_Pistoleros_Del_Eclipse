<?php ?>

<html lang="es">
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <title>Proyecto.</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>


    <?php
    //Dependiendo del valor del rol del usuario que sea tendra unos estilos con diferentes opciones
    //Compruebo si el atributo rol de la sesion existe
    if (!isset($_SESSION['rol'])) {

        echo'<link rel="stylesheet" href="css/estilos.css"/>
                </head>
                 <body>
                <header>
                <div>
                
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                
                <a class="navbar-brand" href="index.php"><img src="images/Logotipo.PNG"></a>          
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/login.php">Iniciar Sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>
            </header>';
    } else if (isset($_SESSION['rol']) && ($_SESSION['rol'] == 3)) {

        echo'<link rel="stylesheet" href="../css/estilos.css"/>
                </head>
                 <body>
                 <header>
                    <div>

                    </div>
                <div>   
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="../index.php"><img src="../images/Logotipo.PNG"></a>
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
            </nav>
            </header>';
    } else if ($_SESSION['rol'] == 2) {
        echo '<link rel="stylesheet" href="../css/estilos.css"/>
                </head>
                 <body>
                 <header>
                    <div>

                    </div>
                <div>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="indexUsu.php"><img src="../images/Logotipo.PNG"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="mostrarProductos.php">Ver Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mostrarCarrito.php">Mi Carrito</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cerrarsesion.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>
            </header>';
    } else if ($_SESSION['rol'] == 1) {
        echo '<link rel="stylesheet" href="../css/estilos.css"/>
                </head>
                 <body>
                 <header>
                    <div>

                    </div>
                <div>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="indexUsu.php"><img src="../images/Logotipo.PNG"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="insertarproducto.php">Insertar Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modificarborrarproducto.php">Modificar-Borrar Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cerrarsesion.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>
            </header>';
    }
    ?>     
</div>
