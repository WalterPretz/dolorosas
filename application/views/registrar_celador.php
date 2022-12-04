<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('layout/header'); ?>
	<title>Registro de Celador</title>
</head>
<body>
	<header>
		<?php $this->load->view('layout/menu'); ?>
		<script type="text/javascript">document.oncontextmenu = function(){return false;}</script>
	</header>
	<div class="container-fluid">
		<section class="text-center">
			<br>
			<h4><i class="fa fa-hiking" style="color: #1345D6"></i> <i class="fa fa-plus"></i> <i class="fa fa-people-carry"></i> Registro de Celadora - Colaboradora</h4>
			<div class="registro blanco">
			<div class="alert" role="alert" style="color: #fff; font-weight: bold; background-color:#2A003B;">DATOS DE LA CELADORA / COLABORADORA</div>	
				<form class="needs-validation" id="registro_celador"  name="registro_celador" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-5">
						<label for="" class="morado"><i class="fa fa-user-plus"></i> Nombres</label>
						<input type="text" class="form-control text-center negro" name="nombre" id="nombre" minlength="3" required>
					</div>
					<div class="col-sm-4">
						<label for="" class="morado"><i class="fa fa-user-plus"></i> Apellidos</label>
						<input type="text" class="form-control text-center negro" name="apellido" id="apellido" minlength="3" required>
					</div>
					<div class="col-sm-3">
						<label for="" class="morado"><i class="fa fa-address-card"></i> No. de CUI del DPI</label>
						<input type="text" class="form-control positive text-center negro" name="cui" id="cui" maxlength="13" length="13" value="0">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="" class="morado"><i class="fa fa-calendar-day"></i> Fecha de Nacimiento</label>
						<input type="date" class="form-control text-center negro" id="nacimiento" name="nacimiento" required>
					</div>
					<div class="col-5 col-md-1">
						<label for="" class="morado"><i class="fa fa-heartbeat"></i> Edad</label>
						<input type="text" class="form-control text-center negro" id="edad" name="edad" value="" readonly required>
					</div>
					<div class="col-7 col-md-2">
						<label for="" class="morado"><i class="fa fa-venus-mars"></i> Género</label>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="genero" id="generom" value="Mujer" required checked>
						  <label class="form-check-label" for="exampleRadios1" checked>
						   Femenino
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="genero" id="generof" value="Hombre" required>
						  <label class="form-check-label" for="exampleRadios2">
						   Masculino
						  </label>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<label for="" class="morado"><i class="fa fa-phone"></i> Celular</label>
						<input type="text" class="form-control text-center positive negro" maxlength="9" minlength="8" id="numero" name="numero" required>
					</div>
					<div class="col-6 col-md-3">
						<label for="" class="morado"><i class="fa fa-mobile"></i> Celular 2</label>
						<input type="text" class="form-control text-center positive negro" maxlength="9" id="numero2" name="numero2" value="0">
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label for="" class="morado"><i class="fa fa-map-marker-alt"></i> Dirección</label>
						<input type="text" class="form-control text-center negro" name="direccion" id="direccion" required>
					</div>
					<div class="col-md-2">
						<label for="" class="morado"><i class="fa fa-map-marked-alt"></i> Departamento</label>
						<select class="custom-select negro form-control" id="departamento" required>
						</select>	 
					</div>
					<div class="col-md-3">
						<label for="" class="morado"><i class="fa fa-map-marked"></i> Municipio</label>
						<select class="custom-select negro form-control" name="muni" id="muni" required>
							<option value="" disabled selected>Seleccionar</option>
						</select>
					</div>
					<div class="col-md-2">
						<label for="" class="morado"><i class="fa fa-user-tie"></i> Tipo</label>
						<select class="custom-select negro form-control" name="tipo" id="tipo" required>
							<option value="" disabled selected>Tipo de Persona</option>
							<option value="Celadora">Celadora</option>
							<option value="Coordinadora">Coordinadora</option>
							<option value="Colaboradora" >Colaboradora</option>
						</select>	 
					</div>
				</div>
				<br>
				<div class="progress">
				  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="colcarga"><h5><i class="fa fa-newspaper"></i> Datos de la Colaboración</h5></div>
				<div class="row">
					<div class="col-sm-2 col-md-2 col-lg-2">
						<label class="arr"><i class="fa fa-hourglass-half"></i> Años Colaborando</label>
						<input type="text" class="form-control positive ford text-center espa" name="años" id="años" value="1" required>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2">
						<label class="arr"><i class="fa fa-money-bill-wave-alt"></i> Ofrenda</label>
						<input type="text" class="ford text-center espa positive" id="ofrenda" name="ofrenda" value="" maxlength="8" required>
					</div>
					<div class="col-sm-5 col-md-5 col-lg-5">
						<label class="arr"><i class="fa fa-info-circle"></i> Descripción</label>
						<input type="text" class="ford text-center espa" id="descripcion" name="descripcion" value="Colaboración Socia Honoraria <?php echo date('Y'); ?>." required>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<label class="arr"><i class="fa fa-people-carry"></i> Cargar</label>
						<select class="custom-select negro form-control" name="cargar" id="cargar" required>
							<option value="" disabled selected>Seleccionar</option>
							<option value="No">No Desea Cargar</option>
							<option value="Colaboradora">Colaboradora</option>
							<option value="Honor Salida">Turno de Honor Salida</option>
							<option value="Honor Entrada">Turno de Honor Entrada</option>
						</select>	 
					</div>
				</div>
				<br>
				<center><button type="submit" class="btn btn-primary botones" id="guardar_datos" name="guardar_datos" ><i class="fa fa-save"></i> Guardar Celador</button></center>
				</form>
			</div>
		</section>
	</div>
	<br>
	<footer class="oculalimprimir" style="background: linear-gradient(70deg, #4B0082, #0D011C);"><?php $this->load->view('layout/footer') ?></footer>
	<script type="text/javascript">
	$(document).ready(function(){
    	validarCualquierNumero()
  	});

	 function validarCualquierNumero(){
	    $(".numeric").numeric();
	    $(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
	    $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
	    $(".decimal-2-places").numeric({ decimalPlaces: 2 });
	    $("#remove").click(
	      function(e)
	      {
	        e.preventDefault();
	        $(".numeric,.positive,.decimal-2-places").removeNumeric();
	      }
	      );
  	};

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

	//funcion Ajax para buscar en base de datos
	$(function(){
		$.post('<?=$base_url?>/celador/departamento').done(function(respuesta){
		$('#departamento').html(respuesta);
	});

	//lista de municipios
	$('#departamento').change(function(){
		var id_depto = $(this).val();

		$.post('<?=$base_url?>/celador/municipio',{departamento: id_depto}).done(function(respuesta){
				$('#muni').html(respuesta);
			});
		});
	});
//regis cel
	$('#registro_celador').submit(function(e){
    e.preventDefault();

    $.ajax({
      	url: '<?=$base_url?>/celador/crearCelador',
        type: "post",
        async: true,
        data: $('#registro_celador').serialize(),  
        success: function(response){
          if (response != 'error') {
            $('#nombre').val('');
            $('#apellido').val('');
            $('#cui').val('');
            $('#nacimiento').val('');
            $('#edad').val('');
            $('#generom').val('');
            $('#generof').val('');
            $('#numero').val('');
            $('#numero2').val('');
            $('#direccion').val('');
            $('#departamento').val('');
            $('#muni').val('');
            $('#tipo').val('');
            $('#años').val('');
            $('#ofrenda').val('');
            $('#descripcion').val('');
            $('#guardar_datos').slideUp();

            Swal.fire({
           	title: 'Se a registrado con éxito a la Colaboradora/Celadora.',
					  icon: 'success',
					  confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',

					  }).then((result) => {
						  if (result.isConfirmed) {
						   	var info = $.parseJSON(response);  
           			window.location.href='<?=$base_url?>/celador/comrpobante/'+info+' ';
						  } else {
						    var info = $.parseJSON(response);  
           			window.location.href='<?=$base_url?>/celador/comrpobante/'+info+' ';
						  }
						});	
          }
        	else {
        		Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  text: 'Hubo un problema en el registro, vuelva nuevamente a registrar.!',
						})
						location.reload();
							
        	}
        }
    });
  });

	$('#nacimiento').change(function(e){
    e.preventDefault();
    	var naci = $("#nacimiento").val();
    	var fechasel = new Date(naci);
    	var factual = new Date();
    	var edad = ((parseInt(factual - fechasel) / (1000*60*60*24*365.25)));
    	var redad = parseFloat(Math.round(edad).toFixed(2));
    	$('#edad').val(redad);
    	if(redad > 100 || redad === NaN || redad < 0 || redad < 5){
    		$('#guardar_datos').slideUp();
    	}else{
    		$('#guardar_datos').slideDown();
    	}
	});

	</script>
</body>
</html>