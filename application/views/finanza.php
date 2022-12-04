<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('layout/header'); ?>
  <title>Finanza</title>
</head>
<body>
  <div class="oculalimprimir">
    <?php $this->load->view('layout/menu'); ?>
  </div>
  <script type="text/javascript">document.oncontextmenu = function(){return false;}</script>
<div class="container-fluid">
<header>
  <div class="imprimir">
    <center>
      <img src="<?=$base_url?>/recursos/img/logo.png" class="img-fluid" width="125">
    </center>
  </div>
  <center>
  <h4 style="color: #03064A">Ingresos Hermandad Virgen de Dolores <?php echo date('Y'); ?></h4></center>
</header>
<div class="for-row">
  <h5 class="text-center">Ingresos por Cargadoras</h5>
  <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción de la Ofrenda</th>
              <th scope="col">Ofrenda</th>
              <th scope="col">No. Cargadores</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="detalle"></tbody>
          <tbody id="totales"></tbody>
        </table>
    </div>
    <div class="table-responsive">
    <h5 class="text-center">Ingresos por Colaboradoras</h5>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción de la Ofrenda</th>
              <th scope="col">Ofrenda</th>
              <th scope="col">No. Colaboradores</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="detalleC"></tbody>
          <tbody id="totalesC"></tbody>
        </table>
    </div>
    <div class="table-responsive">
    <h5 class="text-center">Ingresos por Celadoras</h5>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción de la Ofrenda</th>
              <th scope="col">Ofrenda</th>
              <th scope="col">No. Celadores</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="detalleCel"></tbody>
          <tbody id="totalesCel"></tbody>
        </table>
    </div>
    <div class="table-responsive">
    <h5 class="text-center">Ingresos por Coordinadoras</h5>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción de la Ofrenda</th>
              <th scope="col">Ofrenda</th>
              <th scope="col">No. Coordinadores</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="detalleCoor"></tbody>
          <tbody id="totalesCoor"></tbody>
        </table>
    </div>
    <div class="table-responsive">
    <h5 class="text-center">Ingresos por Insensarios</h5>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción de la Ofrenda</th>
              <th scope="col">Ofrenda</th>
              <th scope="col">No. Coordinadores</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="detalleInsen"></tbody>
          <tbody id="totalesInsen"></tbody>
        </table>
    </div>
    <div class="table-responsive">
    <h5 class="text-center">Ingresos por Estandartes</h5>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción de la Ofrenda</th>
              <th scope="col">Ofrenda</th>
              <th scope="col">No. Coordinadores</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="detalleEstan"></tbody>
          <tbody id="totalesEstan"></tbody>
        </table>
    </div>
    <div class="saltoDePagina">
      <div class="imprimir">
    <center>
      <img src="<?=$base_url?>/recursos/img/logo.png" class="img-fluid" width="125">
    </center>
    <br>
    <center><h4 style="color: #03064A">Ingreso y Egresos Hermandad Virgen de Dolores <?php echo date('Y'); ?></h4></center></center>
  </div>
    <div class="table-responsive ">
    <h5 class="text-center" style="background-color: #9777FF" >Ingresos</h5>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción</th>
              <th scope="col">Ofrenda</th>
              <th scope="col">No. Col.</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="detalleIngreso"></tbody>
          <tbody id="totalesIngreso"></tbody>
        </table>
    </div>
    <div class="table-responsive">
    <h5 class="text-center" style="background-color: #FF7777" >Egresos</h5>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción</th>
              <th scope="col">Ofrenda</th>
              <th scope="col">No. Col.</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="detalleEgreso"></tbody>
          <tbody id="totalesEgreso"></tbody>
        </table>
    </div>
    <div class="table-responsive">
      <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3">
    <h5 class="text-center"  style="background-color: #F1FF77" >Resumen General</h5>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">Descripción de la Ofrenda</th>
              <th scope="col">Items</th>
              <th scope="col">TOTAL Q.</th>
            </tr>
          </thead>
          <tbody id="Entrada"></tbody>
          <tbody id="EntradaEgreso"></tbody>
          <tbody id="EntradaIngreso"></tbody>
          <tbody style="background-color: #D8F9FB;" id="ganancia"></tbody>
        </table>
    </div>
  </div>
</div>
</div>
<br>
<center>
  <div class="col-sm-3"><button class="btn btn-sm btn-primary botones oculalimprimir" id="imprimir" type="button">Imprimir</button></div>
</center>
<br><br>
<footer class="oculalimprimir" style="background: linear-gradient(70deg, #4B0082, #0D011C);"><?php $this->load->view('layout/footer') ?></footer>
<script type="text/javascript">
    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/ingresocargadores',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#detalle').html(informacion.detalle);
            $('#totales').html(informacion.totales);    
          } 
      })
    });

    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/ingresocolaboradores',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#detalleC').html(informacion.detalle);
            $('#totalesC').html(informacion.totales);    
          } 
      })
    });

    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/ingresoceladores',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#detalleCel').html(informacion.detalle);
            $('#totalesCel').html(informacion.totales);    
          } 
      })
    });

    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/ingresocoordinadores',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#detalleCoor').html(informacion.detalle);
            $('#totalesCoor').html(informacion.totales);    
          } 
      })
    });

    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/ingresoestandarte',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#detalleEstan').html(informacion.detalle);
            $('#totalesEstan').html(informacion.totales);    
          } 
      })
    });

    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/ingresoincensario',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#detalleInsen').html(informacion.detalle);
            $('#totalesInsen').html(informacion.totales);    
          } 
      })
    });

    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/ingresogeneral',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#detalleIngreso').html(informacion.detalle);
            $('#totalesIngreso').html(informacion.totales);    
          } 
      })
    });

    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/egresogeneral',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#detalleEgreso').html(informacion.detalle);
            $('#totalesEgreso').html(informacion.totales);    
          } 
      })
    });


    $(document).ready(function () {
      $.ajax({
          url: '<?=$base_url?>/listados/ingresoofrendass',
          type: "POST",
          async: true,
        }).done(function(response){
          if(response == 'error'){
            alertify.set('notifier','position', 'top-right');alertify.error('No hay datos en el Sistema.');
          } else {
            var informacion = JSON.parse(response);
            $('#Entrada').html(informacion.totales);
            $('#EntradaEgreso').html(informacion.ingresos); 
            $('#EntradaIngreso').html(informacion.egresos); 
            $('#ganancia').html(informacion.final);       
          } 
      })
    });

     $('#imprimir').click(function(){
    window.print();
    return false;
  });
</script>
</body>
</html>