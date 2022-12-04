<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
date_default_timezone_set("America/Guatemala");
?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('layout/header'); ?>
  <title>Cargador</title>
</head>
<body>
<div class="blanco">
  <div class="adorno">
    <div class="blancof registro1">
      <div class="escudo">
        <div class="caja letra">
          <div class="row">
            <div class="col-sm-2 col-2">
              <center><img src="<?=$base_url?>/recursos/img/logo.png" class="img-fluid" width="90"></center> 
            </div>
            <div class="col-sm-8 col-8">
              <h4 class="text-center"><strong>HERMANDAD VIRGEN DE DOLORES</strong></h4>
              <h4 class="text-center" style="margin-top: -10px;">COCATEDRAL SAN MIGUEL ARCÁNGEL</h4>
              <h4 class="text-center" style="margin-top: -10px;">TOTONICAPÁN</h4>
            </div>
               <?php foreach ($arr as $a){ ?>
            <div class="col-sm-2 col-2">
              <h6 class="text-center">RECIBO</h6>
              <h4 class="text-center" style="color: red; font-weight:bold;">No. <?php echo $a['id_inscripcion'] ;?></h4>
            </div>
          </div>
          <br>
          <?php
          //formato dia
          $dia = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
          $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

          //Incluímos la clase pago
          $transformar =  str_replace(',00', '', number_format($a['cantidad'], 2, ',', ''));
          require_once("recursos/numLetras/CifrasEnLetras.php");
          $v =new CifrasEnLetras(); 
          //Convertimos el total en letras
          $letra = ($v->convertirEurosEnLetras($transformar));
          ?>
          <div class="row">
            <div class="col-9 col-md-9 forma">
              <h5 class="centra">LUGAR Y FECHA: Totonicapán, <?php echo $dia[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " de ".date('Y') ; ?>.</h5>
            </div>
            <div class="col-1 col-md-1"></div>
            <div class="col-2 col-md-2 forma">
              <h5 class="centra text-center">Q. <?php echo number_format($a['cantidad'],2) ;?></h5>
            </div>
          </div>
          <br>
          <div class="row form-row forma">
            <div class="col-3 col-md-3 "><h5 class="centra">RECIBI DE:</h5></div>
            <div class="col-6 col-md-6 raya"><h5 class="centra"><?php echo $a['nombre'] ;?></h5></div>
            <div class="col-3 col-md-3 raya"><h5 class="centra">SOCIO: <strong><?php echo $a['persona'] ;?></strong></h5></div>
          </div>
          <div class="row form-row forma" style="margin-top: 5px">
            <div class="col-3 col-md-3"><h5 class="centra">LA CANTIDAD DE:</h5></div>
            <div class="col-6 col-md-6 raya"><h5 class="centra"><?php echo $letra; ?></h5></div>
            <div class="col-sm-3 col-md-3 raya"><h5 class="centra text-center"><?php echo $a['tipo'] ;?> | <?php echo $a['altura']; ?> mts.</h5></div>
          </div>
          <div class="row form-row forma" style="margin-top: 5px">
            <div class="col-3 col-md-3"><h5 class="centra">POR CONCEPTO DE:</h5></div>
            <div class="col-9 col-md-9 raya"><h5 class="centra"><?php echo $a['descripcion'] ;?></h5></div>
          </div>
           <?php }?>
          <div class="row">
            <div class="col-3 col-md-3"></div>
            <div class="col-3 col-md-3"><br><br><br><br>
              <center>Firma</center>
            </div>
            <div class="col-3 col-md-3"><br><br><br><br>
              <center>Sello</center>
            </div>
            <div class="col-3 col-md-3"></div>
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>
<br>
<center>
  <div class="row container-fluid">
    <div class="col-sm-3"><button class="btn btn-sm btn-primary botones oculalimprimir" id="imprimir" type="button">Imprimir</button></div>
    <div class="col-sm-3"><a href="<?=$base_url?>/cargador" class="btn btn-sm btn-success botones oculalimprimir" > Inscribir a otro Cargador <i class="fa fa-user"></i></a></div>
    <div class="col-sm-3"><a href="<?=$base_url?>/inicio" class="btn btn-sm btn-info botones oculalimprimir" > Salir <i class="fa fa-door-open"></i></a></div>
    <div class="col-sm-3"><a href="<?=$base_url?>/cargador/listado" class="btn btn-sm btn-secondary botones oculalimprimir" > Listado <i class="fa fa-th-list"></i></a></div>
  </div>
</center>
<br><br><br>
<script type="text/javascript">
  $(document).ready(function(){
      window.print();
      return false;
    });

  $('#imprimir').click(function(){
    window.print();
    return false;
  });
</script>
</body>
</html>

