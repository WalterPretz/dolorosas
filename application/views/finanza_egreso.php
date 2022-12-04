<?php defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
  <?php $this->load->view('layout/header'); ?>
  <title>Finanza</title>
</head>
<body>
<header class="oculalimprimir">
    <?php $this->load->view('layout/menu'); ?>
</header>
	<div class="container-fluid espacio">
        <div class="container-fluid  oculalimprimir">
           <h4 class="text-center"><i class="fa fa-user-injured"></i> <i class="fa fa-wallet"></i> Registro de Gastos (Egreso - Pérdida)</h4><hr>
            <div>
                <form id="form_regis_ingreso" name="form_regis_ingreso">
                    <div class="row">
                        <div class="col-3 col-sm-3">
                            <label for="title">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha[]" title="Fecha" value="<?php echo date("Y-m-d") ?>" required>
                        </div>
                        <div class="col-9 col-sm-9">
                            <label for="title">Descripción</label>
                            <textarea type="text" class="form-control descripcion" id="descripcion" name="descripcion" title="Descripción" required></textarea>
                        </div>
                        <div class="col-3 col-sm-3">
                            <label for="title">Cantidad en Q</label>
                            <input type="text" class="form-control positive decimal-2-places cantidad" id="cantidad" name="cantidad" maxlength="10" title="Cantidad" required>
                        </div>
                        <div class="col-6 col-sm-6">
                            <label for="title">Categoría</label>
                            <select name="categoria" id="categoria" class="form-control selectpicker categoria" data-live-search="true" required></select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group text-right">
                        <button type="submit" id="guardarDatos" name="guardarDatos" class="btn btn-primary"><i class="fa fa-check"></i> Guardar Registro</button>
                        <button type="reset" class="btn btn-info">Limpiar Campos</button>
                        <button type="button" class="btn btn-success" id="imprimir"><i class="fa fa-print"></i> Imprimir</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div>
        <div class="imprimir">
            <div class="row">
                <div class="col-4">
                    <img src="<?=$base_url?>/recursos/img/logo.png" class="img-fluid" width="70" align="right">
                </div>
                <div class="col-8">
                    <h3 style="margin-top: 25px; text-align: left;">Hermandad Vírgen de Dolores <?php echo date('Y'); ?></h3>
                </div>
            </div>
        </div>
        <h5 class="text-center"><i class="fa fa-coins"></i> Gastos Registrados en el Sistema | Egresos</h5>
       	<div class="table-responsive-sm">
	        <table class="table table-striped table-sm table-bordered table-hover" width="100%" cellspacing="0">
	        <thead> 
	          <tr>
	            <th>No.</th>
	            <th>Fecha Registro</th>
	            <th>Descripción</th>
	            <th>Cantidad en Q.</th>
	            <th>Categoría</th>
	            <th class="oculalimprimir">Editar</th>
	            <th class="oculalimprimir">Dar Baja</th>
	          </tr>
	        </thead>
	        <tbody id="egresos">
	        </tbody>
	        </table>
	        <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	    </div>
        </div>
	</div>
	<br><br>
	<!-- Modal -->
<div class="modal fade" id="actualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-left: blue; border-style: solid;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar registro de Egresos <i class="fa fa-coins"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="actualizarEgreso" name="actualizarEgreso">
        <input type="hidden" name="action" value="actualizarData">
        <input type="hidden" id="idE" name="idE">
        <div class="row">
            <div class="col-sm-2">
                <label for="fecha">CÓDIGO:</label>
                <input type="text" id="codigoE" class="form-control" readonly>
            </div>
            <div class="col-sm-3">
                <label for="fecha">Fecha registro</label>
                <input type="date" class="form-control" id="fechaE" readonly required>
            </div>
             <div class="col-sm-3">
                <label for="fecha">Fecha de actualización</label>
                <input type="date" class="form-control" id="fecha" name="fechan" value="<?php echo date("Y-m-d") ?>" required>
            </div>
            <div class="col-sm-12">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcionE" name="descripcionE" required></textarea>
            </div>
            <div class="col-sm-4">
                <label for="cantidad">Cantidad</label>
                <input type="text" class="form-control positive decimal-2-places" name="cantidadE" id="cantidadE" value="" required>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <label for="categoria">Categoría Actual:</label><p style="color: #000; font-weight: bold; padding-left: 5px;" id="categoriaE"></p>
                </div>
            <select class="form-control selectpicker" id="opcion" name="opcion" value="" data-live-search="true" required="">
                </select>
            </div>
            <div class="col-sm-12">
                <label for="usuario">Usuario quién edita: <strong><?php echo $this->session->NOMBRE ?></strong></label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-sign-out-alt"></i> Salir</button>
        <button type="submit" class="btn btn-primary" id="updateRegistroEgresoDatos"><i class="fa fa-sync-alt"></i> Actualizar datos</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Modal eliminar-->
