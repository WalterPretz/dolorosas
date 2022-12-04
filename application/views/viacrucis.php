<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
$cantidadcargadores = 0;

foreach ($arr as $b){ 
    $cantidadcargadores = $cantidadcargadores + 1;
}
$grupode = 0;
foreach ($grupo as $c){
	$grupode = $c['numero'];
}
$laditos = $grupode/2;

?><!DOCTYPE html>
<html lang="es">
<html>
<head>
	<?php $this->load->view('layout/header'); ?>
	<title>Inscripcion</title>
</head>
<body>
	<header class="oculalimprimir">
		<?php $this->load->view('layout/menu'); ?>
		<script type="text/javascript">document.oncontextmenu = function(){return false;}</script>
	</header>
	<div class="imprimir">
				<h3 style="margin-top: 25px; text-align: left;">Turnos <?php echo date('Y'); ?></h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="oculalimprimir"><br>
		<div class="row oculalimprimir">
			<div class="col-6 col-sm-3">
				<h5 class="text-center">Cantidad de Cargadores: <strong><?php echo $cantidadcargadores; ?></strong> </h5>
			</div>
			<div class="col-6 col-sm-2">
				<h6 class="text-center">Turnos de: <strong><?php echo $laditos; ?> Cargadores </strong> Total: <strong><?php echo $grupode; ?></strong></h6>
			</div>
			<div class="col-8 col-sm-3">
				<h4 class="text-center" style="margin-top: 5px;">Turnos <?php echo date('Y'); ?></h4>
			</div>
			 <?php if ($this->session->ROL == 'Directora') { ?>
			<div class="col-2 col-sm-2">
				<button type="button" class="btn btn-primary btn-sm botones" id="gruposde" data-bs-toggle="modal" data-bs-target="#gruposdedatos"><i class="fa fa-users"></i> Grupo</button>
			</div>
			<?php  } ?>
			<div class="col-2 col-sm-2">
				<div class="row">
					<div class="col">
						<button type="button" class="btn btn-info btn-sm botones" style="color: #fff" id="imprimir"><i class="fa fa-print"></i> Imrpimir</button>
					</div>
					<div class="col" style="text-align: left;"><a type="submit" href="<?=$base_url?>/cargador/generarExcelListado" class="btn btn-success btn-sm botones"><i class="fas fa-file-excel"></i> Descargar</a></div>
				</div>				
			</div>
		</div><br>
		</div>
		<section id="resultadoGenerado"></section>
		<section id="resultGenerado2"></section>
		<!--
		<section>
			<table class="table table-striped table-bordered table-sm">
			  <thead>
			    <tr>
			      <th class="text-center">No.</th>
			      <th class="text-center">Cargador</th>
			      <th class="text-center">Altura</th>
			      <th class="text-center">Turno No.</th>
			      <th class="text-center">Lado</th>
			    </tr>
			  </thead>
			  <tbody id="resultadoGenerado">
			  </tbody>
			</table>
		</section>
	
		<section class="saltoDePagina">
			<table class="table table-striped table-bordered table-sm">
			  <thead>
			    <tr>
			      <th class="text-center">No.</th>
			      <th class="text-center">Cargador</th>
			      <th class="text-center">Altura</th>
			      <th class="text-center">Turno No.</th>
			      <th class="text-center">Lado</th>
			    </tr>
			  </thead>
			  <tbody id="resultGenerado2">
			  </tbody>
			</table>
		</section>-->
	<!--			  	<?php 
						$cant = $grupode;
						$limite = $cant;
						$lim = $limite + 1;
						$turno = 1;
						$lado = $limite / 2;
						$ladoCarga = '';

				    $secuencia = 0;
				    $seccion = 0;

				    $uno = 1;
				    $valor = $grupode;
				    $listado = $valor + $uno;

			  	foreach ($arr as $b){ 
			  		$secuencia = $secuencia + 1;
			  		$seccion ++;

		      	if ($secuencia == $lim) {
		      		$turno = $turno + 1;
		      		$secuencia = 1;
		      	}

		      	if (($secuencia % 2) == 0) {
		      		$ladoCarga = 'Izquierda';
		      		?>
	      		<tr>
				   		<td class='text-center'><?php echo $secuencia ;?></td>
		            <td><?php echo $b['nombre']; ?></td>
		            <td class='text-center'><?php echo $b['vestimenta'];?></td>
		            <td class='text-center' style="font-weight: bold;"><?php echo $turno;?></td>
		            <td class='text-center'><?php echo $ladoCarga;?></td>
				   	</tr>
				   	<?php  
		      	} else {
      		$ladoCarga = 'Derecha';
    		} 
    	}?>
			  </tbody>
			</table>
		</section>
	<br><br>
