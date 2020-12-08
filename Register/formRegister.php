<script type="text/javascript" src="<?=ROOTURL?>JS/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="<?=ROOTURL?>JS/validation.min.js"></script>
<script type="text/javascript" src="<?=ROOTURL?>JS/form_scriptRegister.js"></script>
<script type="text/javascript" src="<?=ROOTURL?>JS/bootstrap.min.js"></script>


<link href="<?=CSS?>register.css" rel="stylesheet" type="text/css" media="screen">


	<div class="container" style="background-image: url('<?=ROOTURLSERVIDOR?>Images/bg-login.jpg'); background-position:bottom; background-size: 75%;">
		<form class="form-register" method="post" id="register-form">
			<h2 class="form-register-heading">Reg&iacute;strate</h2><hr/>
			<div id="error">
			</div>
			
				<input type="text" class="form-control" placeholder="Nombre" name="name" id="name"/>
				<span id="check-e"></span>
			
			
				<input type="text" class="form-control" placeholder="Apellido paterno" name="apaterno" id="apaterno"/>
			
			
				<input type="text" class="form-control" placeholder="Apellido materno" name="amaterno" id="amaterno"/>
			
			
				<input type="text" class="form-control" placeholder="Correo electr&oacute;nico" name="correo" id="correo"/>
			
			
				<input type="text" class="form-control" placeholder="Nombre de usuario" name="user" id="user"/>
			
			
				<input type="password" class="form-control" placeholder="Contrase&ntilde;a" name="password" id="password"/>
			
			
				<input type="number" min="18" max="99" maxlength="2" class="form-control" placeholder="Edad" name="edad" id="edad"/>
			
			
				<input type="tel" maxlength="10" class="form-control" placeholder="Tel&eacute;fono" name="telefono" id="telefono"/>
			
			
				<input type="text" class="form-control" placeholder="Domicilio" name="domicilio" id="domicilio"/>
			
			<hr/>
				<button type="submit" class="btn btn-default" name="btn-register" id="btn-register">
					<span class="glyphicon glyphicon-log-in"></span> &nbsp; Registrar
				</button> 	
			     
		</form>
    </div>    
