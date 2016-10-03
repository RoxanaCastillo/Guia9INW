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
        <h1>Carretilla ::</h1>
    </div>

    
   <div class="content">      
		<div class="content-padded">
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


  </body>
</html>