<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-left: blue; border-style: solid;">
      <div class="modal-header" style="background-color: red; color: #fff;">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR REGISTRO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-1 col-3">
                <label for="fecha">CÓD:</label>
                <input type="text" id="cod" class="form-control" readonly>
            </div>
            <div class="col-sm-3 col-9">
                <label for="fecha">Fecha registro</label>
                <input type="date" class="form-control" name="fech" id="fech" readonly required>
            </div>
            <div class="col-sm-3 col-4">
                <label for="cantidad">Cantidad</label>
                <input type="text" class="form-control" name="cant" id="cant" readonly required>
            </div>
            <div class="col-sm-4 col-8">
                <label for="categoria">Categoría:</label>
                <input type="text" class="form-control" id="cat" readonly>
            </div>
            <div class="col-sm-12">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="des" name="des"  readonly required></textarea>
            </div>
            <div class="col-sm-12">
                <label for="usuario">Usuario quién elimina el registro:</label>
                <p><strong><?php echo $this->session->NOMBRE ?></strong></p>
            </div>
        </div>
        <div>
        <center><h3 style="color: red;">¿Está seguro de eliminar el registro?</h3></center>
        </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa fa-sign-out-alt"></i> Salir</button>
            <form method="POST" id="eliminarRegi" name="eliminarRegi">
                <input type="hidden" name="action" value="eliminarRegi">
                <input type="hidden" id="id_r" name="id_r" value="">
                <button type="submit" class="btn btn-danger" id="eliminarD" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Si Eliminar</button>
            </form>           
      </div>
    </div>
  </div>
