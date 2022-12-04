<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class cargador extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Cargador_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("usuario");
		}
	}

	function index(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('registrar_cargador', $data);
	}

	function envia(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('prueba', $data);
	}

	//buscar a la cargadora en el sistema
	function buscarCargadora(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($_POST['buscar'] != "") {
			$data['cargadora'] = $_POST['buscar'];
			$data['arr'] = $this->Cargador_model->searchCargadora($data['cargadora']);
			foreach ($data['arr'] as $key) {
				$key['nombre'];
				echo ('<option value="'.$key['id_persona'].'">'.$key['nombre'].' '.$key['apellido'].'</option>'."\n");
			}
		}else{
			echo '0';
		}
	}

	function datosGenerales(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['id'] = $_POST['persona'];
		$datos = $this->Cargador_model->searchCargadoraTraer($data['id']);
		echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	}

	function listado(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$año = date("Y");
  		$inicio = $año.'-01-05 00:00:00';
  		$fin = $año.'-12-30 23:59:59';
  		
		$data['arr'] = $this->Cargador_model->listarCargadores($inicio, $fin);
		$this->load->view('listado_cargadores', $data);
	}

	function crearNuevaInscripcion(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$cui = $this->Cargador_model->nueroCargador();
		if ($_POST['id_resultado'] == 0) {
			if ((!empty($_POST['nombre'])) || (!empty($_POST['apellido'])) || (!empty($_POST['fecha'])) || (!empty($_POST['edad'])) || (!empty($_POST['genero'])) || (!empty($_POST['numero1'])) || (!empty($_POST['direccion'])) || (!empty($_POST['muni'])) || (!empty($_POST['años'])) || (!empty($_POST['vestimenta'])) || (!empty($_POST['ofrenda'])) || (!empty($_POST['descripcion'])) ) {
			
				$data['nombre'] = $_POST['nombre'];
				$data['apellido'] = $_POST['apellido'];
				if ($_POST['cui'] == 0) {
					$data['cui'] = $cui;
				} else {
					$data['cui'] = $_POST['cui'];
				}
				$data['fecha'] = $_POST['fecha'];
				$data['edad'] = $_POST['edad'];
				$data['genero'] = $_POST['genero'];
				$data['numero1'] = $_POST['numero1'];
				$data['numero2'] = $_POST['numero2'];
				$data['direccion'] = $_POST['direccion'];
				$data['muni_id_muni'] = $_POST['muni'];
				$data['anios'] = $_POST['años'];
				$data['altura'] = $_POST['altura'];
				$data['vestimenta'] = $_POST['vestimenta'];
				$data['ofrenda'] = $_POST['ofrenda'];
				$data['descripcion'] = $_POST['descripcion'];
				$data['fecha_registro'] = date("Y-m-d H:i:s");
				$data['us_id_usuario'] = $this->session->IDUSUARIO;
				$data['usuario_id_usuario'] = $this->session->IDUSUARIO;
				$data['col_id_colaborador'] = 1;
				$data['tipo'] = 'Cargadora';
				$data['estado'] = 'A';

				$car_id_cargador = $this->Cargador_model->crearCargador($data['cui'], $data['altura'], $data['muni_id_muni'], $data['usuario_id_usuario'], $data['estado']);
				$inscripcion = $this->Cargador_model->crearCargadorInscripcion($data['anios'], $data['vestimenta'], $data['ofrenda'], $data['descripcion'], $data['fecha_registro'], $data['us_id_usuario'], $car_id_cargador, $data['col_id_colaborador'], $data['estado'], $data['tipo']);
				$this->Cargador_model->crearCargadorPersona($data['nombre'], $data['apellido'], $data['direccion'], $car_id_cargador);
				$this->Cargador_model->crearCargadorNacimiento($data['fecha'], $data['edad'], $car_id_cargador);
				$this->Cargador_model->crearCargadorGenero($data['genero'], $car_id_cargador);
				$this->Cargador_model->crearCargadorTelefono($data['numero1'], $data['numero2'], $car_id_cargador); 
				echo json_encode($inscripcion, JSON_UNESCAPED_UNICODE);
			} else {
				echo 'error';
			}
		}else if ((!empty($_POST['cargador'])) || (!empty($_POST['nombre'])) || (!empty($_POST['apellido'])) || (!empty($_POST['cui'])) || (!empty($_POST['direccion'])) || (!empty($_POST['fecha'])) || (!empty($_POST['edad'])) || (!empty($_POST['genero'])) || (!empty($_POST['numero1'])) || (!empty($_POST['numero2'])) || (!empty($_POST['años'])) || (!empty($_POST['ofrenda'])) || (!empty($_POST['descripcion']))) {
			
			$car_id_cargador = $_POST['id_resultado'];
			$id_inscripcion = $_POST['id_inscripcion'];
			$data['nombre'] = $_POST['nombre'];
			$data['apellido'] = $_POST['apellido'];
			$data['cui'] = $_POST['cui'];
			$data['direccion'] = $_POST['direccion'];
			$data['fecha'] = $_POST['fecha'];
			$data['edad'] = $_POST['edad'];
			$data['genero'] = $_POST['genero'];
			$data['numero1'] = $_POST['numero1'];
			$data['numero2'] = $_POST['numero2'];

			$data['anios'] = $_POST['años'];
			$data['altura'] = $_POST['altura'];
			$data['ofrenda'] = $_POST['ofrenda'];
			$data['descripcion'] = $_POST['descripcion'];
			$data['fecha_registro'] = date("Y-m-d H:i:s");
			$data['us_id_usuario'] = $this->session->IDUSUARIO;
		
			$this->Cargador_model->updateCargadorDate($data['cui'], $car_id_cargador);
			$this->Cargador_model->updateCargadorPers($data['nombre'], $data['apellido'], $data['direccion'], $car_id_cargador);
			$this->Cargador_model->updateCargadorNaci($data['fecha'], $data['edad'], $car_id_cargador);
			$this->Cargador_model->updateCargadorGene($data['genero'], $car_id_cargador);
			$this->Cargador_model->updateCargadorTele($data['numero1'], $data['numero2'], $car_id_cargador);
			$resultado = $this->Cargador_model->updateCargadorInscripcion($data['anios'], $data['ofrenda'], $data['descripcion'], $data['fecha_registro'], $data['us_id_usuario'], $car_id_cargador);
			if ($resultado == true) {
				echo json_encode($id_inscripcion, JSON_UNESCAPED_UNICODE);
			}else{
				echo 'error';
			}
		}
	}

	function detalle_cargador($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Cargador_model->detalledelCargador($id);
		$this->load->view('persona_mostrar_detalle', $data);
	}

	function detalle_cargadorEditar(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$id = $_POST['id'];
		$datos = $this->Cargador_model->detalledelCargadorEditar($id);
		echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	}

	function generacion($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Cargador_model->reciboCargador($id);
		$this->load->view('recibo', $data);
	}

	function generacionrecibo($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Cargador_model->reciboCargadorEstand($id);
		$this->load->view('reciboestan', $data);
	}

	//traer el numero de turno
		function datosInfo(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Director') {
			$cantidad = $this->Cargador_model->buscargrupoNumero();
			echo json_encode($cantidad, JSON_UNESCAPED_UNICODE);
		}
	}

	function updategroup(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		
		if ((!empty($_POST['correlacion'])) || (!empty($_POST['nuevo'])) ) {
			$data['id_grupo'] = $_POST['correlacion'];
			$data['cantidad'] = $_POST['nuevo'];

			$grupo = $this->Cargador_model->editarGrupo($data['id_grupo'], $data['cantidad']);
			echo json_encode($grupo, JSON_UNESCAPED_UNICODE);
		} else {
			echo 'error';
		}
	}
