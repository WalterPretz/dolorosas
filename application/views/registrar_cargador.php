<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('layout/header'); ?>
	<title>Registro de Cargadora</title>
</head>
<body style="background: url('<?=$base_url?>/recursos/img/fondo.png');">
	<header>
		<?php $this->load->view('layout/menu'); ?>
		<script type="text/javascript">document.oncontextmenu = function(){return false;}</script>
	</header>
	<div class="container-fluid">
		<br>
		<section class="text-center">
				<div class="row">
					<div class="col-12 col-md-4"><h5><i class="fa fa-hiking"></i> <i class="fa fa-cross" style="color: #1345D6"></i> <i class="fa fa-people-carry"></i> Registro de Cargadora</h5></div>
						<div class="col-12 col-md-8 oculto">
					<?php if ($this->session->ROL == 'Directora') { ?>	
						<button type="button" class="btn btn-primary botones btn-sm" id="habilitar">Ofrendas</button>
						<div class="registrofren blancor Ofrendas" style=" display: none;">
							<div class="row">
							<div class="col-12 col-md-12">
									<label style="font-weight: bold; color: #000000;">Cargadoras</label>
									<div class="row">
										<div class="col-6 col-md-6">
												<button type="button" class="btn btn-sm  btn-secondary botones" id="habilitarofre" data-bs-toggle="modal" data-bs-target="#ofren"> <i class="fa fa-people-carry"></i> Cargadora</button>
										</div>
										<div class="col-6 col-md-6"><button type="button" class="btn btn-warning botones btn-sm" id="cerrar"><i class="fa fa-sign-out-alt"></i> Salir</button></div>
										</div>
							</div>
							</div>
						</div>
						</div>
					<?php  } ?>
				</div>
			<div class="registro blancor">
			<form class="needs-validation" name="cargadorNuevo" id="cargadorNuevo" enctype="multipart/form-data">
				<div class="colcarga" style="margin-top: -20px;"><h5><i class="fa fa-user-tie"></i> Datos de la cargadora</h5></div>
				<input type="hidden" id="id_resultado" name="id_resultado" value="">
				<input type="hidden" id="id_inscripcion" name="id_inscripcion" value="">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-lg-4">
						<label for="validationCustom02" class="arr"><i class="fa fa-signature"></i> Nombres | BUSCAR</label>
						<input type="text" class="ford text-center espa" autocomplete="off" name="nombre"  required placeholder="Buscar ..." onKeyup="buscarData()" id="buscarCargadora" aria-selected="false">
							<select class="ford" id="resultaSearch" size="10" style="height: 150px; display: none;"></select>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
						<label for="validationCustom03" class="arr"><i class="fa fa-signature"></i> Apellidos</label>
						<input type="text" class="ford text-center espa" name="apellido" id="apellidos" required>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
						<label for="validationCustom04" class="arr"><i class="fa fa-id-card"></i> CUI</label>
						<input type="text" class="ford text-center positive espa" id="cui" name="cui" value="0" maxlength="13">
					</div>
				</div>
				<div class="row">
					<div class="col-9 col-sm-2 col-md-3 col-lg-3">
						<label for="validationCustom05" class="arr"><i class="fa fa-calendar-day"></i> Fecha de Nacimiento</label>
						<input type="date" class="ford text-center espa" id="fecha" name="fecha" required>
					</div>
					<div class="col-3 col-sm-2 col-md-1 col-lg-1">
						<label for="validationCustom06" class="arr"><i class="fa fa-heartbeat"></i> Edad</label>
						<input type="text" class="ford text-center espa" id="edad" name="edad" value="" required readonly>
					</div>
					<div class="col-12 col-sm-2 col-md-2 col-lg-2">
						<label for="" class="arr"><i class="fa fa-venus-mars"></i> Género</label>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="genero" id="generof" value="Femenino" required checked>
						  <label class="form-check-label" for="exampleRadios1">
						   Femenino
						  </label>
						</div>
					</div>
					<div class="col-6 col-sm-2 col-md-3 col-lg-3">
						<label for="" class="arr"><i class="fa fa-mobile-alt"></i> No. de cel</label>
						<input type="text" class="ford text-center positive espa" name="numero1" id="cel1" maxlength="8" required>
					</div>
					<div class="col-6 col-sm-2 col-md-3 col-lg-3">
						<label for="" class="arr"><i class="fa fa-mobile"></i> 2do. No. de cel</label>
						<input type="text" class="ford text-center positive espa"name="numero2" id="cel2" value="0" maxlength="8">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-6 col-lg-6">
						<label for="" class="arr"><i class="fa fa-map-marked-alt"></i> Dirección</label>
						<input type="text" class="ford text-center espa" name="direccion" id="direccion" required>
					</div>
					<div class="col-sm-4 col-md-3 col-lg-3">
						<label for="inputState" class="arr"><i class="fa fa-flag"></i> Departamento</label>
						<select class="custom-select ford inputState espa"  name="departamento" id="departamento" required>
						</select>
					</div>
					<div class="col-sm-4 col-md-3 col-lg-3">
						<label for="inputState" class="arr"><i class="fa fa-flag"></i> Municipio</label>
						<select class="custom-select ford inputState espa"  name="muni" id="municipio" required>
						</select>
					</div>
				</div>
				<br>
				<div class="progress">
				  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="colcarga"><h5><i class="fa fa-newspaper"></i> Datos de la Inscripción</h5></div>
				<div class="row">
					<div class="col-sm-2 col-md-2 col-lg-2">
						<label class="arr"><i class="fa fa-hourglass-half"></i> Años cargando</label>
						<input type="text" class="ford positive ford text-center espa" name="años" value="1" maxlength="3" id="anios" required>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2">
						<label class="arr"><i class="fa fa-ruler"></i> Altura en mts</label>
						<input type="text" class="ford positive ford text-center espa" name="altura" value="" maxlength="6" id="altura" required>
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">Presentarse el día Jueves Santo</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
			      <div class="form-check">
			        <input class="form-check-input" type="radio" name="vestimenta" id="gridRadios1" value="Si" required>
			        <label class="form-check-label" for="gridRadios1">Si</label>
			      </div>
			      <div class="form-check">
			        <input class="form-check-input" type="radio" name="vestimenta" id="gridRadios2" value="No" required checked>
			        <label class="form-check-label text-start" for="gridRadios2">No</label>
			      </div>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2">
						<label class="arr"><i class="fa fa-money-bill-wave-alt"></i> Ofrenda</label>
						<input type="text" class="ford text-center espa positive" id="ofrenda" name="ofrenda" value="" maxlength="8" required>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
						<label class="arr"><i class="fa fa-info-circle"></i> Descripción</label>
						<input type="text" class="ford text-center espa" id="descripcion" name="descripcion" value="" required>
					</div>
				</div>
				<div>
					<br>
		      <center>
		        <button type="submit" id="inscripcion" class="btn btn-primary"><i class="fa fa-save"></i> Inscribir</button>
		      </center>
				</div>
			</form>
			</div>
		</section>
	</div>
