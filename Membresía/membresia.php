<link rel="stylesheet" type="text/css" href="<?=CSS?>membresia.css">

<div class="membresia">
	<div class="bloque">
		<div class="descripcion">
			<div class="titulo"><h1>Membres&iacute;a Rialemar&copy;</h1></div>
			<div class="texto"><p>¿Ya tienes un carro?, ¿tienes un seguro de autos? La membres&iacute;a Rialemar&copy;
			 te permite obtener un seguro de auto por un año, además, te permite obtener descuentos especiales
			 cuando compres con nosotros en nuestros departamentos de autos y partes de autos. Este complemento
			 mejora tu experiencia con tu auto, porque, si ya tienes ese auto tan bonito y no lo quieres perder
			 o dañar, esta membres&iacute;a es para t&iacute;.</p></div>
			<?php 
			if(isset($_SESSION["user_session"])){ 
				if($_SESSION["estado_membresia"] == "Inactivo"){
			?>
			<div><form method="post" action="Membresía/suscribir.php"><button id="btn-subscribe" name="btn-subscribe" type="submit">Suscribirme</button></form></div>
			<?php 
				}else if($_SESSION["estado_membresia"] == "Activo"){ ?>
				<div><button id="btn-done">Ya est&aacute;s suscrito</button></div>	
				<?php 
				}
			}else{ ?>
			<div class="nulo"></div>
			<?php } ?>
		</div>
		<div class="imagenes">
			<img src="<?=ROOTURLSERVIDOR?>Images/member_insurance.png" alt="car insurance">
			<img src="<?=ROOTURLSERVIDOR?>Images/member_dis_car.png" alt="car discount">
			<img src="<?=ROOTURLSERVIDOR?>Images/member_dis_parts.png" alt="parts discount">
		</div>
	</div>
	<div class="barra">
		<div class="cuadro">
			<div class="simbolo">
				<i class="fas fa-car-crash fa-2x"></i>
			</div>
			<div class="texto-desc">
				<div class="texto-chico">
					<span>Seguro de auto</span>
				</div>
				<div class="texto-chico-dos">
					<span>Por 1 año</span>
				</div>
			</div>
		</div>
		<div class="cuadro">
			<div class="simbolo">
				<i class="fas fa-car fa-2x"></i>
			</div>
			<div class="texto-desc">
				<div class="texto-chico">
					<span>Descuentos en autos</span>
				</div>
				<div class="texto-chico-dos">
					<span>Hasta un -5%</span>
				</div>
			</div>
		</div>
		<div class="cuadro">
			<div class="simbolo">
				<i class="fas fa-cogs fa-2x"></i>
			</div>
			<div class="texto-desc">
				<div class="texto-chico">
					<span>Descuentos en partes de autos</span>
				</div>
				<div class="texto-chico-dos">
					<span>Hasta un -15%</span>
				</div>
			</div>
		</div>
	</div>
</div>