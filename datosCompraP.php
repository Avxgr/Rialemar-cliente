<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/validation.min.js"></script>
<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/mayus.js"></script>
<link rel="stylesheet" type="text/css" href="<?=CSS?>carrodatos.css">

<?php 
if(isset($_SESSION["user_session"])){
	$resultado = False;
	$datosParte = getDatosParte($_GET["ID_Parte"]);
	if($datosParte != null){  
?>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap');
	body{
		background-color: rgb(237, 237, 237);
	}
	.car{
		font-family: 'Lato', sans-serif; 
		width: 70%;
		margin: 100px 15% 50px 15%;
		height: 412px;
		display: inline-flex;
		background-color: white;
		border-radius: 15px;
	}
	.img{
		width: 54%;
		height: 100%;
	}
	.img > img{
		width: 420px;
		height: 250px;
		padding: 17% 9% 17% 9%;
	}
	.info{
		width: 45%;
		height: 95%;
		margin: 9px 10px 9px 10px;
		border-radius: 15px;
		border: 2px solid black;
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
	}
	.nombre{
		margin: 0 20px 0 20px;
		width: 97%;
		height: 10%;
		font-size: 20px;
		font-weight: bold;
		line-height: 90px;
	}
	.precio{
		margin: 10px 20px 0 20px;
		width: 97%;
		height: 10%;
		font-size: 34px;
		font-weight: light;
	}
	.datos{
		margin: 30px 20px 0 20px;
		width: 97%;
		height: 30%;
	}
	table .bold{
		font-weight: bold;
	}
	.car p{
		font-family: "Lato", sans-serif;
		font-size: 18px;
		padding: 0;
		margin: 0;
	}
	#botones{
		margin: 0 20px 0 20px;
		width: 97%;
		height: 24%;
	}
	#txt-codigo{
		width: 34%;
	}
	#descontar{
		width: 40px;
		height: 40px;
		background-color: rgb(16, 136, 209);
		color: white;
		border-radius: 10px;
		margin-left: 15px;
		font-size: 20px;
	}
	#btn-comprar{
		width: 90%;
		height: 40px;
		background-color: rgb(16, 136, 209);
		color: white;
		border-radius: 10px;
		margin: 5px 0px 5px 0px;
		font-size: 18px;
	}
</style>
<?php 
if(isset($_GET["ID_Parte"])){
	$producto = "Parte";
}
if(isset($_POST["txt-codigo"])){
	$resultado = verificarCodigo($_POST["txt-codigo"], $producto);
	if($resultado == True){
		echo "<script>
			$(document).ready(function(){
				$('#descontar').css('background-color', 'green');
				$('#descontar').attr('disabled', 'true');
				$('#txt-codigo').attr('disabled', 'true');
			});
		</script>";
		$datosCodigo = getDatosCodigo($_POST["txt-codigo"]);
	}
	else{
		echo "<script>
			$(document).ready(function(){
				$('#descontar').css('background-color', 'red');	
			});
		</script>";
	}
}
?>
<div class="car">
	<div class="img">
		<img src="<?=ROOTURLSERVIDOR?><?=$datosParte[0]["Imagen"]?>" alt="Imagen">
	</div>
	<div class="info">
		<div class="nombre">Nombre: <?=$datosParte[0]["Nombre_Parte"]?></div>
		<div class="precio" id="costo">$ <?=$datosParte[0]["Precio_Parte"]?><?php if($_SESSION["estado_membresia"] == "Activo"){
			echo '<b style="color: green; font-size: 18px;">-'.$datosParte[0]["Porcentaje_Descuento_Membresia"].'%</b>';
		} ?><br><p>IVA Incluido</p></div>
		<div class="datos">
			<table>
				<tr><td class="bold">Nombre de la parte:</td><td><?=$datosParte[0]["Nombre_Parte"]?></td></tr>
				<tr><td class="bold">Modelo del carro:</td><td><?=$datosParte[0]["Modelo_Parte"]?></td></tr>
				<tr><td class="bold">Marca_Parte</td><td><?=$datosParte[0]["Marca_Parte"]?></td></tr>
			</table>
		</div>
		<div id="botones">
			<form name="compra" id="compra" method="post" action="Compras/addCompra.php">
				<input type="hidden" name="ID_Parte" id="ID_Parte" value="<?=$_GET["ID_Parte"]?>">
				<input type="hidden" name="Monto" id="Precio_Parte" value="<?=$datosParte[0]["Precio_Parte"]?>">
				<input type="hidden" name="Descuento_Membresia" id="Descuento_Membresia" value="<?=$datosParte[0]["Porcentaje_Descuento_Membresia"]?>">
				<input type="hidden" name="Producto" id="Producto" value="Parte">
				<?php if($resultado == True){ ?>
				<input type="hidden" name="Descuento_Codigo" id="Descuento_Codigo" value="<?=$datosCodigo[0]["Porcentaje_Descuento"]?>">
				<?php } ?>
			</form>
			<form id="codigo" name="codigo" method="post" action="#">
				<div><label>Código de descuento: </label><input name="txt-codigo" id="txt-codigo" maxlength=6 type="text" name="txt-codigo"><button id="descontar">+</button></div>
			</form>
			<div><button form="compra" id="btn-comprar" name="btn-comprar" type="submit">Comprar</button></div>
		</div>
	</div>
</div>
<?php }} ?>