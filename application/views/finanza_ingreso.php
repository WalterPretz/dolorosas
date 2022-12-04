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
  	<section class="oculalimprimir">
        <center><h4><i class="fa fa-money-bill-wave-alt"></i> Registro de Ingresos</h4></center><hr>
        <hr>
        <div>
            <form id="form_regis_ingreso" name="form_regis_ingreso" method="POST">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-hover" id="tableLoop">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Categoría</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <td><input type="date" name="fecha[]" class="form-control fecha" value="<?php echo date("Y-m-d") ?>" required>
                               </td>
                               <td width="400px"><textarea type="text" name="descripcion[]" class="form-control descripcion" required=""></textarea>
                               </td>
                                <td><input type="text" name="cantidad[]" class="form-control cantidad positive" required></td>
                               <td><select class="form-control categoria" name="categoria[]" required><option selected disabled value="">Seleccionar</option><option value="Venta">Venta</option><option value="Trabajos realizados">Trabajos realizados</option><option value="Donaciones recibidas">Donaciones recibidas</option><option value="Donaciones percibidas">Donaciones percibidas</option><option value="Comisiones percibidas">Comisiones percibidas</option><option value="Comisiones ganadas">Comisiones ganadas</option><option value="Créditos recuperados">Créditos recuperados</option><option value="Descuento sobre compra">Descuento sobre compra</option><option value="Ganacia en negociación de activos">Ganacia en negociación de activos</option><option value="Alquileres cobrados">Alquileres cobrados</option><option value="Alquileres productos">Alquileres productos</option><option value="Alquileres devengados">Alquileres devengados</option><option value="Otros ingresos">Otros ingresos</option></select></td>
                              </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="form-group text-right">
                        <button type="submit" id="guardarDatos" name="guardarDatos" class="btn btn-primary"><i class="fa fa-check"></i> Guardar Registro</button>
                        <button type="reset" class="btn btn-info">Limpiar Campos</button>
                         <button type="button" class="btn btn-success" id="imprimir"><i class="fa fa-print"></i> Imprimir</button>
                    </div>
                </div>
            </form>
        </div>
	</section>
	<hr>
	<section>
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
        <h5 class="text-center"><i class="fa fa-coins"></i> Ingresos en el Sistema </h5>
	     <div class="table-responsive-sm">
	        <table class="table table-striped table-bordered " width="100%" cellspacing="0"  id="ingresoDatos" >
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
	        <tbody id="ingresos">
	           
	        </tbody>
	        </table>
	        <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	     </div>
	</section>
