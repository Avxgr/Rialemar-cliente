<?php
	/*Incluir las variables y demás parámetros de ajuste del archivo configuracion.php*/
	require_once('../configuracion.php');
	/*Incluir la conexión a la base de datos*/
	include("../Clases/MySqli.php");
	/*Variables para enviar en la sentencia a la tabla*/
	$ID_Cliente = $_SESSION['user_session'];
	$ID_Carro = $_POST['ID_Carro'];
	$Fecha_Renta = date("Y-m-d");
	$Duracion = $_POST["duracion"];
	$semanas1 = $_POST["1_semana"];
	$semanas2 = $_POST["2_semanas"];
	$semanas3 = $_POST["3_semanas"];
	switch($Duracion){
		case 7:
			$Monto = (int)$semanas1;
		break;
		case 14:
			$Monto = (int)$semanas2;
		break;
		case 21:
			$Monto = (int)$semanas3;
		break;
	}
	$Estado = "Espera";
	/*Incluir el archivo header.php en la página*/
	require_once(HEADERADMIN);
	/*Sentencia insert hacia la tabla de rentas*/
	$query = "INSERT INTO rentas (ID_Cliente, ID_Carro, Fecha_Renta, Duracion, Monto, Estado) VALUES ('$ID_Cliente', '$ID_Carro', '$Fecha_Renta', '$Duracion', '$Monto', '$Estado')";
	/*Si hay errores con la conexión con la base de datos*/
	if(!$result = mysqli_query($con, $query)){
		echo '<div id="mensaje">
				<center>
				<h2 class="title">Error al intentar realizar la renta</h2>'.
				mysqli_error($con)
				.$Fecha_Final.'<br><input type=button value="Ir al inicio" onclick=self.location="'.ROOTURL.'?accion=listaCarros">  
				</center>
			</div>';
	}
	/*Si no hay errores y la ejecución es exitosa*/
	else{
		echo '<div id="mensaje"><center>
			<h2>Renta realizada</h2>
			<br>
			<input type=button value="Ir al inicio" onclick=self.location="'.ROOTURL.'?accion=listaCarros" class="btn"> 
			</center>
		</div>';
	}
	/*Incluir el archivo footer.php en la página*/
	require_once(FOOTERADMIN);
?>