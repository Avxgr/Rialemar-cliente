<?php
function getListaClientes(){			
	include("MySqli.php");  
	$query = "SELECT ID_Cliente, Nombre, APaterno, AMaterno, Edad, Telefono,Correo, Domicilio FROM clientes ORDER BY ID_Cliente ASC";
	if(!$result = mysqli_query($con, $query)){
		exit(mysqli_error($con));
	}
	$lista = array();
	if(mysqli_num_rows($result)>0){	
		while($row = mysqli_fetch_assoc($result)){	
			$lista[] = array(
				'ID_Cliente'=> $row['ID_Cliente'],
				'Nombre'=> $row['Nombre'],
				'APaterno'=> $row['APaterno'],
				'AMaterno'=> $row['AMaterno'],
				'Edad'=> $row['Edad'],
				'Telefono'=> $row['Telefono'],
				'Correo'=> $row['Correo'],
				'Domicilio'=> $row['Domicilio']
			);
		}
	}
	return $lista;
}

function getDatosCliente($ID_Cliente){
	include("MySqli.php");
	$query = "SELECT ID_Cliente, Nombre, APaterno, AMaterno, Edad, Telefono, Correo, Domicilio FROM clientes WHERE ID_Cliente=$ID_Cliente";
	if(!$result = mysqli_query($con, $query)){
        exit(mysqli_error($con));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $lista[] = array(
				'ID_Cliente' => $row['ID_Cliente'],
				'Nombre' => $row['Nombre'],
				'APaterno' => $row['APaterno'],
				'AMaterno' => $row['AMaterno'],
				'Edad' => $row['Edad'],
				'Telefono' => $row['Telefono'],
				'Correo' => $row['Correo'],
				'Domicilio' => $row['Domicilio']
			);
        }
    }
	return $lista;
}

function getListaCarros(){
	include("MySqli.php");
	$folderRuta = "Images/";
	$imagenNombre = "";
	$query = "SELECT * FROM carros ORDER BY ID_Carro ASC";
	if(!$result = mysqli_query($con, $query)){
		exit(mysqli_error($con));
	}
	$lista = array();
	if(mysqli_num_rows($result)>0){	
		while($row = mysqli_fetch_assoc($result)){	
			if($row['Imagen'] == "")
        		$imagenRuta = "0.png";
			else
        		$imagenRuta = $row['Imagen'];
			$lista[] = array(
				'ID_Carro'=> $row['ID_Carro'],
				'Marca_Carro'=> $row['Marca_Carro'],
				'Modelo_Carro'=> $row['Modelo_Carro'],
				'Color_Carro'=> $row['Color_Carro'],
				'Tipo_Transmision'=> $row['Tipo_Transmision'],
				'Tipo_Traccion'=> $row['Tipo_Traccion'],
				'Fecha_Salida'=> $row['Fecha_Salida'],
				'Precio_Carro'=> $row['Precio_Carro'],
				'Imagen'=> $folderRuta.$imagenRuta
			);
		}
	}
	return $lista;
}

function getListaPartes(){
	include("MySqli.php");
	$folderRuta = "Images/";
	$imagenNombre = "";
	$query = "SELECT * FROM partes ORDER BY ID_Parte ASC";
	if(!$result = mysqli_query($con, $query)){
		exit(mysqli_error($con));
	}
	$lista = array();
	if(mysqli_num_rows($result)>0){	
		while($row = mysqli_fetch_assoc($result)){	
			if($row['Imagen'] == "")
        		$imagenRuta = "0.png";
			else
        		$imagenRuta = $row['Imagen'];
			$lista[] = array(
				'ID_Parte'=> $row['ID_Parte'],
				'Nombre_Parte'=> $row['Nombre_Parte'],
				'Modelo_Parte'=> $row['Modelo_Parte'],
				'Marca_Parte'=> $row['Marca_Parte'],
				'Precio_Parte'=> $row['Precio_Parte'],
				'Imagen'=> $folderRuta.$imagenRuta
			);
		}
	}
	return $lista;
}

