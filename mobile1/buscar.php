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
        <h1>Buscar ::</h1>
    </div>

      <div role="main" class="ui-content">
      <ul data-role="listview" data-filter="true" data-filter-placeholder="Buscar por nombre" data-inset="true" class="ui-nodisc-icon ui-alt-icon" data-theme="b">
        <?php           
                $nombreURL = "http://www.pymesv.com/cliente03w/producto.php";
                $nombreJSON = file_get_contents($nombreURL);
                $jnombres = json_decode($nombreJSON);
                $init_path = "../../product_img/";
                
                foreach ($jnombres as $jnom {

                    echo "<li style='border-bottom: 1px solid #ddd;'>
                            <a href='vistaproductos.php?pid={$product->id}&tipo=b'>
                    <h4>".$jnom->nombre."</h4>
                            </a>
                          </li>";
                }
              ?>
      </ul>
    </div>

    <div data-role="footer" data-theme="d" data-position="fixed">
        <div data-role="navbar" data-grid="c">
        <ul>
          <li><a href="index.php" data-icon="home">Inicio</a></li>
            <li><a href="productos.php" data-icon="grid" data-transition="pop">Productos</a></li>
            <li><a href="buy.php" data-icon="shop" data-transition="pop">Carretilla</a></li>
            <li><a href="buscar.php" class="ui-btn-active" data-icon="search" data-transition="pop">Buscar</a></li>
        </ul>
        </div>
      </div>

  </body>
</html>