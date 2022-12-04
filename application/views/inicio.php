<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio</title>
	<?php $this->load->view('layout/header'); ?>
</head>
<body style="background: url('<?=$base_url?>/recursos/img/fondo.png');">
	<header><?php $this->load->view('layout/menu'); ?></header>
			<img src="<?=$base_url?>/recursos/img/emblema.jpg" class="img-fluid">
			<div style="background-color: #000000;">
			<br><br><br>
					<center>
			<div class="container">
				<?php
					if (isset($this->session->USUARIO)) { ;?>
					<a class="btn btn-primary btn-sm botones" style="display: none;" href="<?=$base_url?>/usuario"><i class="fa fa-user"></i> INGRESAR</a>	
				<?php }else{ ; ?>
				<a class="btn btn-lg botones" style="background-color: #3F0090; color: #FFFFFF;" href="<?=$base_url?>/usuario"><i class="fa fa-user"></i> INGRESAR</a>
				<?php	}; ?>
			</div>
		</center>
		<br><br><br>
		</div>
	</div>
	<div>
		<img src="<?=$base_url?>/recursos/img/por.jpg" class="img-fluid">
	</div>
	<footer style="background: linear-gradient(70deg, #4B0082, #0D011C);"><?php $this->load->view('layout/footer'); ?></footer>
</body>
</html>