//sección de ofrendas
	function datosCosto(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data = $this->Cargador_model->ofrenda();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function updateOfrenda(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ((!empty($_POST['canofren'])) || (!empty($_POST['desofren'])) ) {
			$data['id_ofrenda'] = 1;
			$data['cantidad'] = $_POST['canofren'];
			$data['descripcion'] = $_POST['desofren'];
			$datas = $this->Cargador_model->editarOfrenda($data['id_ofrenda'], $data['cantidad'], $data['descripcion']);
			echo json_encode($datas, JSON_UNESCAPED_UNICODE);
		} else {
			echo 'error';
		}
	}

	function ofrendaIncensarioGrande(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data = $this->Cargador_model->ofrendaIncensarioGrande();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function updateIncensarioGrande(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ((!empty($_POST['canofren'])) || (!empty($_POST['desofren'])) ) {
			$data['id_ofrenda'] = 2;
			$data['cantidad'] = $_POST['canofren'];
			$data['descripcion'] = $_POST['desofren'];
			$datas = $this->Cargador_model->updateIncensarioGrande($data['id_ofrenda'], $data['cantidad'], $data['descripcion']);
			echo json_encode($datas, JSON_UNESCAPED_UNICODE);
		} else {
			echo 'error';
		}
	}

	function ofrendaIncensarioPeque(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data = $this->Cargador_model->ofrendaIncensarioPeque();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function updateIncensarioPeque(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ((!empty($_POST['canofren'])) || (!empty($_POST['desofren'])) ) {
			$data['id_ofrenda'] = 3;
			$data['cantidad'] = $_POST['canofren'];
			$data['descripcion'] = $_POST['desofren'];
			$datas = $this->Cargador_model->updateIncensarioPeque($data['id_ofrenda'], $data['cantidad'], $data['descripcion']);
			echo json_encode($datas, JSON_UNESCAPED_UNICODE);
		} else {
			echo 'error';
		}
	}

	function ofrendaEstandarteGrande(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data = $this->Cargador_model->ofrendaEstandarteGrande();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function updateEstandarteGrande(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ((!empty($_POST['canofren'])) || (!empty($_POST['desofren'])) ) {
			$data['id_ofrenda'] = 4;
			$data['cantidad'] = $_POST['canofren'];
			$data['descripcion'] = $_POST['desofren'];
			$datas = $this->Cargador_model->updateEstandarteGrande($data['id_ofrenda'], $data['cantidad'], $data['descripcion']);
			echo json_encode($datas, JSON_UNESCAPED_UNICODE);
		} else {
			echo 'error';
		}
	}

	function ofrendaEstandartePeque(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data = $this->Cargador_model->ofrendaEstandartePeque();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function updateEstandartePeque(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ((!empty($_POST['canofren'])) || (!empty($_POST['desofren'])) ) {
			$data['id_ofrenda'] = 5;
			$data['cantidad'] = $_POST['canofren'];
			$data['descripcion'] = $_POST['desofren'];
			$datas = $this->Cargador_model->updateEstandartePeque($data['id_ofrenda'], $data['cantidad'], $data['descripcion']);
			echo json_encode($datas, JSON_UNESCAPED_UNICODE);
		} else {
			echo 'error';
		}
	}
////////////////////////////////////////////////

	function buscarpersona(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if ($this->session->ROL == 'Directora') {
			$data['id_colaborador'] = $_POST['colaborador'];
			$resultado = $this->Cargador_model->buscarPersonaEliminar($data['id_colaborador']);
			echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
		} else {
			redirect("/inicio");
		}
	}

	function changepersona(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if ($this->session->ROL == 'Directora') {
			$data['id_cargador'] = $_POST['persona'];
			$resultado = $this->Cargador_model->personaEliminar($data['id_cargador']);
			echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
		} else {
			redirect("/inicio");
		}
	}


	function updateCargadorData(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if ((!empty($_POST['cargador'])) || (!empty($_POST['nombre'])) || (!empty($_POST['apellido'])) || (!empty($_POST['cui'])) || (!empty($_POST['direccion'])) || (!empty($_POST['fecha'])) || (!empty($_POST['edad'])) || (!empty($_POST['genero'])) || (!empty($_POST['numero1'])) || (!empty($_POST['numero2']))) {
			
			$car_id_cargador = $_POST['cargador'];
			$data['nombre'] = $_POST['nombre'];
			$data['apellido'] = $_POST['apellido'];
			$data['cui'] = $_POST['cui'];
			$data['direccion'] = $_POST['direccion'];
			$data['fecha'] = $_POST['fecha'];
			$data['edad'] = $_POST['edad'];
			$data['genero'] = $_POST['genero'];
			$data['numero1'] = $_POST['numero1'];
			$data['numero2'] = $_POST['numero2'];

			$this->Cargador_model->updateCargadorDate($data['cui'], $car_id_cargador);
			$this->Cargador_model->updateCargadorPers($data['nombre'], $data['apellido'], $data['direccion'], $car_id_cargador);
			$this->Cargador_model->updateCargadorNaci($data['fecha'], $data['edad'], $car_id_cargador);
			$this->Cargador_model->updateCargadorGene($data['genero'], $car_id_cargador);
			$resultado = $this->Cargador_model->updateCargadorTele($data['numero1'], $data['numero2'], $car_id_cargador);
			echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
		} else {
			echo 'error';
		}
	}

	function inscripciondolorosa(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$año = date("Y");
  		$inicio = $año.'-01-05 00:00:00';
  		$fin = $año.'-12-30 23:59:59';

		$data['arr'] = $this->Cargador_model->inscripcionCargadoresTurno($inicio, $fin);
		$data['grupo'] = $this->Cargador_model->numeroCargadoresTurnoData();
		$total_registro = $this->Cargador_model->contarcantidadinscripcion();
		$numeroGrupo = $this->Cargador_model->numeroCargadoresTurno();
		$this->load->view('viacrucis', $data);
	}

	function generarListadoCargadoras(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$año = date("Y");
  		$inicio = $año.'-01-05 00:00:00';
  		$fin = $año.'-12-30 23:59:59';

		$data['arr'] = $this->Cargador_model->inscripcionCargadoresTurno($inicio, $fin);
		$data['grupo'] = $this->Cargador_model->numeroCargadoresTurnoData();

		$cantidadcargadores = 0;
		$grupode = 0;

		foreach ($data['arr'] as $b){ 
		    $cantidadcargadores = $cantidadcargadores + 1;
		}

		foreach ($data['grupo'] as $c){
			$grupode = $c['numero'];
		}
		$laditos = $grupode/2;

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
	    $mostrarTurno = 0;
	    $ladoIzquierdo = '';
	   	$ladoIzquierdo.= "
	   	<table class='table table-hover table-bordered table-sm'>
	  		<thead>
			    <tr>
			      <th class='text-center' style='width:5%'>No.</th>
			      <th class='text-center' style='width:56%'>Cargador</th>
			      <th class='text-center' style='width:13%'>Altura</th>
			      <th class='text-center' style='width:13%'>Turno No.</th>
			      <th class='text-center' style='width:13%'>Lado</th>
			    </tr>
		  	</thead>
		  	<tbody>	 ";
	    $ladoDerecho = '';
	    $ladoDerecho.= "
	   	<table class='table table-hover table-bordered table-sm'>
	  		<thead>
			    <tr>
			      <th class='text-center' style='width:5%'>No.</th>
			      <th class='text-center' style='width:56%'>Cargador</th>
			      <th class='text-center' style='width:13%'>Altura</th>
			      <th class='text-center' style='width:13%'>Turno No.</th>
			      <th class='text-center' style='width:13%'>Lado</th>
			    </tr>
		  	</thead>
		  	<tbody>	 ";
	  	foreach ($data['arr'] as $b){ 
	  		$secuencia = $secuencia + 1;
	  		$seccion ++;

	      	if ($secuencia == $lim) {
	      		$turno = $turno + 1;
	      		$secuencia = 1;
	      		$mostrarTurno = $turno-1;
	      		$ladoIzquierdo.="
	      		<div class='contenidoCargadora'>
					<div class='row1'>
						<div class='turno'>
							<h3 >Turno No. ".$mostrarTurno."</h3>
						</div>
						<div class=''>
							<img src='".$data['base_url']."/recursos/img/logo.png' class='img-fluid' width='70' align='right'>
						</div>
					</div>
				</div>
	      		<table class='table table-hover table-bordered table-sm'>
	      		<thead>
				    <tr>
				      <th class='text-center' style='width:5%'>No.</th>
				      <th class='text-center' style='width:56%'>Cargador</th>
				      <th class='text-center' style='width:13%'>Altura</th>
				      <th class='text-center' style='width:13%'>Turno No.</th>
				      <th class='text-center' style='width:13%'>Lado</th>
				    </tr>
			  	</thead>
			  	<tbody>	 ";
			  	$ladoDerecho.="
	      		<div class='contenidoCargadora'>
					<div class='row1'>
						<div class='turno'>
							<h3 >Turno No. ".$mostrarTurno."</h3>
						</div>
						<div class=''>
							<img src='".$data['base_url']."/recursos/img/logo.png' class='img-fluid' width='70' align='right'>
						</div>
					</div>
				</div>
	      		<table class='table table-hover table-bordered table-sm'>
	      		<thead>
				    <tr>
				      <th class='text-center' style='width:5%'>No.</th>
				      <th class='text-center' style='width:56%'>Cargador</th>
				      <th class='text-center' style='width:13%'>Altura</th>
				      <th class='text-center' style='width:13%'>Turno No.</th>
				      <th class='text-center' style='width:13%'>Lado</th>
				    </tr>
			  	</thead>
			  	<tbody>	 ";
	      	}

	      	if (($secuencia % 2) == 0) {
	      		$ladoCarga = 'Izquierda';
	      		//declarar la tabla a utilziar
				$ladoIzquierdo.="
					<tr>
					   	<td class='text-center'>".$secuencia."</td>
			            <td>".$b['nombre']."</td>
			            <td class='text-center'>".$b['vestimenta']."</td>
			            <td class='text-center' style='font-weight: bold;'>".$turno."</td>
			            <td class='text-center'>".$ladoCarga."</td>
					</tr>
				";
				$ladoIzquierdo.="</tbody> ";
	      	} else {
				$ladoCarga = 'Derecha';
				$ladoDerecho.="
					<tr>
					   	<td class='text-center'>".$secuencia."</td>
			            <td>".$b['nombre']."</td>
			            <td class='text-center'>".$b['vestimenta']."</td>
			            <td class='text-center' style='font-weight: bold;'>".$turno."</td>
			            <td class='text-center'>".$ladoCarga."</td>
					</tr>
				";
				$ladoDerecho.="</tbody> ";
			}
		}
		$generacion['ladoIzquierdo'] = $ladoIzquierdo;
		$generacion['ladoDerecho'] = $ladoDerecho;
		echo json_encode($generacion, JSON_UNESCAPED_UNICODE);
	}

	function generarExcelListado(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$año = date("Y");
  		$inicio = $año.'-01-05 00:00:00';
  		$fin = $año.'-12-30 23:59:59';

		$data['arr'] = $this->Cargador_model->inscripcionCargadoresTurno($inicio, $fin);
		$data['grupo'] = $this->Cargador_model->numeroCargadoresTurnoData();

		$cantidadcargadores = 0;
		$grupode = 0;

		foreach ($data['arr'] as $b){ 
		    $cantidadcargadores = $cantidadcargadores + 1;
		}

		foreach ($data['grupo'] as $c){
			$grupode = $c['numero'];
		}
		$laditos = $grupode/2;

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
	    $mostrarTurno = 0;
	    $ladoIzquierdo = '';
	    //seccion del excel
		$excel = new Spreadsheet();
		$hojaActiva = $excel->getActiveSheet();
		$hojaActiva->setTitle("Cargadoras L Izquierdo");

		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
	    $drawing->setName('Paid');
	    $drawing->setDescription('Paid');
	    $drawing->setPath('./recursos/img/escudo.png'); /* put your path and image here */
	    $drawing->setCoordinates('C1');
	    $drawing->setHeight(60);
	    $drawing->setOffsetX(60);
	    $drawing->setRotation(0);
	    $drawing->setWorksheet($excel->getActiveSheet());

		$styleArray = [
		    'font' => [
		        'bold' => true,
		    ],
		    'alignment' => [
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
		    ],
		];

		$styleArrayA = [
		    'font' => [
		        'bold' => true,
		    ],
		    'alignment' => [
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
		    ],
		    'borders' => [
		        'top' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		        ],
		    ],
		];

		$styleArrayB = [
		    'borders' => [
		        'top' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		        ],
		    ],
		    'alignment' => [
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
		    ],
		];

		$excel->getActiveSheet()->getStyle('A5')->applyFromArray($styleArrayA);
		$excel->getActiveSheet()->getStyle('B5')->applyFromArray($styleArrayA);
		$excel->getActiveSheet()->getStyle('C5')->applyFromArray($styleArrayA);
		$excel->getActiveSheet()->getStyle('D5')->applyFromArray($styleArrayA);
		$excel->getActiveSheet()->getStyle('E5')->applyFromArray($styleArrayA);

		$hojaActiva->getColumnDimension('A')->setWidth(5);
		$hojaActiva->setCellValue('A5', 'No.');
		$hojaActiva->getColumnDimension('B')->setWidth(50);
		$hojaActiva->setCellValue('B5', 'Nombre de la Cargadora');
		$hojaActiva->getColumnDimension('C')->setWidth(7);
		$hojaActiva->setCellValue('C5', 'Altura');
		$hojaActiva->getColumnDimension('D')->setWidth(9);
		$hojaActiva->setCellValue('D5', 'Turno');
		$hojaActiva->getColumnDimension('E')->setWidth(9);
		$hojaActiva->setCellValue('E5', 'Lado');

		$hojaActiva->setCellValue('A1', 'HERMANDAD VÍRGEN DE DOLORES');
		$hojaActiva->setCellValue('A2', 'Parroquia San Miguel Arcángel Totonicapán');
		$hojaActiva->setCellValue('A3', 'CARGADORAS '.date('Y'));
		$fila = 5;
		$correla = 0;
		foreach ($data['arr'] as $b){ 
	  		$secuencia = $secuencia + 1;
	  		$seccion ++;
	  		$hojaActiva->setCellValue('E'.$fila, $ladoCarga);
	  		$correla =  + 10;

	      	if ($secuencia == $lim) {
	      		$turno = $turno + 1;
	      		$secuencia = 1;
	      		$mostrarTurno = $turno-1;
	      		$hojaActiva->setCellValue('F'.$fila, 'Turno No. '.$mostrarTurno);
	      		$excel->getActiveSheet()->setBreak('F'.$fila, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_ROW);

	      	}

	      	if (($secuencia % 2) == 0) {
	      		$ladoCarga = 'Izquierda';
	      		//declarar la tabla a utilziar
	      		$fila++;
	      		$excel->getActiveSheet()->getStyle('A'.$fila)->applyFromArray($styleArrayB);
				$excel->getActiveSheet()->getStyle('B'.$fila)->applyFromArray($styleArrayB);
				$excel->getActiveSheet()->getStyle('C'.$fila)->applyFromArray($styleArrayB);
				$excel->getActiveSheet()->getStyle('D'.$fila)->applyFromArray($styleArrayB);
				$excel->getActiveSheet()->getStyle('E'.$fila)->applyFromArray($styleArrayB);
				$hojaActiva->setCellValue('A'.$fila, $secuencia);
				$hojaActiva->setCellValue('B'.$fila, $b['nombre']);
				$hojaActiva->setCellValue('C'.$fila, $b['vestimenta']);
				$hojaActiva->setCellValue('D'.$fila, $turno);
				$hojaActiva->setCellValue('E'.$fila, $ladoCarga);
	      	}
	      	/*
	      	 else {
				$ladoCarga = 'Derecha';
				$excel->getActiveSheet()->getStyle('A'.$fila)->applyFromArray($styleArrayB);
				$excel->getActiveSheet()->getStyle('B'.$fila)->applyFromArray($styleArrayB);
				$excel->getActiveSheet()->getStyle('C'.$fila)->applyFromArray($styleArrayB);
				$excel->getActiveSheet()->getStyle('D'.$fila)->applyFromArray($styleArrayB);
				$excel->getActiveSheet()->getStyle('E'.$fila)->applyFromArray($styleArrayB);
				$hojaActiva->setCellValue('A'.$fila, $secuencia);
				$hojaActiva->setCellValue('B'.$fila, $b['nombre']);
				$hojaActiva->setCellValue('C'.$fila, $b['vestimenta']);
				$hojaActiva->setCellValue('D'.$fila, $turno);
				$hojaActiva->setCellValue('E'.$fila, $ladoCarga);
				$fila++;
			} */
		}

		$apellido = date('Y');

		$excel->getDefaultStyle()
			->getFont()
			->setName('Arial')
			->setSize(11);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Cargadoras '.$apellido.'.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new  Xlsx($excel);
		$writer->save('php://output');
	}
	
//traer y actualizar numero de cargadores
	function trarnumero(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$cant = $this->Cargador_model->numeroCargadoresTurno();
		echo json_encode($cant, JSON_UNESCAPED_UNICODE);
	}

	function updatetrarnumero(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ((!empty($_POST['nuevo'])) ){
		$data['id'] = 1;
		$data['turno'] = $_POST['nuevo'];
		$respuesta = $this->Cargador_model->updateNumeroCargadoresTurno($data['turno'], $data['id']);
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		} else {
			echo 'error';
		}
	}

	function pruebass(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['grupo'] = $this->Cargador_model->numeroCargadoresTurno();
		$this->load->view('prueba', $data);
	}
	////seccion de3 paginacion
	function cargadorasjueves(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		
		$año = date("Y");
  		$inicio = $año.'-01-05 00:00:00';
  		$fin = $año.'-12-30 23:59:59';

		$data['arr'] = $this->Cargador_model->cargadorasjueves($inicio, $fin);
		$data['grupo'] = $this->Cargador_model->numeroCargadoresTurnoData();
		$this->load->view('jueves', $data);
	}

	////////////////////////////////////SECCION ESTANDARTE Y INCENSARIOS/////////////////
	function inscripcionines(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('estandarte', $data);
	}

	function tipodatopersona($id = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['tipodatapersona'] =  $this->Cargador_model->seleccionarPersonaTipo(); //Selelcciona el departemanto
		echo '<option selected disabled value="">Seleccionar</option>';
		foreach ($data['tipodatapersona'] as $key) {
		if ($id == $key['id_ofrenda']) {
			echo '<option selected value="'.$key['id_ofrenda'].'">'.$key['nombre'].'</option>'."\n";
			}else {
				echo '<option value="'.$key['id_ofrenda'].'">'.$key['nombre'].'</option>'."\n";
			}
		}
	}

	function datosofrenda($id = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$id_ofrenda = $_POST['tipodatapersona'];
		$ofrenda =  $this->Cargador_model->seleccionarDatosDetallados($id_ofrenda); //Selelcciona el municipio
		echo json_encode($ofrenda, JSON_UNESCAPED_UNICODE);
	}

	function crearNuevaInscripcionIncensario(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if ((!empty($_POST['nombre'])) || (!empty($_POST['apellido'])) || (!empty($_POST['fecha'])) || (!empty($_POST['edad'])) || (!empty($_POST['genero'])) || (!empty($_POST['numero1'])) || (!empty($_POST['direccion'])) || (!empty($_POST['muni'])) || (!empty($_POST['años'])) || (!empty($_POST['ofrenda'])) || (!empty($_POST['descripcion'])) ) {

			
			$data['nombre'] = $_POST['nombre'];
			$data['apellido'] = $_POST['apellido'];
			if ($_POST['cui'] == 0) {
				$cui = $this->Cargador_model->nueroIncensario();
				$data['cui'] = $cui;
			} else {
				$data['cui'] = $_POST['cui'];
			}
			$data['fecha'] = $_POST['fecha'];
			$data['edad'] = $_POST['edad'];
			$data['genero'] = $_POST['genero'];
			$data['numero1'] = $_POST['numero1'];
			$data['numero2'] = $_POST['numero2'];
			$data['direccion'] = $_POST['direccion'];
			$data['muni_id_muni'] = $_POST['muni'];
			$data['anios'] = $_POST['años'];
			$data['vestimenta'] = $_POST['tipodatapersona'];
			$data['ofrenda'] = $_POST['ofrenda'];
			$data['descripcion'] = $_POST['descripcion'];
			$data['fecha_registro'] = date("Y-m-d H:i:s");
			$data['us_id_usuario'] = 1;
			$data['car_id_cargador'] = 1;
			$data['usuario_id_usuario'] = $this->session->IDUSUARIO;
			$data['col_id_colaborador'] = 1;
			$data['estado'] = 'A';
			$data['tipo'] = 'Incen/Estan';

			$incen_id_incen = $this->Cargador_model->crearIncensarioColaborador($data['cui'], $data['muni_id_muni'], $data['usuario_id_usuario']);
			$inscripcion = $this->Cargador_model->crearEstandarteInscripcion($data['anios'], $data['vestimenta'], $data['ofrenda'], $data['descripcion'], $data['fecha_registro'], $data['us_id_usuario'], $data['car_id_cargador'], $data['col_id_colaborador'], $incen_id_incen, $data['estado'], $data['tipo']);
			$this->Cargador_model->crearEstandartePersona($data['nombre'], $data['apellido'], $data['direccion'], $data['us_id_usuario'], $data['col_id_colaborador'], $data['car_id_cargador'], $incen_id_incen);
			$this->Cargador_model->crearEstandarteNacimiento($data['fecha'], $data['edad'], $data['col_id_colaborador'], $data['car_id_cargador'], $incen_id_incen);
			$this->Cargador_model->crearEstandarteGenero($data['genero'], $data['col_id_colaborador'], $data['car_id_cargador'], $incen_id_incen);
			$this->Cargador_model->crearEstandarteTelefono($data['numero1'], $data['numero2'], $data['us_id_usuario'], $data['col_id_colaborador'], $data['car_id_cargador'], $incen_id_incen); 
			echo json_encode($inscripcion, JSON_UNESCAPED_UNICODE);
		
		} else {
			echo 'error';
		
		}

	}

	///seccion lista de estandarte y incensarios
	function listadoestandarte(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$año = date("Y");
  		$inicio = $año.'-01-05 00:00:00';
  		$fin = $año.'-12-30 23:59:59';

		$data['arr'] = $this->Cargador_model->listado_inscripcion_estandarte($inicio, $fin);
		$data['arr2'] = $this->Cargador_model->listado_inscripcion_estandarte_peque($inicio, $fin);
		$this->load->view('listado_estandarte', $data);
	}

	function listainsensario(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$año = date("Y");
  		$inicio = $año.'-01-05 00:00:00';
  		$fin = $año.'-12-30 23:59:59';

		$data['arr'] = $this->Cargador_model->listado_inscripcion_incensario($inicio, $fin);
		$data['arr2'] = $this->Cargador_model->listado_inscripcion_incensario_peque($inicio, $fin);
		$this->load->view('listado_incensario', $data);
	}
}