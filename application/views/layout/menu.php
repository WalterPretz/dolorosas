<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style media="screen">
  <?php
  if (isset($this->session->USUARIO)) { // Sesión iniciada
    $log = "<a class=\"nav-item nav-link active\" style=\"color: white;\" href=\"${base_url}/usuario/logout\">SALIR</a>";
  }?>
</style>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background: linear-gradient(70deg, #4B0082, #0D011C);">
  <div class="container">
    <a class="navbar-brand" href="<?=$base_url?>"><img src="<?=$base_url?>/recursos/img/logo.ico" class="img-fluid" width="30"> Inicio</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?=$base_url?>/inicio/docs"><i class="fa fa-file-alt"></i></a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav justify-content-center">
      <?php if ($this->session->ROL == 'Directora') { ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Celadoras
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$base_url?>/celador">Crear Celadora/Colaboradora</a>
      </li>
      <li class="nav-item dropdown">
        <a class="navbar-brand" href="<?=$base_url?>/cargador">Inscribir Cargadora</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Insen/Estan</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$base_url?>/cargador/inscripcionines">Realizar Inscripción</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Listados</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$base_url?>/cargador/inscripciondolorosa">Listado de Inscripción</a>
          <a class="dropdown-item" href="<?=$base_url?>/cargador/cargadorasjueves">Listado Cargadoras Jueves</a>
          <a class="dropdown-item" href="<?=$base_url?>/celador/inscripcionhonor">Listado de Inscripción Honor</a>
          <a class="dropdown-item" href="<?=$base_url?>/cargador/listado">Listado de Cargadoras</a>
          <a class="dropdown-item" href="<?=$base_url?>/celador/listado">Listado de Celadoras</a>
          <a class="dropdown-item" href="<?=$base_url?>/cargador/listainsensario">Listado de Incensarios</a>
          <a class="dropdown-item" href="<?=$base_url?>/cargador/listadoestandarte">Listado de Estandartes</a>
          <a class="dropdown-item" href="<?=$base_url?>/celador/listadoColaborador">Listado de Colaboradoras</a>
          <a class="dropdown-item" href="<?=$base_url?>/celador/coordinador">Listado de Coordinadoras</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Usuarios</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/usuario/crear">Crear Usuario</a>
          <a class="dropdown-item" href="<?=$base_url?>/usuario/listado">Listado de Usuarios</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Finanza</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$base_url?>/listados/ingreso_e">Ingreso</a>
          <a class="dropdown-item" href="<?=$base_url?>/listados/egreso_e">Egreso</a>
          <a class="dropdown-item" href="<?=$base_url?>/listados/ingreso">Resumen</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?=$base_url?>/listados/generalgeneral"> Listado G Hermanas</a>
      </li>
    </ul>
    <ul class="navbar-nav end">
      <li class="nav-item active">
        <a class="navbar-brand" href="<?=$base_url?>/usuario/logout">SALIR</a>
      </li>
    </ul>
    <?php } ?>
    <?php if ($this->session->ROL == 'Colaboradora') { ?>
        <ul class="navbar-nav justify-content-center">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Cargadoras</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?=$base_url?>/cargador">Crear Cargadora</a>
              <a class="dropdown-item" href="<?=$base_url?>/cargador/inscripcionines">Realizar Inscripción</a>
              <a class="dropdown-item" href="<?=$base_url?>/cargador/inscripciondolorosa">Listado de Inscripción</a>
              <a class="dropdown-item" href="<?=$base_url?>/cargador/listado">Listado de Cargadoras</a>
              <a class="dropdown-item" href="<?=$base_url?>/cargador/listainsensario">Listado de Incensarios</a>
              <a class="dropdown-item" href="<?=$base_url?>/cargador/listadoestandarte">Listado de Estandartes</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav end">  
        <li class="nav-item active">
          <a class="navbar-brand" href="<?=$base_url?>/usuario/logout">SALIR</a>
        </li>
      </ul><?php } ?>
    </div>
  </div>
</nav>