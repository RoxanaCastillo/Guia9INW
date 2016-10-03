<?php
	header('Content-Type: application/json');
	$hostname = 'basews03.db.8917278.hostedresource.com';
	$database = 'basews03';
	$username = 'basews03';
	$password = 'F8Lio89@7uJG';

	$mysqli = new mysqli($hostname, $username,$password, $database);
	if ($mysqli -> connect_errno) {
		die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() . ") " . $mysqli -> mysqli_connect_error());
	}
	else
		//echo "Conexión exitosa!";
	

	$query = 'SELECT producto.id_producto, producto.nombre, producto.descripcion, producto.precio, producto.path_image, categoria.nombre AS "categoria", marca.nombre AS "marca" FROM producto INNER JOIN categoria ON producto.id_categoria = categoria.id_categoria INNER JOIN marca ON producto.id_marca = marca.id_marca ORDER BY categoria.nombre';
	$resultado=$mysqli->query($query);

	$rawdata = array();
	$i = 0;
	while ($row = mysqli_fetch_array($resultado)){
		$rawdata[$i] = $row;
        $i++;
	}

	echo json_encode($rawdata);
?>