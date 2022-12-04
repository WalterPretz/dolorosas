<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('layout/header'); ?>
	<title>Registro</title>
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
					<div class="col-12 col-md-4"><h5><i class="fa fa-fire"></i></i> <i class="fa fa-cross" style="color: #1345D6"></i> <i class="fa fa-flag"></i> Registro de Estandartes e Incensarios <?php echo date('Y') ?></h5></div>
						<div class="col-12 col-md-8 oculto">
					<?php if ($this->session->ROL == 'Directora') { ?>	
						<button type="button" class="btn btn-primary botones btn-sm" id="habilitar">Ofrendas</button>
						<div class="registrofren blancor Ofrendas" style=" display: none;">
							<div class="row">
								<div class="col-6 col-md-5">
									<label style="font-weight: bold; color: #000000;">Incensarios</label>
									<div class="row">
										<div class="col-6 col-md-6">
										<button type="button" class="btn btn-sm  btn-info botones" id="incensariogrande" data-bs-toggle="modal" data-bs-target="#esgrand"><i class="fa fa-fire"></i> Grande</button></div>
										<div class="col-6 col-md-6"><button type="button" class="btn btn-sm  btn-info botones" id="incensariopeque" data-bs-toggle="modal" data-bs-target="#espeque"> <i class="fa fa-fire"></i> Pequeñas</button></div>
										<div class="col-6 col-md-2">
									</div>
								</div>
							</div>
							<div class="col-6 col-md-5">
									<label style="font-weight: bold; color: #000000;">Estandartes</label>
									<div class="row">
										<div class="col-6 col-md-6">
										<button type="button" class="btn btn-sm  btn-success botones" id="estandartegrande" data-bs-toggle="modal" data-bs-target="#estangrand"> <i class="fa fa-flag"></i> Grande</button></div>
										<div class="col-6 col-md-6"><button type="button" class="btn btn-sm  btn-success botones" id="estandartepeque" data-bs-toggle="modal" data-bs-target="#estanpeque"> <i class="fa fa-flag"></i> Pequeñas</button></div>
										<div class="col-6 col-md-2">
									</div>
								</div>
							</div>
							<div class="col-12 col-md-2">
									<label style="font-weight: bold; color: #000000;"><i class="fa fa-sign-out-alt"></i></label>
									<div class="row">
										<div class="col-12 col-md-12"><button type="button" class="btn btn-warning botones btn-sm" id="cerrar"><i class="fa fa-sign-out-alt"></i> Salir</button></div>
										</div>
							</div>
							</div>
						</div>
						</div>
					<?php  } ?>
				</div>
			<div class="registro blancor">
			<form class="needs-validation" name="cargadorNuevo" id="cargadorNuevo">
				<div class="colcarga" style="margin-top: -20px;"><h5><i class="fa fa-user-plus"></i>Datos de la Devota</h5></div>
				<div class="row">
					<div class="col-sm-4 col-md-4 col-lg-4">
						<label for="validationCustom02" class="arr"><i class="fa fa-signature"></i> Nombres</label>
						<input type="text" class="ford text-center espa" name="nombre"  required>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
						<label for="validationCustom03" class="arr"><i class="fa fa-signature"></i> Apellidos</label>
						<input type="text" class="ford text-center espa" name="apellido" required>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4">
						<label for="validationCustom04" class="arr"><i class="fa fa-id-card"></i> CUI</label>
						<input type="text" class="ford text-center positive espa" id="validationCustom04" name="cui" value="0" maxlength="13" required>
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
						  <input class="form-check-input" type="radio" name="genero" id="generom" value="Femenino" required checked>
						  <label class="form-check-label" for="exampleRadios1">
						   Femenino
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="genero" id="generof" value="Masculino" required>
						  <label class="form-check-label" for="exampleRadios2">
						   Masculino
						  </label>
						</div>
					</div>
					<div class="col-6 col-sm-2 col-md-3 col-lg-3">
						<label for="" class="arr"><i class="fa fa-mobile-alt"></i> No. de cel</label>
						<input type="text" class="ford text-center positive espa" name="numero1" maxlength="8" required>
					</div>
					<div class="col-6 col-sm-2 col-md-3 col-lg-3">
						<label for="" class="arr"><i class="fa fa-mobile"></i> 2do. No. de cel</label>
						<input type="text" class="ford text-center positive espa"name="numero2" value="0" maxlength="8">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-6 col-lg-6">
						<label for="" class="arr"><i class="fa fa-map-marked-alt"></i> Dirección</label>
						<input type="text" class="ford text-center espa" name="direccion" required>
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
						<label class="arr"><i class="fa fa-hourglass-half"></i> Años Participando</label>
						<input type="text" class="ford positive ford text-center espa" name="años" value="1" required>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<label class="arr">Tipo de Participación</label>
						<select class="custom-select ford inputState espa"  name="tipodatapersona" id="tipodatapersona" required>
						</select>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2">
						<label class="arr"><i class="fa fa-money-bill-wave-alt"></i> Ofrenda</label>
						<input type="text" class="ford text-center espa positive" id="ofrenda" name="ofrenda" value="" maxlength="8" required readonly>
					</div>
					<div class="col-sm-5 col-md-5 col-lg-5">
						<label class="arr"><i class="fa fa-info-circle"></i> Descripción</label>
						<input type="text" class="ford text-center espa" id="descripcion" name="descripcion" value="" required readonly>
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
<!-- Modal -->
<div class="modal fade" id="esgrand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ofrenda Incensarios Grandes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form name="editarofrendagrande" id="editarofrendagrande">
      	<div class="row">
      		<div class="col-sm-3">
      			<label><i class="fa fa-money-bill-wave-alt"></i> Cantidad</label>
      			<input type="text" class="ford  text-center positive" id="canofreng" name="canofren" value="" maxlength="8" required>
      		</div>
      		<div class="col-sm-9">
      			<label><i class="fa fa-signature"></i> Descripción</label>
      			<input type="text" class="ford text-center" id="desofreng" name="desofren" value="" required>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarmod">Cerrar <i class="fa fa-sign-out-alt"></i></button>
        <button type="submit" class="btn btn-success" id="updateOfreng" name="updateOfreng">Actualizar Ofrenda <i class="fa fa-sync-alt"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="espeque" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ofrenda Incensarios Pequeñas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form name="editarofrendapeque" id="editarofrendapeque">
      	<div class="row">
      		<div class="col-sm-3">
      			<label><i class="fa fa-money-bill-wave-alt"></i> Cantidad</label>
      			<input type="text" class="ford  text-center positive" id="canofrenp" name="canofren" value="" maxlength="8" required>
      		</div>
      		<div class="col-sm-9">
      			<label><i class="fa fa-signature"></i> Descripción</label>
      			<input type="text" class="ford text-center" id="desofrenp" name="desofren" value="" required>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarmod">Cerrar <i class="fa fa-sign-out-alt"></i></button>
        <button type="submit" class="btn btn-success" id="updateOfrenp" name="updateOfrenp">Actualizar Ofrenda <i class="fa fa-sync-alt"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="estangrand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ofrenda Estandarte Grande</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form name="editaroesdartegrande" id="editaroesdartegrande">
      	<div class="row">
      		<div class="col-sm-3">
      			<label><i class="fa fa-money-bill-wave-alt"></i> Cantidad</label>
      			<input type="text" class="ford  text-center positive" id="canofrensg" name="canofren" value="" maxlength="8" required>
      		</div>
      		<div class="col-sm-9">
      			<label><i class="fa fa-signature"></i> Descripción</label>
      			<input type="text" class="ford text-center" id="desofrensg" name="desofren" value="" required>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarmod">Cerrar <i class="fa fa-sign-out-alt"></i></button>
        <button type="submit" class="btn btn-success" id="updateOfrensg" name="updateOfrensg">Actualizar Ofrenda <i class="fa fa-sync-alt"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="estanpeque" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ofrenda Estandarte Pequeña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form name="editaroestandartepeque" id="editaroestandartepeque">
      	<div class="row">
      		<div class="col-sm-3">
      			<label><i class="fa fa-money-bill-wave-alt"></i> Cantidad</label>
      			<input type="text" class="ford  text-center positive" id="canofrensp" name="canofren" value="" maxlength="8" required>
      		</div>
      		<div class="col-sm-9">
      			<label><i class="fa fa-signature"></i> Descripción</label>
      			<input type="text" class="ford text-center" id="desofrensp" name="desofren" value="" required>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarmod">Cerrar <i class="fa fa-sign-out-alt"></i></button>
        <button type="submit" class="btn btn-success" id="updateOfrensp" name="updateOfrensp">Actualizar Ofrenda <i class="fa fa-sync-alt"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
	<script>
	  $(document).ready(function(){
	    validarCualquierNumero();

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
            $(".Ofrendasg").slideUp();
            $(".Ofrendasp").slideUp();
            $(".Ofrendassg").slideUp();
            $(".Ofrendassp").slideUp();
        });
  		});


		$('#fecha').on('change', function(){
			var fecha_seleccionada = $('#fecha').val();
			var fecha_nacimiento = new Date(fecha_seleccionada);
			var fecha_Actual = new Date();
			var edad = (parseInt((fecha_Actual - fecha_nacimiento) / (1000*60*60*24*365.25)));
			$('#edad').val(edad);
			if (edad > 100 || edad < 1) {
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
			$.post('<?=$base_url?>/cargador/tipodatopersona').done(function(respuesta){
				$('#tipodatapersona').html(respuesta);
			});

			$('#tipodatapersona').change(function(){
				var id_ofrenda = $(this).val();

				$.post('<?=$base_url?>/cargador/datosofrenda',{tipodatapersona: id_ofrenda}).done(function(respuesta){
					let data = JSON.parse(respuesta);
          $('#ofrenda').val(data[0]['cantidad']);
          $('#descripcion').val(data[0]['descripcion']); 
				});
			});
		});


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

  $('#cargadorNuevo').submit(function(e){
    e.preventDefault();
      $.ajax({
          url: '<?=$base_url?>/cargador/crearNuevaInscripcionIncensario',
          type: "POST",
          async: true,
          data: $('#cargadorNuevo').serialize(),

          success: function(response){
          	console.log(response);
          	data = $.parseJSON(response);
        		if(data.length > 0){
        			Swal.fire({
	           	title: 'Se a registrado con éxito.',
						  icon: 'success',
						  confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',

						  }).then((result) => {
						  if (result.isConfirmed) {
						   	var info = $.parseJSON(response);  
           			window.location.href='<?=$base_url?>/cargador/generacionrecibo/'+info+' ';
						  } else {
						    var info = $.parseJSON(response);  
           		window.location.href='<?=$base_url?>/cargador/generacionrecibo/'+info+' ';
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
              }
            }
        });
  });

  $('#incensariogrande').click(function(e){
    e.preventDefault();

    var action = 'buscarDatos';
    $.ajax({
        url: '<?=$base_url?>/cargador/ofrendaIncensarioGrande',
        type: "POST",
        async: true,
        data: {action:action},
        success: function(response){
          let data = JSON.parse(response);
          $('#canofreng').val(data[0]['cantidad']);
          $('#desofreng').val(data[0]['descripcion']); 
      }
    });
  });

  $('#editarofrendagrande').submit(function(e){
    e.preventDefault();
      $.ajax({
          url: '<?=$base_url?>/cargador/updateIncensarioGrande',
          type: "POST",
          async: true,
          data: $('#editarofrendagrande').serialize(),

          success: function(response){
            if (response == 'true') {
              $('#canofreng').val('');
              $('#desofreng').val('');
              $('#updateOfreng').slideUp();
             
              Swal.fire({
              title: 'Actualización Exitosa.',
              icon: 'success',
              confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
               });
            }
          }
      });
  });

  $('#incensariopeque').click(function(e){
    e.preventDefault();

    var action = 'buscarDatos';
    $.ajax({
        url: '<?=$base_url?>/cargador/ofrendaIncensarioPeque',
        type: "POST",
        async: true,
        data: {action:action},
        success: function(response){
          let data = JSON.parse(response);
          $('#canofrenp').val(data[0]['cantidad']);
          $('#desofrenp').val(data[0]['descripcion']); 
      }
    });
  });

  $('#editarofrendapeque').submit(function(e){
    e.preventDefault();
      $.ajax({
          url: '<?=$base_url?>/cargador/updateIncensarioPeque',
          type: "POST",
          async: true,
          data: $('#editarofrendapeque').serialize(),

          success: function(response){
            if (response == 'true') {
              $('#canofrenp').val('');
              $('#desofrenp').val('');
              $('#updateOfrenp').slideUp();
             
              Swal.fire({
              title: 'Actualización Exitosa.',
              icon: 'success',
              confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
               });
            }
          }
      });
  });

    $('#estandartegrande').click(function(e){
    e.preventDefault();

    var action = 'buscarDatos';
    $.ajax({
        url: '<?=$base_url?>/cargador/ofrendaEstandarteGrande',
        type: "POST",
        async: true,
        data: {action:action},
        success: function(response){
          let data = JSON.parse(response);
          $('#canofrensg').val(data[0]['cantidad']);
          $('#desofrensg').val(data[0]['descripcion']); 
      }
    });
  });

  $('#editaroesdartegrande').submit(function(e){
    e.preventDefault();
      $.ajax({
          url: '<?=$base_url?>/cargador/updateEstandarteGrande',
          type: "POST",
          async: true,
          data: $('#editaroesdartegrande').serialize(),

          success: function(response){
            if (response == 'true') {
              $('#canofrensg').val('');
              $('#desofrensg').val('');
              $('#updateOfrensg').slideUp();
             
              Swal.fire({
              title: 'Actualización Exitosa.',
              icon: 'success',
              confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
               });
            }
          }
      });
  });

    $('#estandartepeque').click(function(e){
    e.preventDefault();

    var action = 'buscarDatos';
    $.ajax({
        url: '<?=$base_url?>/cargador/ofrendaEstandartePeque',
        type: "POST",
        async: true,
        data: {action:action},
        success: function(response){
          let data = JSON.parse(response);
          $('#canofrensp').val(data[0]['cantidad']);
          $('#desofrensp').val(data[0]['descripcion']); 
      }
    });
  });

  $('#editaroestandartepeque').submit(function(e){
    e.preventDefault();
      $.ajax({
          url: '<?=$base_url?>/cargador/updateEstandartePeque',
          type: "POST",
          async: true,
          data: $('#editaroestandartepeque').serialize(),

          success: function(response){
            if (response == 'true') {
              $('#canofrensp').val('');
              $('#desofrensp').val('');
              $('#updateOfrensp').slideUp();
             
              Swal.fire({
              title: 'Actualización Exitosa.',
              icon: 'success',
              confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
               });
            }
          }
      });
  });
	</script>	
</body>
</html>