-->
	<!-- Modal -->
<div class="modal fade" id="gruposdedatos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="border: #005653; border-style: solid;">
      <div class="modal-header" style="background-color: #005653; color: #fff;">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-users"></i> Editar la Cantidad de Cargadoras</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="caja">
        <center>
          <label for="nombre"><i class="fa fa-user-tie"></i> Cantidad de Cargadoras por cada Turno</label>
          <input type="text" class="ford text-center" id="numero" style="color: #000; font-weight: bold;" readonly>
          <br>
          <label for="nombre"><i class="fa fa-user-tie"></i> Cantidad de Cargadoras por Lado</label>
          <input type="text" class="ford text-center" id="ladoss" style="color: #000; font-weight: bold;" readonly>
          <br>
          <form name="cambiarnumero" id="cambiarnumero">
          	<center>
          		<label><i class="fa fa-users"></i> Cambiar la Cantidad de cargadoras por cada turno</label>
          		<input type="text" class="ford positive text-center" id="nuevo" name="nuevo" style="color: #B90000; font-weight: bold;" maxlength="4" required>
          	</center>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa fa-sign-out-alt"></i> Salir</button>
        <button type="submit" id="chang" class="btn btn-primary" ><i class="fa fa-sync-alt"></i> Actualizar cantidad</button>
        </form>
      </div>
    </div> 
  </div>
</div>
	<script type="text/javascript">
	$(document).ready(function(){
		validarCualquierNumero();
		traerResultado();
	});

    $('#gruposde').click(function(e){
    e.preventDefault();
        $.ajax({
            url: '<?=$base_url?>/cargador/trarnumero',
            type: "POST",
            async: true,
            success: function(response){
  			data = $.parseJSON(response);
	            if(data.length > 0){
	               $('#numero').val(data); 
	               $('#nuevo').val(data);
	               var cant = data / 2;
	               $('#ladoss').val(cant);
	               $('#chang').slideDown();
                   $('#caja').slideDown();
	            }
            }
        });
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

	$('#cambiarnumero').submit(function(e){
    e.preventDefault();
        $.ajax({
            url: '<?=$base_url?>/cargador/updatetrarnumero',
            type: "POST",
            async: true,
            data: $('#cambiarnumero').serialize(),
            success: function(response){
  			if (response == 'true') {
                $('#numero').val('');
                $('#nuevo').val('');
                $('#ladoss').val('');
                $('#chang').slideUp();
                $('#caja').slideUp();
               
                Swal.fire({
                title: 'Se a actualizado con éxito la cantidad de Cargadoras.',
                icon: 'success',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
                 }).then((result) => {
                  if (result.isConfirmed) {
                   location.reload();
                  } else {
                  location.reload();
                  }
                }); 
           	}
           }
        });
  	});

	  $('#imprimir').click(function(){
	    window.print();
	    return false;
	  });

function traerResultado(){
  $.ajax({
    url: '<?=$base_url?>/cargador/generarListadoCargadoras',
  	success: function(response){
  		let data = $.parseJSON(response);
  		$('#resultadoGenerado').html(data.ladoIzquierdo);
  		$('#resultGenerado2').html(data.ladoDerecho);
    }
  });
}
	</script>
</body>
</html>