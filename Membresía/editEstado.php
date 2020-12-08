<?php 
require_once '../configuracion.php';
$db_host = DBHOST;
$db_user = DBUSER;
$db_pass = DBPASSWD;
$user = $_SESSION["user_session"];
$estado = "Activo";
try{
	$query = "UPDATE clientes SET Membresia = '$estado' WHERE ID_Cliente='$user'";
	if(!result == mysqli_query($con, $query)){
		header("Location: ../accion=membership");
		echo '<div id="mensaje">
			<center>
			<h2 class="title">Error al intentar guardar los cambios del empleado RIALEMAR</h2>'.
			mysqli_error($con)
			//este boton reenvia a la misma lista de los registros
			.'<br><input type=button value="Ir a la lista de Empleados RIALEMAR" onclick=self.location="'.ROOTURL.'?accion=membership">
			</center>
		</div>';
	}else{
		$_SESSION['estado_membresia'] = "Activo";
		header("Location: ../?accion=membership");
	}
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>