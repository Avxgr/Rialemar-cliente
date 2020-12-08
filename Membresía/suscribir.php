<?php 
if(isset($_POST["btn-subscribe"])){
	require_once '../configuracion.php';
	$db_host = DBHOST;
	$db_name = DB;
	$db_user = DBUSER;
	$db_pass = DBPASSWD;
	try{
		$user = $_SESSION["user_session"];
		$hoy = date("Y-m-d");
		$fechaInicio = date("Y")."-".date("m")."-".date("d");
		$fechaFin = ((int)date("Y") + 1)."-".date("m")."-".date("d");
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $db_con->prepare("INSERT INTO membresia (ID_Cliente, Fecha_Inicio, Fecha_Fin) VALUES (?, ?, ?)");
		$stmt->execute([$user, $fechaInicio, $fechaFin]);
		header("Location: editEstado.php");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}
?>