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
      <h1 class="title"> Descripcion Productos ::</h1>
       <?php

        $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : "c";
        
        if($tipo=='c'){
              echo "<a class='btn btn-link btn-nav pull-left' href='productos.php' data-transition='slide-out'>";
                  echo "<span class='icon icon-left-nav'></span> Regresar";
              echo "</a>";
          }
           
          if($tipo=='b'){
              echo "<a class='btn btn-link btn-nav pull-left' href='buscar.php' data-transition='slide-out'>";
                  echo "<span class='icon icon-left-nav'></span> Regresar";
              echo "</a>";
          }

      ?>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    
<div class="content">      
      <div class="content-padded">
        <?php           
          if(isset($_GET['pid']))
          {
           
      $nombreJSON  = file_get_contents("http://pymesv.com/cliente03w/producto{$_GET['pid']}"); 


      $jnombres = json_decode($nombreJSON);

      foreach ($jnombres as $jnom) {

        echo "<div class='card'>
              <div class='content-padded'>
                    <img src='"$jnom->img."' alt='".$jnom->nombre."' class='card-img-top' width='318' height='180'>
                    <div class='card-block'>
                      <h4 class='card-title'>".$jnom->nombre."</h4>
                      <p class='card-text'>".$jnom->descripcion."</p>  
                      <p class='card-text' style='font-size:20px; color:#0406c2;'>$".number_format($jnom->precio, 2, '.', ',')."</p>
              <form class='form-inline' action='masproducto.php' method='POST'>             
                  <input type='number' name='cantidad' id='cantidad-".$jnom->id_producto."' min='1' max='100' class='form-control' value='1' style='width:120px;'>
                  <input type='hidden' value='".$jnom->id_producto."' name='id'>
                  <button class='btn btn-primary' val='".$jnom->id_producto."' style='font-size:18px; height:40px;'>
                          Agregar
                         <i class='fa fa-shopping-cart fa-lg'></i>
                      </button>                                           
                  </form>
                      </div>  
                   </div>                                                                             
            </div>";
      }
          }
            
        ?>

        <?php 
          // to prevent undefined index notice
          $action = isset($_GET['action']) ? $_GET['action'] : "";
           
          if($action=='success'){
              echo "<div class='btn btn-positive btn-block aviso'>";
                  echo "<span style='font-size:14px;'>Producto agregado exitosamente a su carrito  ×</span>";
              echo "</div>";
          }
           
          if($action=='error'){
              echo "<div class='btn btn-negative btn-block aviso'>";
                  echo "<span style='font-size:14px;'>Ya existe un porducto del mismo tipo en su carrito!  ×</span>";
              echo "</div>";
          }
      ?> 
      

      </div>
    </div>



    <nav class="bar bar-tab">
          <a class="tab-item" href="index.php">
              <span class="icon icon-home"></span>
              <span class="tab-label">Inicio</span>
          </a>
          <a class="tab-item active" href="productos.php" data-transition="slide-in">
             <span class="icon fa fa-th"></span>
             <span class="tab-label">Productos</span>
         </a>
        <a class="tab-item" href="buy.php" data-transition="slide-in">
             <span class="icon fa fa-shopping-cart"></span>
             <span class="tab-label">Carretilla</span>
        </a>
        <a class="tab-item" href="buscar.php">
            <span class="icon icon-search"></span>
            <span class="tab-label">Buscar</span>
        </a>
        
      </nav>

  </body>
</html>