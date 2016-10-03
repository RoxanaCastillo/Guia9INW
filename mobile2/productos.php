<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mi Tienda</title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no,minimal-ui">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link href="css/ratchet.css" rel="stylesheet">
    <link href="css/ratchet-theme-ios.css" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="js/ratchet.js"></script>
    <script src="js/push.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

    <!--Script but icons-->
    <script src="https://use.fontawesome.com/b826bba8d3.js"></script>
    
  </head>
  <body>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">Productos ::</h1>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
     

      
    <div class="content">    
      <div class="container"> 
        <div class="content-padded">

          <ul class="table-view">
        <?php
      $nombreURL = "http://www.pymesv.com/cliente03w/producto.php";
            
      $nombreJSON = file_get_contents($nombreURL);
      
      $jnombres = json_decode($nombreJSON);
      
      $init_path = "../../product_img/";
    
      foreach($jnombres as $jnom) {
              $producto = '<div class="col-md-4">
                      <div class="panel panel-primary">
                        <div class="panel-heading"><center>'.$jnom->nombre.'</center></div>
                        <div class="panel-body">
                          <center><img src="'.$init_path.$jnom->path_image.'" class="img-circle" alt="Error al cargar imagen" width="250" height="250"></center>
                          <div class"form-group">
                            <p>DESCRIPCION: '.$jnom->descripcion.'</p>
                            <p>MARCA: '.$jnom->marca.'</p>
                            <p>PRECIO: '.$jnom->precio.'</p>
                          </div>
                        </div>
                        <div class="panel-footer"><center><div class="divButton"><button class="btn btn-primary" id="'.$jnom->id_producto.'" onclick="AgregarProducto(this.id)">Agregar a carrito</button></div></center></div>
                      </div>
                    </div>';
              echo $producto;
      }

      ?>

          <nav class="bar bar-tab">
          <a class="tab-item" href="index.php">
              <span class="icon icon-home"></span>
              <span class="tab-label">Inicio</span>
          </a>
          <a class="tab-item active" href="productos.php" data-transition="slide-in">
             <span class="icon fa fa-th"></span>
             <span class="tab-label">Productos</span>
         </a>
        <a class="tab-item" href="buy.php">
             <span class="icon fa fa-shopping-cart" data-transition="slide-in"></span>
             <span class="tab-label">Carretilla</span>
        </a>
        <a class="tab-item" href="buscar.php">
            <span class="icon icon-search"></span>
            <span class="tab-label">Buscar</span>
        </a>
      </nav>
          </ul>
        </div>
      </div>
    </div>

   
  </body>
</html>