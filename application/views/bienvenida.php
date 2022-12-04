<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<title>Vía Crucis</title>
	<?php $this->load->view('layout/header'); ?>
</head>
<body style="background: url('<?=$base_url?>/recursos/img/fondo.png');">
	<header>
		<?php $this->load->view('layout/menu'); ?>
	</header>
	<div class="container">
		<br><br><br><br>
		<center>
			<img src="<?=$base_url?>/recursos/img/logo.png" class="img-fluid" width="250">
			<br><br>
			<div>
				<h3>Bienvenido al Sistema de Registro de Cargadores y Celadores</h3>
			</div>
			<br>
		<div>
			<h2><?php echo $this->session->NOMBRE ?> <?php echo $this->session->APELLIDO ?></h2>
		</div>
		</center>
	</div>
	<br><br><br><br><br>
	<footer style="background: linear-gradient(70deg, #4B0082, #0D011C);"><?php $this->load->view('layout/footer') ?></footer>
</body>
</html>