function getListaCarrosFiltered($postColor = "", $postMarca = ""){
	$booleano = false;
	$color = $postColor;	
	$marca = $postMarca;
	include("MySqli.php");
	$folderRuta = "Images/";
	$imagenNombre = "";
	$query = "SELECT * FROM carros ORDER BY ID_Carro ASC";
	if(!$result = mysqli_query($con, $query)){
		exit(mysqli_error($con));
	}
	$lista = array();
	$filtrado = array();
	$registro = array();
	if(mysqli_num_rows($result)>0){	
		while($row = mysqli_fetch_assoc($result)){	
			if($row['Imagen'] == "")
        		$imagenRuta = "0.png";
			else
        		$imagenRuta = $row['Imagen'];
			$lista[] = array(
				'ID_Carro'=> $row['ID_Carro'],
				'Marca_Carro'=> $row['Marca_Carro'],
				'Modelo_Carro'=> $row['Modelo_Carro'],
				'Color_Carro'=> $row['Color_Carro'],
				'Tipo_Transmision'=> $row['Tipo_Transmision'],
				'Tipo_Traccion'=> $row['Tipo_Traccion'],
				'Fecha_Salida'=> $row['Fecha_Salida'],
				'Precio_Carro'=> $row['Precio_Carro'],
				'Imagen'=> $folderRuta.$imagenRuta
			);
		}
	}
	for($i = 0; $i < count($lista); $i++){
		if($color != null and $marca != null){
			if($lista[$i]["Color_Carro"] == $color and $lista[$i]["Marca_Carro"] == $marca){
				array_push($filtrado, array(
					'ID_Carro'=> $lista[$i]['ID_Carro'],
					'Marca_Carro'=> $lista[$i]['Marca_Carro'],
					'Modelo_Carro'=> $lista[$i]['Modelo_Carro'],
					'Color_Carro'=> $lista[$i]['Color_Carro'],
					'Tipo_Transmision'=> $lista[$i]['Tipo_Transmision'],
					'Tipo_Traccion'=> $lista[$i]['Tipo_Traccion'],
					'Fecha_Salida'=> $lista[$i]['Fecha_Salida'],
					'Precio_Carro'=> $lista[$i]['Precio_Carro'],
					'Imagen'=> $lista[$i]['Imagen']
				));
			}
		}
		else if($color != null and $marca == null){
			if($lista[$i]["Color_Carro"] == $color){
				array_push($filtrado, array(
					'ID_Carro'=> $lista[$i]['ID_Carro'],
					'Marca_Carro'=> $lista[$i]['Marca_Carro'],
					'Modelo_Carro'=> $lista[$i]['Modelo_Carro'],
					'Color_Carro'=> $lista[$i]['Color_Carro'],
					'Tipo_Transmision'=> $lista[$i]['Tipo_Transmision'],
					'Tipo_Traccion'=> $lista[$i]['Tipo_Traccion'],
					'Fecha_Salida'=> $lista[$i]['Fecha_Salida'],
					'Precio_Carro'=> $lista[$i]['Precio_Carro'],
					'Imagen'=> $lista[$i]['Imagen']
				));
			}
		}
		else if($color == null and $marca != null){
			if($lista[$i]["Marca_Carro"] == $marca){
				array_push($filtrado, array(
					'ID_Carro'=> $lista[$i]['ID_Carro'],
					'Marca_Carro'=> $lista[$i]['Marca_Carro'],
					'Modelo_Carro'=> $lista[$i]['Modelo_Carro'],
					'Color_Carro'=> $lista[$i]['Color_Carro'],
					'Tipo_Transmision'=> $lista[$i]['Tipo_Transmision'],
					'Tipo_Traccion'=> $lista[$i]['Tipo_Traccion'],
					'Fecha_Salida'=> $lista[$i]['Fecha_Salida'],
					'Precio_Carro'=> $lista[$i]['Precio_Carro'],
					'Imagen'=> $lista[$i]['Imagen']
				));
			}
		}

	}
	if($filtrado == null){
		return $lista;
	}
	return $filtrado;
}

function filtrarCarrosPorPrecio($postColor = "", $postMarca = "", $postPrecio = 16000000){
	$filtrado = getListaCarrosFiltered($postColor, $postMarca);
	$subfiltrado = array();
	$precioMax = (int) $postPrecio;
	for($i = 0; $i < count($filtrado); $i++){
		if($filtrado[$i]["Precio_Carro"] < $precioMax + 1){
			array_push($subfiltrado, array(
				'ID_Carro'=> $filtrado[$i]['ID_Carro'],
				'Marca_Carro'=> $filtrado[$i]['Marca_Carro'],
				'Modelo_Carro'=> $filtrado[$i]['Modelo_Carro'],
				'Color_Carro'=> $filtrado[$i]['Color_Carro'],
				'Tipo_Transmision'=> $filtrado[$i]['Tipo_Transmision'],
				'Tipo_Traccion'=> $filtrado[$i]['Tipo_Traccion'],
				'Fecha_Salida'=> $filtrado[$i]['Fecha_Salida'],
				'Precio_Carro'=> $filtrado[$i]['Precio_Carro'],
				'Imagen'=> $filtrado[$i]['Imagen']
			));
		}
	}
	if($subfiltrado == null){
		return $filtrado;
	}	
	return $subfiltrado; 	
}

