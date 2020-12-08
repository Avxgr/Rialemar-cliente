	<div id="big_block" style="background-image: url('<?=ROOTURLSERVIDOR?>Images/bg-home7.png'); background-repeat:repeat; background-position:center; background-size: 145%;"> <!--Bloque en donde se almacenaran los bloques de los registros de la tabla Carros-->
	<?php //se lee cada registro de y cada campo de la lista de Carros
        $listaPartes = getListaPartes();
		foreach($listaPartes as $key=>$array) //Lee los registros de la tabla Carros
	{
	?>
	<div class="blocks"> <!--Bloque en donde irá cada registro-->
		<div class="car_block"> <!--Bloque en donde irá la imagen descriptiva del carro-->
			<img class="pic_car" src="<?=ROOTURLSERVIDOR.$array['Imagen']?>"> <!--Imagen del carro-->
		</div>
		<div class="info_block"> <!--Bloque en donde va una tabla con la descripción del carro-->
			<table class="info_table"> <!--Bloque que despliega los campos de cada registro de la tabla Carros-->
<!--Columna que contiene la decripción del campo--><!--Columna que despliega los campos del registro actual en celdas-->
                <tr><td>Nombre de Pieza: </td><td><?=$array['Nombre_Parte']?></td></tr>
				<tr><td>Modelo del carro: </td><td><?=$array['Modelo_Parte']?></td></tr>
				<tr><td>Marca de Pieza: </td><td><?=$array['Marca_Parte']?></td></tr>
				<tr><td>Costo: </td><td>$<?=$array['Precio_Parte']?></td></tr>
				<?php if(isset($_SESSION['user_session'])){ ?>
					<!--Botón que manda el ID del registro actual al archivo addCompra.php-->
					<tr><td style="padding-left: 30%; padding-right: 20%;"><button class="button" onclick="location.href='<?=ROOTURL?>?accion=datosCompraP&ID_Parte=<?=$array['ID_Parte']?>'">Comprar</button></td>
					<!--Botón que manda el ID del registro actual al archivo addRenta.php-->
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
<?php } ?>
	</div>					