</div>
<!-- Modal -->
<div class="modal fade" id="actualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-left: blue; border-style: solid;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar registro de ingresos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="gasto_registro_actualizar" name="gasto_registro_actualizar" method="POST">
        <input type="hidden" name="action" value="actualizar">
        <input type="hidden" id="id" name="id">
        <div class="row">
            <div class="col-sm-2">
                <label for="fecha">CÓDIGO:</label>
                <input type="text" id="codigo" class="form-control" readonly>
            </div>
            <div class="col-sm-3">
                <label for="fecha">Fecha registro</label>
                <input type="date" class="form-control" name="fecha" id="fecha" readonly required>
            </div>
             <div class="col-sm-3">
                <label for="fecha">Fecha de actualización</label>
                <input type="date" class="form-control" id="fechan" name="fechan" value="<?php echo date("Y-m-d") ?>" required>
            </div>
            <div class="col-sm-12">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            <div class="col-sm-6">
                <label for="cantidad">Cantidad</label>
                <input type="text" class="form-control" name="cantidad" id="cantidad" required>
            </div>
            <div class="col-sm-6">
                <label for="categoria">Categoría:</label>
                <select class="form-control" id="categoria"  name="categoria" required>
                    <option selected id="categ" disabled value=""></option>
                    <option value="Venta">Venta</option>
                    <option value="Trabajos realizados">Trabajos realizados</option>
                    <option value="Donaciones recibidas">Donaciones recibidas</option>
                    <option value="Donaciones percibidas">Donaciones percibidas</option>
                    <option value="Comisiones percibidas">Comisiones percibidas</option>
                    <option value="Comisiones ganadas">Comisiones ganadas</option>
                    <option value="Créditos recuperados">Créditos recuperados</option>
                    <option value="Descuento sobre compra">Descuento sobre compra</option>
                    <option value="Ganacia en negociación de activos">Ganacia en negociación de activos</option>
                    <option value="Alquileres cobrados">Alquileres cobrados</option>
                    <option value="Alquileres productos">Alquileres productos</option>
                    <option value="Alquileres devengados">Alquileres devengados</option>
                    <option value="Otros ingresos">Otros ingresos</option>
                </select>
            </div>
            <div class="col-sm-12">
                <label for="usuario">Usuario quién edita: <strong><?php echo $this->session->NOMBRE ?></strong></label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-sign-out-alt"></i> Salir</button>
        <button type="submit" class="btn btn-primary" id="updateIngreso" name="updateIngreso" data-bs-dismiss="modal"><i class="fa fa-sync-alt"></i> Actualizar datos</button>
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
<br><br>
<script>
    $('#form_regis_ingreso').submit(function(e) {
       e.preventDefault();

       $.ajax({
        url:'<?=$base_url?>/listados/registrarIngreso',
            type: "POST",
            async: true,
            data: $('#form_regis_ingreso').serialize(),

            success: function(response){
                $('.descripcion').val('');
                $('.cantidad').val('');
                $('.categoria').val('');
                if(response = true){
                    Swal.fire({
                    title: 'Se a registrado con éxito el Ingreso',
                    icon: 'success',
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',

                    }).then((result) => {
                        if (result.isConfirmed) {
                            var info = $.parseJSON(response);  
                            traerdatoIngreso();
                        } else {
                            var info = $.parseJSON(response);  
                            traerdatoIngreso();
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

    //validar campos
  $(document).ready(function(){
    validarCualquierNumero();
    traerdatoIngreso();
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
      	}
      );
  };
  //traer datos tabla
  function traerdatoIngreso(){

        $.ajax({
            url: '<?=$base_url?>/listados/listar_ingreso',
            type: 'POST',
        }).done(function(response){
            let result = JSON.parse(response);
            let res = document.querySelector('#ingresos');
            res.innerHTML = '';

            if (result.length > 0){
                for(let item of result){
                    res.innerHTML += `
                        <tr>
                            <td>${item.id_ingreso}</td>
                            <td>${item.fecha}</td>
                            <td>${item.descripcion}</td>
                            <td>Q. ${item.cantidad}</td>
                            <td>${item.categoria}</td>
                            <td class='text-center oculalimprimir'><a class='btn btn-success btn-sm' style="color: #fff;" data-bs-toggle="modal" data-bs-target='#actualizar' onclick="obtenerdatosId('${item.id_ingreso}')"><i class="fa fa-sync-alt"></i></a></td>
                            <td class='text-center oculalimprimir'><a class='btn btn-danger btn-sm' style="color: #fff;" data-bs-toggle="modal" data-bs-target='#eliminar' onclick="obdatosId('${item.id_ingreso}')"><i class="fa fa-trash-alt"></i></a></td>
                        </tr>
                    `
                }
            }
        })
    };

    //obtener id dato selec
    function obtenerdatosId(id_ingreso) {
        datos = {
            "id_ingreso": id_ingreso
        }

        $.ajax({
            data: datos,
            url: '<?=$base_url?>/listados/buscarRegistro',
            type: 'POST',
            beforeSend: function(){},
            success: function(response) {
                data = $.parseJSON(response);
                if(data.length > 0){
                    $('#id').val(data[0]['id_ingreso']);
                    $('#codigo').val(data[0]['id_ingreso']);
                    $('#fecha').val(data[0]['fecha']);
                    $('#descripcion').val(data[0]['descripcion']);
                    $('#cantidad').val(data[0]['cantidad']);
                    $('#categ').html(data[0]['categoria']);
                }
            } 
        });
    };

	$('#updateIngreso').click(function(e){
        e.preventDefault();

	    $.ajax({
	        url: '<?=$base_url?>/listados/updateRegistroIngreso',
	        type: "POST",
	        async: true,
	        data: $('#gasto_registro_actualizar').serialize(),

	        success: function(response){
                if(response == 'error'){
                    Swal.fire({
                    title: 'Seleccionar Categoría',
                    icon: 'error',
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!'
                    });
                }else{
                    Swal.fire({
                        title: 'Se a actualizado con éxito',
                        icon: 'success',
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!'
                    });
                traerdatoIngreso();
                $('#updateIngreso').slideUp();
	           }
            }
	    });
	});

//obtener id dato selec elem
    function obdatosId(id_ingreso) {
        datos = {
            "id_ingreso": id_ingreso
        }

        $.ajax({
            data: datos,
            url: '<?=$base_url?>/listados/buscarRegistroE',
            type: 'POST',
            beforeSend: function(){},
            success: function(response) {
                data = $.parseJSON(response);
                if(data.length > 0){
                    $('#id_r').val(data[0]['id_ingreso']);
                    $('#cod').val(data[0]['id_ingreso']);
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
	        url: '<?=$base_url?>/listados/ElimRegistro',
	        type: "POST",
	        async: true,
	        data: $('#eliminarRegi').serialize(),

	        success: function(response){
                Swal.fire({
                    title: 'Se ha eliminado el registro con Éxito',
                    icon: 'success',
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!'
                });
                traerdatoIngreso();
                $('#id_r').val('');
                $('#cod').val('');
                $('#fech').val('');
                $('#des').val('');
                $('#cant').val('');
                $('#cat').val('');
                $('#eliminarD').slideUp();
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