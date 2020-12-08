<!DOCTYPE html>
<html lang="es">  
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Agencias RIALEMAR&copy;</title>
		<link rel="icon" href="<?=ROOTURLSERVIDOR?>images/logo.ico" type="image/x-icon/">
		<link rel="icon" href="<?=ROOTURLSERVIDOR?> favicon.ico" type="image/x-icon/">
		<link rel="stylesheet" type="text/css" href="<?=CSS?>header.css">
		<link rel="stylesheet" type="text/css" href="<?=CSS?>general.css">
		<link rel="stylesheet" type="text/css" href="<?=CSS?>cars.css">
		<link rel="stylesheet" type="text/css" href="<?=CSS?>formulario.css">
		<script src="https://kit.fontawesome.com/146714d81a.js" crossorigin="anonymous"></script>
		<script src="<?=JS?>fechaActual.js"></script>
	</head>
	<body>
		<?php
			$accion = "";
			if(isset($_GET['accion'])){
				$accion = $_GET['accion'];
			}
		?>
		<header>
			<div class="header">
				<div class="logo">
					<div class="imglogo" onclick="window.location.href='<?=ROOTURL?>?accion=home'"><img src="<?=ROOTURLSERVIDOR?>Images/logo.png" alt="Logo"></div>
				</div>
				<div class="select">
					<a href="<?=ROOTURL?>?accion=home">INICIO</a>
				</div>
				<div class="select">
					<a href="<?=ROOTURL?>?accion=listaCarros">AUTOS</a>
				</div>
				<div class="select">
					<a href="<?=ROOTURL?>?accion=listaPartes">PARTES</a>
				</div>
				<div class="select">
					<a href="<?=ROOTURL?>?accion=contact">CONT&Aacute;CTANOS</a>
				</div>
				<div class="select">
					<a href="<?=ROOTURL?>?accion=membership">MEMBRES&Iacute;A</a>
				</div>
				<?php if(isset($_SESSION["user_session"])){ ?>
				<div class="logged">
					<div class="username"><?php echo getDatosClienteLogin($_SESSION['user_session']); ?></div>
					<?php
					if($_SESSION['estado_membresia'] == "Activo"){ ?>
						<img src="<?=ROOTURLSERVIDOR?>Images/member.gif" alt="member" style="width: 60px; height: 60px; line-height: 35px;">
					<?php } ?>
					<div class="imgprofile"><img src="<?=ROOTURLSERVIDOR?>Images/logo.png" alt="Hola"></img></div>
					<div class="settings"><i class="fas fa-user-cog" onclick="window.location.href='<?=ROOTURL?>?accion=settings'"></i></div>
					<div class="settings"><i class="fas fa-sign-out-alt" onclick="window.location.href='<?=ROOTURL?>?accion=logout'"></i></div>
				</div>
				<?php }
				else{
				?>
				<div class="not-logged">
					<button class="btn" onclick="window.location.href='<?=ROOTURL?>?accion=login'"><span class="text">Iniciar sesi&oacute;n</span></button>
					<button class="btn" onclick="window.location.href='<?=ROOTURL?>?accion=register'"><span class="text">Registrarse</span></button>
				</div>
				<?php } ?>
			</div>
			<span id="line"></span>
		</header>
		<script>
            window.watsonAssistantChatOptions = {
                integrationID: "75889f21-f896-44db-af9c-27d6c0097ab5", // The ID of this integration.
                region: "us-south", // The region your integration is hosted in.
                serviceInstanceID: "28789021-4e6e-4b85-b62b-366c72cb6a22", // The ID of your service instance.
                onLoad: function(instance) { instance.render(); }
                };
            setTimeout(function(){
                const t=document.createElement('script');
                t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
                document.head.appendChild(t);
                });
        </script>
		