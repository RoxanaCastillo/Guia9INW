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

    <div data-role="page" id="catalogo">
    <div data-role="header">
      <h1>Producto ::</h1>
    </div>
       <div role="main" class="ui-content">
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



    div data-role="footer" data-theme="d" data-position="fixed">
        <div data-role="navbar" data-grid="c">
        <ul>
          <li><a href="index.php"  data-icon="home">Inicio</a></li>
            <li><a href="productos.php" class="ui-btn-active" data-icon="grid" data-transition="pop">Productos</a></li>
            <li><a href="buy.php" data-icon="shop" data-transition="pop">Carretilla</a></li>
            <li><a href="buscar.php" data-icon="search" data-transition="pop">Buscar</a></li>
        </ul>
        </div>
      </div>

  </body>
</html>