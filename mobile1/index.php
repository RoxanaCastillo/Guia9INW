<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mi Tienda</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/jquery.mobile.flatui.css" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.4.0-rc.1.js"></script>
    <script src="js/script.js"></script>
    
  </head>
  <body>

    <div data-role="page" id="inicio">
      <div data-role="header">
        <h1>Inicio ::</h1>
    </div>
    <div role="main" class="ui-content">
      <div class="ui-corner-all custom-corners">
        <img src="img/carrito.jpg" alt="Argo" width="318" height="180">
         <div class="ui-body ui-body-a">
      <p >
        App de Mi Tienda :: le permite comprar sus productos favoritos de moda para toda la familia  de una forma fácil y mas rápida al alcance de un clic
      </p>
      </div>
      </div>
    </div>
    <div data-role="footer" data-theme="d" data-position="fixed">
        <div data-role="navbar" data-grid="c">
        <ul>
          <li><a href="index.php" class="ui-btn-active" data-icon="home">Inicio</a></li>
            <li><a href="productos.php" data-icon="grid" data-transition="pop">Productos</a></li>
            <li><a href="buy.php" data-icon="shop" data-transition="pop">Carretilla</a></li>
            <li><a href="buscar.php" data-icon="search" data-transition="pop">Buscar</a></li>
        </ul>
        </div>
      </div>
    </div>
  </body>
</html>