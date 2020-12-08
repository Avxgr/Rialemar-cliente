<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/validation.min.js"></script>
<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/mayus.js"></script>
<?php if($_GET['accion'] == "datosRenta"){ ?>
<script type="text/javascript" src="<?=ROOTURLSERVIDOR?>JS/selection.js"></script>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?=CSS?>carrodatos.css">
<?php 
if(isset($_SESSION["user_session"])){
	$resultado = False;
	$datosCarro = getDatosCarro($_GET["ID_Carro"]);
	$producto = "Carro";
	if($datosCarro != null){  
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
	#btn-comprar, #btn-rentar{
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
		<img src="<?=ROOTURLSERVIDOR?><?=$datosCarro[0]["Imagen"]?>" alt="Imagen">
	</div>
	<div class="info">
		<div class="nombre">Modelo: <?=$datosCarro[0]["Modelo_Carro"]?></div>
		<div class="precio" id="costo">$ <?=$datosCarro[0]["Precio_Carro"]?><?php if($_GET['accion'] == "datosCompra"){
		if($_SESSION["estado_membresia"] == "Activo"){
		?>
			<b style="color: green; font-size: 18px;">-<?=$datosCarro[0]["Porcentaje_Descuento_Membresia"]?>%</b> 
		<?php
			}
		} ?>
		<br><p>IVA Incluido</p></div>
		<div class="datos">
			<table>
				<tr><td class="bold">Marca del carro:</td><td><?=$datosCarro[0]["Marca_Carro"]?></td></tr>
				<tr><td class="bold">Tipo de transmisi&oacute;n:</td><td><?=$datosCarro[0]["Tipo_Transmision"]?></td></tr>
				<tr><td class="bold">Tipo de tracci&oacute;n:</td><td><?=$datosCarro[0]["Tipo_Traccion"]?></td></tr>
				<tr><td class="bold">Fecha de salida:</td><td><?=$datosCarro[0]["Fecha_Salida"]?></td></tr>
			</table>
		</div>
		<?php if($_GET["accion"] == "datosCompra"){ ?>
		<div id="botones">
			<form name="compra" id="compra" method="post" action="Compras/addCompra.php">
				<input type="hidden" name="ID_Carro" id="ID_Carro" value="<?=$_GET["ID_Carro"]?>">
				<input type="hidden" name="Monto" id="Monto" value="<?=$datosCarro[0]["Precio_Carro"]?>">
				<input type="hidden" name="Descuento_Membresia" id="Descuento_Membresia" value="<?=$datosCarro[0]["Porcentaje_Descuento_Membresia"]?>">
				<input type="hidden" name="Producto" id="Producto" value="Carro">
				<?php if($resultado == True){ ?>
				<input type="hidden" name="Descuento_Codigo" id="Descuento_Codigo" value="<?=$datosCodigo[0]["Porcentaje_Descuento"]?>">
				<?php } ?>
			</form>
			<form id="codigo" name="codigo" method="post" action="#">
				<div><label>Código de descuento: </label><input name="txt-codigo" id="txt-codigo" maxlength=6 type="text" name="txt-codigo"><button id="descontar">+</button></div>
			</form>
			<div><button form="compra" id="btn-comprar" name="btn-comprar" type="submit">Comprar</button></div>
		</div>
		<?php }else{ ?>
		<div id="botones">
			<form name="renta" id="renta" method="post" action="Rentas/addRenta.php">
				<input type="hidden" name="ID_Carro" id="ID_Carro" value="<?=$_GET["ID_Carro"]?>">
				<input id="1semana" name="1_semana" form="renta" type="hidden" value="<?=((int)$datosCarro[0]["Precio_Carro"]*((int)$datosCarro[0]["Porcentaje_Costo_Renta"]-10))/100?>">
				<input id="2semanas" name="2_semanas" form="renta" type="hidden" value="<?=((int)$datosCarro[0]["Precio_Carro"]*((int)$datosCarro[0]["Porcentaje_Costo_Renta"]-5))/100?>">
				<input id="3semanas" name="3_semanas" form="renta" type="hidden" value="<?=((int)$datosCarro[0]["Precio_Carro"]*(int)$datosCarro[0]["Porcentaje_Costo_Renta"])/100?>">
				<div><label for="codigo">Duraci&oacute;n: </label>
					<select id="duracion" name="duracion">
						<option id="1" name="1 semana" value=7>1 semana</option>
						<option id="2" name="2 semanas" value=14>2 semanas</option>
						<option id="3" name="3 semanas" value=21>3 semanas</option>
					</select>
				</div>
				<div><button id="btn-rentar" name="btn-rentar" type="submit">Rentar</button></div>
			</form>
		</div>
		<?php } ?>
	</div>
</div>
<?php }} ?>