</div>
<br><br>
<!-- Modal -->
<div class="modal fade" id="ofren" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ofrenda Devotas Cargadoras</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form name="editarofrenda" id="editarofrenda">
      	<div class="row">
      		<div class="col-sm-3">
      			<label><i class="fa fa-money-bill-wave-alt"></i> Cantidad</label>
      			<input type="text" class="ford  text-center positive" id="canofren" name="canofren" value="" maxlength="8" required>
      		</div>
      		<div class="col-sm-9">
      			<label><i class="fa fa-signature"></i> Descripción</label>
      			<input type="text" class="ford text-center" id="desofren" name="desofren" value="" required>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarmod">Cerrar <i class="fa fa-sign-out-alt"></i></button>
        <button type="submit" class="btn btn-success" id="updateOfren" name="updateOfren">Actualizar Ofrenda <i class="fa fa-sync-alt"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
	<script>
	  $(document).ready(function(){
	    validarCualquierNumero();
	     ofrendas();
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

	    $(function(){
        $("#habilitar").click(function(){
            $(".Ofrendas").slideDown();
        });
  		});

  		$(function(){
        $("#cerrar").click(function(){
            $(".Ofrendas").slideUp();
        });
  		});


		$('#fecha').on('change', function(){
			var fecha_seleccionada = $('#fecha').val();
			var fecha_nacimiento = new Date(fecha_seleccionada);
			var fecha_Actual = new Date();
			var edad = (parseInt((fecha_Actual - fecha_nacimiento) / (1000*60*60*24*365.25)));
			$('#edad').val(edad);
			if (edad > 100 || edad < 8) {
				$('#inscripcion').slideUp();
			}else{
				$('#inscripcion').slideDown();
			}
		});

		$(function(){
        $("#cerrarmod").click(function(){
            $('#canofren').val('');
            $('#desofren').val('');
            $('#updateOfren').slideDown();
        });
  		});

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

		//funcion Ajax para buscar en base de datos
		$(function(){
			$.post('<?=$base_url?>/celador/departamento').done(function(respuesta){
				$('#departamento').html(respuesta);
			});

			//lista de municipios
			$('#departamento').change(function(){
				var id_depto = $(this).val();

				$.post('<?=$base_url?>/celador/municipio',{departamento: id_depto}).done(function(respuesta){
					$('#municipio').html(respuesta);
				});
			});
		});


		$('body').bind('cut copy paste', function (e) {
			e.preventDefault();
		});

//
	function ofrendas(){
    var action = 'buscarDatos';
    $.ajax({
        url: '<?=$base_url?>/cargador/datosCosto',
        type: "POST",
        async: true,
        data: {action:action},
        success: function(response){
          let data = JSON.parse(response);
          $('#ofrenda').val(data[0]['cantidad']);
          $('#descripcion').val(data[0]['descripcion']); 
      }
    });
  };

  $('#cargadorNuevo').submit(function(e){
    e.preventDefault();
      $.ajax({
          url: '<?=$base_url?>/cargador/crearNuevaInscripcion',
          type: "POST",
          async: true,
          data: $('#cargadorNuevo').serialize(),

          success: function(response){
          	data = $.parseJSON(response);
          	console.log(data);
        		if(data.length > 0){
        			Swal.fire({
	           	title: 'Se a registrado con éxito a la Cargadora.',
						  icon: 'success',
						  confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',

						  }).then((result) => {
						  if (result.isConfirmed) {
						   	var info = $.parseJSON(response);  
           			window.location.href='<?=$base_url?>/cargador/generacion/'+info+' ';
						  } else {
						    var info = $.parseJSON(response);  
           		window.location.href='<?=$base_url?>/cargador/generacion/'+info+' ';
						  }
						});	
          } else {
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

  $('#habilitarofre').click(function(e){
    e.preventDefault();

    var action = 'buscarDatos';
    $.ajax({
        url: '<?=$base_url?>/cargador/datosCosto',
        type: "POST",
        async: true,
        data: {action:action},
        success: function(response){
          let data = JSON.parse(response);
          $('#canofren').val(data[0]['cantidad']);
          $('#desofren').val(data[0]['descripcion']); 
      }
    });
  });

  $('#editarofrenda').submit(function(e){
    e.preventDefault();
        $.ajax({
            url: '<?=$base_url?>/cargador/updateOfrenda',
            type: "POST",
            async: true,
            data: $('#editarofrenda').serialize(),

            success: function(response){
              if (response == 'true') {
                $('#canofren').val('');
                $('#desofren').val('');
                $('#updateOfren').slideUp();
               
                Swal.fire({
                title: 'Actualización Exitosa.',
                icon: 'success',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
                 });
                ofrendas();
              }
            }
        });
  });

  //seccion para buscar a la cargadora
function buscarData(){
	let buscarData = document.getElementById('buscarCargadora').value;
	//console.log(buscarData);
	$.ajax({
		url: '<?=$base_url?>/cargador/buscarCargadora',
    type: "POST",
    data: {buscar:buscarData},
    success: function(response){
    	if (response.length > 1) {
    		$('#resultaSearch').css('display', 'block');
    		$('#resultaSearch').slideDown();
    		$("#resultaSearch").html(response);
    	}else {
    		$('#resultaSearch').css('display', 'none');
    		$('#resultaSearch').slideUp();
    		$('#id_resultado').val('0');
    		$('#apellidos').val('');
				$('#cui').val('');
				$('#fecha').val('');
				$('#edad').val('');
				$('#cel1').val('');
				$('#cel2').val('0');
				$('#direccion').val('');
				$('#departamento').val('');
				$('#municipio').val(''); 
				$('#anios').val('1');
				$('#altura').val('');
    	}
    }
	})
}

//busca los datos de la persona seleccionada
$('#resultaSearch').change(function(event) {
	event.preventDefault();
	let seleccionado = $(this).val();
	$.post('<?=$base_url?>cargador/datosGenerales',{persona: seleccionado}).done(function(respuesta){
		let result = $.parseJSON(respuesta);
		$('#resultaSearch').css('display', 'none');
    $('#resultaSearch').slideUp();
    $('#id_resultado').val(result[0]['id_cargador']);
		$('#buscarCargadora').val(result[0]['nombre']);
		$('#apellidos').val(result[0]['apellido']);
		$('#cui').val(result[0]['cui']);
		$('#fecha').val(result[0]['fecha']);
		$('#edad').val(result[0]['edad']);
		$('#genero').val(result[0]['genero']);
		$('#cel1').val(result[0]['numero1']);
		$('#cel2').val(result[0]['numero2']);
		$('#direccion').val(result[0]['direccion']);
		$('#departamento').val(result[0]['departamento']);
		$('#municipio').val(result[0]['municipio']); 
		$('#anios').val(result[0]['anios']);
		$('#id_inscripcion').val(result[0]['id_inscripcion']);
		$('#altura').val(result[0]['altura']);
	});
});
	</script>	
</body>
</html>