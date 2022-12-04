<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('layout/header'); ?>
	<title>Autenticación</title>
</head>
<body style="background: url('<?=$base_url?>/recursos/img/fondo.png');">
	<?php $this->load->view('layout/menu'); ?>
	<header>
		<br>
		<center><h3 style="color: #D4AF37; font-weight: bold; text-shadow: 1px 1px 1px #352500"><img src="<?=$base_url?>/recursos/img/logo.ico" class="img-fluid" width="50"> Hermandad Virgen de Dolores</h3></center>
	</header>
	<br>
<section>
	<div class="contorno">
		<div>
			<div class="row">
				<form class="form-container needs-validation" novalidate action="<?=$base_url?>/usuario" method="POST">
					<div class="form-group">
						<label for="user1 validationUsername"><i class="fa fa-user"></i> Usuario</label>
						<input type="text" class="form-control" name="usuario" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
						<div class="invalid-feedback">Ingrese su usuario.</div>
					</div>
					<div class="form-group">
						<label for="Pasword"><i class="fa fa-key"></i> Contraseña</label>
						<input type="password" class="form-control" name="clave" autocomplete="false" required>
						<div class="invalid-feedback">Ingrese su contraseña.</div>
					</div>
					<br>
					<td colspan="2">
						<center><input type="submit" id="btnAL_1" class="btn btn-primary btn-md botones" role="button" name="login" value="Ingresar"></center>
					</td>
					<center>
						<br>
						<img src="<?=$base_url?>/recursos/img/adorno.png" width="200">
					</center>
				</form>						
		</div>
		<div class="alert alert" role="alert" class="alert-link" style="color: #4B019F" onclick="$(this).hide(1000)"><h5><?=$mensaje?></h5>
	</div>
</div>
</section>
<br><br>
</body>
<footer style="background: linear-gradient(70deg, #4B0082, #0D011C);"><?php $this->load->view('layout/footer'); ?></footer>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</html>
