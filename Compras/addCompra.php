<?php
	/*Incluir las variables y demás parámetros de ajuste del archivo configuracion.php*/
	require_once('../configuracion.php');
	/*Incluir la conexión a la base de datos*/
	include("../Clases/MySqli.php");
	/*Variables para enviar en la sentencia a la tabla*/
	$ID_Cliente = $_SESSION['user_session'];
	$Producto = $_POST["Producto"];
	if($Producto == "Carro"){
		$ID_Producto = $_POST['ID_Carro'];
	}
	else if($Producto == "Parte"){
		$ID_Producto = $_POST["ID_Parte"];
	}
	if($_SESSION["estado_membresia"] == "Activo"){
		$Descuento_Membresia = (int)$_POST["Descuento_Membresia"];
	}
	else{
		$Descuento_Membresia = 0;
	}
	if(isset($_POST["Descuento_Codigo"])){
		$Descuento_Codigo = (int)$_POST["Descuento_Codigo"];
	}
	else{
		$Descuento_Codigo = 0;
	}
	$Monto = (int)$_POST['Monto'];
	$Fecha_Compra = date("Y-m-d");
	$Monto_Total = (int)($Monto * (100 - ($Descuento_Codigo + $Descuento_Membresia))/100);
	$Estado = "Espera";
	/*Incluir el archivo header.php en la página*/
	require_once(HEADERADMIN);
	/*Sentencia insert hacia la tabla de compras*/
	$query = "INSERT INTO compras (ID_Cliente, ID_Producto, Producto, Fecha_Compra, Monto, Estado) VALUES ('$ID_Cliente', '$ID_Producto', '$Producto', '$Fecha_Compra', '$Monto_Total', '$Estado')";
	/*Si hay errores con la conexión con la base de datos*/
	if(!$result = mysqli_query($con, $query)){
		echo '<div id="mensaje">
				<center>
				<h2 class="title">Error al intentar realizar la compra</h2>'.
				mysqli_error($con)
				.'<br><input type=button value="Ir al inicio" onclick=self.location="'.ROOTURL.'?accion=listaCarros">  
				</center>
			</div>';
	}
	/*Si no hay errores y la ejecución es exitosa*/
	else{
		echo '<div id="mensaje"><center>
			<h2>Compra realizada</h2>
			<br>
			<input type=button value="Ir al inicio" onclick=self.location="'.ROOTURL.'?accion=listaCarros" class="btn"> 
			</center>
		</div>';
	}
	/*Incluir el archivo footer.php en la página*/
	require_once(FOOTERADMIN);
?>