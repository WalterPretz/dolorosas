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
<header class="oculalimprimir">
    <?php $this->load->view('layout/menu'); ?>
</header>
<div class="container-fluid">
  <div class="imprimir">
    <div class="row">
      <div class="col-4">
          <img src="<?=$base_url?>/recursos/img/logo.png" class="img-fluid" width="75" align="right">
      </div>
      <div class="col-8">
        <h3 style="margin-top: 25px; text-align: left;">Listado de Estandarte Grande <?php echo date('Y'); ?></h3>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="oculalimprimir"><br>
    <div class="row oculalimprimir">
      <div class="col-12 col-sm-12">
        <h4 class="text-center" style="margin-top: 5px;">Listado de Estandarte Grande <?php echo date('Y'); ?></h4>
      </div>
    </div><br>
    </div>
<section>
  <div class="table-responsive">
    <table class="table-striped table-bordered" width="100%" cellspacing="0" id="cargadoress">
    <thead> 
      <tr>
        <th class="text-center">No.</th>
            <th class="text-center">Nombres y apellidos</th>
      </tr>
    </thead>
    <tbody>
       <?php 
         foreach ($arr as $a){ 
        $secuencia = $secuencia + 1;
            if ($secuencia == $lim) {
              $secuencia = 1;
            }
        ?>
          <tr>
            <td class='text-center'><?php echo $secuencia ;?></td>
            <td><?php echo $a['nombre'] ;?> <?php echo $a['apellido'] ;?></td>
          </tr>
         <?php } ?>
    </tbody>
    </table>
  </div>
</section>
<br><br>
<section class="saltoDePagina">
  <div class="imprimir">
    <div class="row">
      <div class="col-4">
          <img src="<?=$base_url?>/recursos/img/logo.png" class="img-fluid" width="75" align="right">
      </div>
      <div class="col-8">
        <h3 style="margin-top: 25px; text-align: left;">Listado de Estandarte Pequeño <?php echo date('Y'); ?></h3>
      </div>
    </div>
  </div>
 <h4 class="text-center oculalimprimir" style="margin-top: 5px;">Listado de Estandarte Pequeño <?php echo date('Y'); ?></h4>
 <div class="table-responsive">
    <table class="table-striped table-bordered" width="100%" cellspacing="0" id="cargadoress">
    <thead> 
      <tr>
        <th class="text-center">No.</th>
            <th class="text-center">Nombres y apellidos</th>
      </tr>
    </thead>
    <tbody>
       <?php 
        $secuencia = 0;

       foreach ($arr2 as $b){ 
        $secuencia = $secuencia + 1;
            if ($secuencia == $lim) {
              $secuencia = 1;
            }
        ?>
          <tr>
            <td class='text-center'><?php echo $secuencia ;?></td>
            <td><?php echo $b['nombre'] ;?> <?php echo $b['apellido'] ;?></td>
          </tr>
         <?php } ?>
    </tbody>
    </table>
  </div>
  </section>
</div>
<br><br>
</body>
</html>