function getDatosCarro($ID_Carro){
	include("MySqli.php");
	$folderRuta = "Images/";
	$imagenNombre = "";
	$query = "SELECT * FROM carros WHERE ID_Carro=$ID_Carro";
    if (!$result = mysqli_query($con, $query)){
        exit(mysqli_error($con));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
			if($row['Imagen'] == "")
        		$imagenRuta = "0.png";
			else
        		$imagenRuta = $row['Imagen'];
            $lista[] = array(
				'ID_Carro' => $row['ID_Carro'],
				'Marca_Carro' => $row['Marca_Carro'],
				'Modelo_Carro' => $row['Modelo_Carro'],
				'Color_Carro' => $row['Color_Carro'],
				'Tipo_Transmision' => $row['Tipo_Transmision'],
				'Tipo_Traccion' => $row['Tipo_Traccion'],
				'Fecha_Salida' => $row['Fecha_Salida'],
				'Precio_Carro' => $row['Precio_Carro'],
				'Porcentaje_Costo_Renta' => $row['Porcentaje_Costo_Renta'],
				'Porcentaje_Descuento_Membresia' => $row['Porcentaje_Descuento_Membresia'],
				'Imagen' => $folderRuta.$imagenRuta
			);
        }
    }
	return $lista;
}

function getDatosParte($ID_Parte){
	include("MySqli.php");
	$folderRuta = "Images/";
	$imagenNombre = "";
	$query = "SELECT * FROM partes WHERE ID_Parte=$ID_Parte";
    if (!$result = mysqli_query($con, $query)){
        exit(mysqli_error($con));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
			if($row['Imagen'] == "")
        		$imagenRuta = "0.png";
			else
        		$imagenRuta = $row['Imagen'];
            $lista[] = array(
				'ID_Parte' => $row['ID_Parte'],
				'Nombre_Parte' => $row['Nombre_Parte'],
				'Modelo_Parte' => $row['Modelo_Parte'],
				'Marca_Parte' => $row['Marca_Parte'],
				'Precio_Parte' => $row['Precio_Parte'],
				'Porcentaje_Descuento_Membresia' => $row['Porcentaje_Descuento_Membresia'],
				'Imagen' => $folderRuta.$imagenRuta
			);
        }
    }
	return $lista;
}

function getDatosClienteLogin($ID_Cliente){
	include("MySqli.php");
	$nombre = "";
	$query = "SELECT Nombre, APaterno, AMaterno FROM clientes WHERE ID_Cliente=$ID_Cliente";
	if(!$result = mysqli_query($con, $query)){
        exit(mysqli_error($con));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0){ 
        while ($row = mysqli_fetch_assoc($result)){
            $nombre = $row['Nombre']." ".$row['APaterno']." ".$row['AMaterno'];
        }
    }
	return $nombre;
}

function getDatosCodigo($postCodigo){
	include("MySqli.php");
	$query = "SELECT * FROM codigos_descuentos WHERE Codigo = '$postCodigo'";
	if (!$result = mysqli_query($con, $query)){
		exit(mysqli_error($con));
	}
	$lista = array();
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$lista[] = array(
				'ID_Codigo' => $row['ID_Codigo'],
				'Codigo' => $row['Codigo'],
				'Porcentaje_Descuento' => $row['Porcentaje_Descuento'],
				'Estado' => $row['Estado'],
				'Categoria' => $row['Categoria'],
			);
		}
	}
	return $lista;
}

function verificarCodigo($postCodigo, $postProducto){
	include("MySqli.php");
	$codigo = $postCodigo;
	$producto = $postProducto;
	$query = "SELECT * FROM codigos_descuentos WHERE Codigo = '$codigo'";
	$resultado = False;
	if (!$result = mysqli_query($con, $query)){
		exit(mysqli_error($con));
	}
	$lista = array();
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$lista[] = array(
				'ID_Codigo' => $row['ID_Codigo'],
				'Codigo' => $row['Codigo'],
				'Estado' => $row['Estado'],
				'Categoria' => $row['Categoria'],
			);
		}
		if($producto == "Carro" and $lista[0]["Categoria"] == "Carros" and $lista[0]["Estado"] == "Activo"){
		$resultado = True;
		}
		else if($producto == "Parte" and $lista[0]["Categoria"] == "Partes" and $lista[0]["Estado"] == "Activo"){
			$resultado = True;
		}
		else{
			$resultado = False;
		}
	}
	else{
		$resultado = False;
	}
	return $resultado;
}
//PRÓXIMAS FUNCIONES
?>