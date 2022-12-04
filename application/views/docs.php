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
		<br>
		<center>
		<div class="video-responsive" style="margin: 20px;">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/Che1U1eCaHY?start=40" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div>
			<img src="<?=$base_url?>/recursos/img/logo.png" class=" img-fluid center" width="350">
		</div>
		<br>
		<h4 class="text-center">Área de Descarga</h4>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label>Logo | Emblema</label>
				<a href="<?=$base_url?>/recursos/img/logo.png" download="Virgen_de_Dolores" title="Virgen_de_Dolores" style="text-align: right;">
				<button class="btn btn-primary"><i class="fa fa-image"></i></button>
				</a>
			</div>
		</div>
		</center>
	</div>
	<br><br>
	<footer style="background: linear-gradient(70deg, #4B0082, #0D011C);"><?php $this->load->view('layout/footer') ?></footer>
</body>
</html>