</div>
	<script type="text/javascript">

	$(document).ready(function(){
    	validarCualquierNumero();
    	traerdatoEgreso();
	});

	function validarCualquierNumero(){
	    $(".numeric").numeric();
	    $(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
	    $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
	    $(".decimal-2-places").numeric({ decimalPlaces: 2 });
	    $("#remove").click(
	    function(e){
	        e.preventDefault();
	        $(".numeric,.positive,.decimal-2-places").removeNumeric();
	    });
	};

    $('#form_regis_ingreso').submit(function(e) {
       e.preventDefault();

       $.ajax({
        url:'<?=$base_url?>/listados/registrarEgreso',
            type: "POST",
            async: true,
            data: $('#form_regis_ingreso').serialize(),

            success: function(response){
               data = (response);
                if(data.length > 0){
                $('.descripcion').val('');
                $('.cantidad').val('');
                $('.categoria').val('');
                if(data.length > 0){
                    Swal.fire({
                    title: 'Se a registrado con éxito el Egreso',
                    icon: 'success',
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',

                    }).then((result) => {
                        if (result.isConfirmed) {
                            var info = $.parseJSON(response);  
                            traerdatoEgreso();
                        } else {
                            var info = $.parseJSON(response);  
                            traerdatoEgreso();
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
            },
                error: function(error) {
            }
       });
    });

      //llenar dato responable del servicioa ejecutar//
    $(function(){
      $.post('<?=$base_url?>/listados/responsableServicio').done(function(respuesta){
        $('#categoria').html(respuesta);
      });
    });

     $(function(){
      $.post('<?=$base_url?>/listados/responsableServicio').done(function(respuesta){
        $('#opcion').html(respuesta);
      });
    });

    function traerdatoEgreso(){
        $.ajax({
            url: '<?=$base_url?>/listados/listar_egreso',
            type: 'POST',
        }).done(function(response){
        	//console.log(response);
            let result = JSON.parse(response);
            let res = document.querySelector('#egresos');
            res.innerHTML = '';

            if (result.length > 0){
                for(let item of result){
                    res.innerHTML += `
                        <tr>
                            <td>${item.id_egreso}</td>
                            <td>${item.fecha}</td>
                            <td>${item.descripcion}</td>
                            <td>Q. ${item.cantidad}</td>
                            <td>${item.categoria}</td>
                            <td class='text-center oculalimprimir'><a class='btn btn-primary btn-sm' style="color: #fff;" data-bs-toggle='modal' data-bs-target='#actualizar' onclick="obtenerdatosId('${item.id_egreso}')"><i class="fa fa-sync-alt"></i></a></td>
                            <td class='text-center oculalimprimir'><a class='btn btn-danger btn-sm' style="color: #fff;" data-bs-toggle='modal' data-bs-target='#eliminar' onclick="obdatosId('${item.id_egreso}')"><i class="fa fa-trash-alt"></i></a></td>
                        </tr>
                    `
                }
            }
        })
    };

     //obtener id dato selec
    function obtenerdatosId(id_egreso) {
        datos = {
            "id_egreso": id_egreso
        }

        $.ajax({
            data: datos,
            url: '<?=$base_url?>/listados/buscarRegistroEgreso',
            type: 'POST',
            beforeSend: function(){},
            success: function(response) {
                data = $.parseJSON(response);
                if(data.length > 0){
                    $('#idE').val(data[0]['id_egreso']);
                    $('#codigoE').val(data[0]['id_egreso']);
                    $('#fechaE').val(data[0]['fecha']);
                    $('#descripcionE').val(data[0]['descripcion']);
                    $('#cantidadE').val(data[0]['cantidad']);
                    $('#categoriaE').html(data[0]['categoria']);
                }
            } 
        });
    };

	$('#updateRegistroEgresoDatos').click(function(e){
        e.preventDefault();

	    $.ajax({
	        url: '<?=$base_url?>/listados/updateRegistroEgreso',
	        type: "POST",
	        async: true,
	        data: $('#actualizarEgreso').serialize(),

	        success: function(response){
                if(response == 'error'){
                    Swal.fire({
                    title: 'Seleccionar y llenar todos los campos',
                    icon: 'error',
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!'
                });
                } else {
                    Swal.fire({
                        title: 'Se a actualizado con éxito',
                        icon: 'success',
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!'
                    });
                    traerdatoEgreso();
                    $('#actualizar').modal('hide');
                    $('#idE').val('');
                    $('#codigoE').val('');
                    $('#fechaE').val('');
                    $('#descripcionE').val('');
                    $('#cantidadE').val('');
                    $('#categoriaE').val('');
                    $('#opcion').val('');
                }
	        }
	    });
	});

//obtener id dato selec elem
    function obdatosId(id_egreso) {
        datos = {
            "id_egreso": id_egreso
        }

        $.ajax({
            data: datos,
            url: '<?=$base_url?>/listados/buscarRegistroEgreso',
            type: 'POST',
            beforeSend: function(){},
            success: function(response) {
                data = $.parseJSON(response);
                if(data.length > 0){
                    $('#id_r').val(data[0]['id_egreso']);
                    $('#cod').val(data[0]['id_egreso']);
                    $('#fech').val(data[0]['fecha']);
                    $('#des').val(data[0]['descripcion']);
                    $('#cant').val(data[0]['cantidad']);
                    $('#cat').val(data[0]['categoria']);
                }
            } 
        });
    };

    //eliminar
	$('#eliminarD').click(function(e){
        e.preventDefault();
	    $.ajax({
	        url: '<?=$base_url?>/listados/ElimRegistroEgreso',
	        type: "POST",
	        async: true,
	        data: $('#eliminarRegi').serialize(),

	        success: function(response){
               Swal.fire({
                    title: 'Se ha eliminado el registro con Éxito',
                    icon: 'success',
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!'
                });
                traerdatoEgreso();
	        }
	    });
	});

      $('#imprimir').click(function(){
        window.print();
        return false;
      });
	</script>
</body>
</html>