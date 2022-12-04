<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr) < 1) {
  $mensaje = "<script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'No hay ninguna persona registrado en el sistema!',
  }) 
  </script>";
}

?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('layout/header'); ?>
  <title>Usuarios</title>
</head>
<body>
  <div class="oculalimprimir">
   <?php $this->load->view('layout/menu'); ?>   
  </div>
<div class="container-fluid">
<header>
  <div class="imprimir">
    <br>
  <center>
    <img src="<?=$base_url?>/recursos/img/logo.png" class="img-fluid" width="100">
  </center>
</div>
<br>
  <center>
  <h3 style="color: #03064A"><i class="fa fa-clipboard-list"></i> Listado de Colaboradores</h3></center>
</header>
<br>
<section>
  <div class="table-responsive-sm">
    <table class="table table-striped table-bordered">
    <thead class="imprimir-tabla"> 
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Nombres y Apellidos</th>
        <th class="text-center">Dirección</th>
        <th class="text-center">Teléfono</th>
        <th class="text-center">Municipio</th>
        <th class="text-center">Depto</th>
        <th class="text-center oculalimprimir">Detalle</th>
        <th class="text-center oculalimprimir">Acción</th>
      </tr>
    </thead>
    <tbody>
       <?php
          foreach ($arr as $a){
         ?>

          <tr>
            <td class="text-center"><?php echo $a['id_colaborador'] ;?></td>
            <td class="text-center"><?php echo $a['nombre'] ;?> <?php echo $a['apellido'] ;?></td>
            <td class="text-center"><?php echo $a['direccion'] ;?></td>
            <td class="text-center"><?php echo $a['telefono'] ;?></td>
            <td class="text-center"><?php echo $a['municipio'] ;?></td>
            <td class="text-center"><?php echo $a['departamento'] ;?></td>
            <td class="text-center oculalimprimir"><a class='btn btn-success btn-sm botones' onchange="return llenar("href='<?=$base_url?>/celador/detalle/<?php echo $a['id_colaborador']; ?>') id="id_colaborador"><i class="fa fa-info-circle"></i></a></td>
            <td class="text-center oculalimprimir"><a class='btn btn-danger btn-sm botones' style="color: #fff;" data-bs-toggle="modal" data-bs-target="#eliminar" 
              onclick="obdatosIdPersonas('<?php echo $a['id_colaborador'] ;?>')"><i class="fa fa-trash-alt"></i></a></td>
          </tr>
         <?php
            }
          ?>
    </tbody>
    </table>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
  </div>
</section>
</div>
<footer class="oculalimprimir" style="background: linear-gradient(70deg, #4B0082, #0D011C);"><?php $this->load->view('layout/footer') ?></footer>
<!-- Modal -->
<div class="modal fade" id="eliminar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="border: #6E0101; border-style: solid;">
      <div class="modal-header" style="background-color: #6E0101; color: #fff;">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-key"></i> Dar Baja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <label for="nombre"><i class="fa fa-user-tie"></i> Persona</label>
          <h4 value="" id="nombre"></h4>
          <br>
          <form name="deleteuss" id="deleteuss" method="POST">
            <input type="hidden" id="persona" name="persona" value="">
        </center>
        <br>
        <center><h4 style="color: red; font-weight: bold;">¿Está seguro de dar de baja?</h4></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa fa-sign-out-alt"></i> Salir</button>
        <button type="submit" id="chang" class="btn btn-danger" ><i class="fa fa-trash-alt"></i> Dar Baja</button>
        </form>
      </div>
    </div> 
  </div>
</div>
<script type="text/javascript">
  function obdatosIdPersonas(id_colaborador) {
      datos = {
          "colaborador": id_colaborador
      }

      $.ajax({
          data: datos,
          url: '<?=$base_url?>/celador/buscarpersona',
          type: 'POST',
          beforeSend: function(){},
          success: function(response) {
              data = $.parseJSON(response);
              if(data.length > 0){
                $('#persona').val(data[0]['persona']); 
                $('#nombre').html(data[0]['nombre']); 
              }
          } 
      });
  };

  $('#deleteuss').submit(function(e){
    e.preventDefault();
        $.ajax({
            url: '<?=$base_url?>/celador/changepersona',
            type: "POST",
            async: true,
            data: $('#deleteuss').serialize(),

            success: function(response){
              if (response == 'true') {
                $('#persona').val('');
                $('#nombre').html('');
                $('#chang').slideUp();
               
                Swal.fire({
                title: 'Se a Eliminado con éxito a la persona.',
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
</script>
</body>
</html>

