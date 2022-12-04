<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class listados extends CI_Controller {
function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Listado_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("usuario");
		}
	}

	function usesistem(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->Listado_model->seleccionarUsuarios();
		$this->load->view('listado_usuarios', $data);
	}

	function ingreso(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		//$data['arr'] = $this->Listado_model->seleccionarUsuarios();
		if ($this->session->ROL == 'Directora') {
		$this->load->view('finanza', $data);
		} else {
			redirect("/Inicio");
		}
	}

	function ingresocargadores(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = $año.'-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

	        $arr = $this->Listado_model->traerOfrendasCargadores($inicio, $fin);
	        $result = $arr;

	        $detalleTabla   = '';
	        $detalleTotales = '';
	        $tl_sniva     = 0;
	        $subtotal        = 0;
	        $arrayData    = array();

	        if ($result > 0) {
	          foreach ($arr as $a) {
	        
	        $tl_sniva = round(($a['valor'] * $a['cantidad']), 2);
	        $subtotal = round($tl_sniva + $subtotal, 2);
	        $total 	  = number_format($subtotal,2);
	      
	          $detalleTabla .=  "<tr>
	              <td>".$a['descripcion']."</td>
	              <td class='text-center'>Q. ".$a['valor']."</td>
	              <td class='text-center'>".$a['cantidad']."</td>
	              <td class='text-end' >Q. ".$a['ofrenda']."</td>
	          </tr>";
	          }
	        }
	       
	        $detalleTotales = '
	        <tr>
	          <td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">TOTAL Q.</td> 
	          <td class="text-end" style="font-weight: bold; font-size: 16px;">'.$total.'</td>   
	        </tr>
	        ';

	        $arrayData['detalle'] = $detalleTabla;
	        $arrayData['totales'] = $detalleTotales;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);

        } else {
			redirect("/Inicio");
		}
	}

	function ingresocolaboradores(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = $año.'-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

	        $arr = $this->Listado_model->traerOfrendasColaboradores($inicio, $fin);
	        $result = $arr;

	        $detalleTabla   = '';
	        $detalleTotales = '';
	        $tl_sniva     = 0;
	        $subtotal        = 0;
	        $arrayData    = array();

	        if ($result > 0) {
	          foreach ($arr as $a) {
	        
	        $tl_sniva = round(($a['valor'] * $a['cantidad']), 2);
	        $subtotal = round($tl_sniva + $subtotal, 2);
	        $total 	  = number_format($subtotal,2);
	      
	          $detalleTabla .=  "<tr>
	              <td>".$a['descripcion']."</td>
	              <td class='text-center'>Q. ".$a['valor']."</td>
	              <td class='text-center'>".$a['cantidad']."</td>
	              <td class='text-end' >Q. ".$a['ofrenda']."</td>
	          </tr>";
	          }
	        }
	       
	        $detalleTotales = '
	        <tr>
	          <td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">TOTAL Q.</td> 
	          <td class="text-end" style="font-weight: bold; font-size: 16px;">'.$total.'</td>   
	        </tr>
	        ';

	        $arrayData['detalle'] = $detalleTabla;
	        $arrayData['totales'] = $detalleTotales;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);

        } else {
			redirect("/Inicio");
		}
	}

	function ingresoceladores(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = $año.'-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

	        $arr = $this->Listado_model->traerOfrendasCeladores($inicio, $fin);
	        $result = $arr;

	        $detalleTabla   = '';
	        $detalleTotales = '';
	        $tl_sniva     = 0;
	        $subtotal        = 0;
	        $arrayData    = array();

	        if ($result > 0) {
	          foreach ($arr as $a) {
	        
	        $tl_sniva = round(($a['valor'] * $a['cantidad']), 2);
	        $subtotal = round($tl_sniva + $subtotal, 2);
	        $total 	  = number_format($subtotal,2);
	      
	          $detalleTabla .=  "<tr>
	              <td>".$a['descripcion']."</td>
	              <td class='text-center'>Q. ".$a['valor']."</td>
	              <td class='text-center'>".$a['cantidad']."</td>
	              <td class='text-end' >Q. ".$a['ofrenda']."</td>
	          </tr>";
	          }
	        }
	       
	        $detalleTotales = '
	        <tr>
	          <td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">TOTAL Q.</td> 
	          <td class="text-end" style="font-weight: bold; font-size: 16px;">'.$total.'</td>   
	        </tr>
	        ';

	        $arrayData['detalle'] = $detalleTabla;
	        $arrayData['totales'] = $detalleTotales;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);

        } else {
			redirect("/Inicio");
		}
	}

	function ingresocoordinadores(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = $año.'-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

	        $arr = $this->Listado_model->traerOfrendasCoordinadores($inicio, $fin);
	        $result = $arr;

	        $detalleTabla   = '';
	        $detalleTotales = '';
	        $tl_sniva     = 0;
	        $subtotal        = 0;
	        $arrayData    = array();

	        if ($result > 0) {
	          foreach ($arr as $a) {
	        
	        $tl_sniva = round(($a['valor'] * $a['cantidad']), 2);
	        $subtotal = round($tl_sniva + $subtotal, 2);
	        $total 	  = number_format($subtotal,2);
	      
	          $detalleTabla .=  "<tr>
	              <td>".$a['descripcion']."</td>
	              <td class='text-center'>Q. ".$a['valor']."</td>
	              <td class='text-center'>".$a['cantidad']."</td>
	              <td class='text-end' >Q. ".$a['ofrenda']."</td>
	          </tr>";
	          }
	        }
	       
	        $detalleTotales = '
	        <tr>
	          <td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">TOTAL Q.</td> 
	          <td class="text-end" style="font-weight: bold; font-size: 16px;">'.$total.'</td>   
	        </tr>
	        ';

	        $arrayData['detalle'] = $detalleTabla;
	        $arrayData['totales'] = $detalleTotales;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);

        } else {
			redirect("/Inicio");
		}
	}

	//insensarios y estandartes
	function ingresoestandarte(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = $año.'-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

	        $arr = $this->Listado_model->traerOfrendasEstandartes($inicio, $fin);
	        $result = $arr;

	        $detalleTabla   = '';
	        $detalleTotales = '';
	        $tl_sniva     = 0;
	        $subtotal        = 0;
	        $arrayData    = array();

	        if ($result > 0) {
	          foreach ($arr as $a) {
	        
	        $tl_sniva = round(($a['valor'] * $a['cantidad']), 2);
	        $subtotal = round($tl_sniva + $subtotal, 2);
	        $total 	  = number_format($subtotal,2);
	      
	          $detalleTabla .=  "<tr>
	              <td>".$a['descripcion']."</td>
	              <td class='text-center'>Q. ".$a['valor']."</td>
	              <td class='text-center'>".$a['cantidad']."</td>
	              <td class='text-end' >Q. ".$a['ofrenda']."</td>
	          </tr>";
	          }
	        }
	       
	        $detalleTotales = '
	        <tr>
	          <td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">TOTAL Q.</td> 
	          <td class="text-end" style="font-weight: bold; font-size: 16px;">'.$total.'</td>   
	        </tr>
	        ';

	        $arrayData['detalle'] = $detalleTabla;
	        $arrayData['totales'] = $detalleTotales;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);

        } else {
			redirect("/Inicio");
		}
	}

	function ingresoincensario(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = $año.'-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

	        $arr = $this->Listado_model->traerOfrendasIncensario($inicio, $fin);
	        $result = $arr;

	        $detalleTabla   = '';
	        $detalleTotales = '';
	        $tl_sniva     = 0;
	        $subtotal        = 0;
	        $arrayData    = array();

	        if ($result > 0) {
	          foreach ($arr as $a) {
	        
	        $tl_sniva = round(($a['valor'] * $a['cantidad']), 2);
	        $subtotal = round($tl_sniva + $subtotal, 2);
	        $total 	  = number_format($subtotal,2);
	      
	          $detalleTabla .=  "<tr>
	              <td>".$a['descripcion']."</td>
	              <td class='text-center'>Q. ".$a['valor']."</td>
	              <td class='text-center'>".$a['cantidad']."</td>
	              <td class='text-end' >Q. ".$a['ofrenda']."</td>
	          </tr>";
	          }
	        }
	       
	        $detalleTotales = '
	        <tr>
	          <td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">TOTAL Q.</td> 
	          <td class="text-end" style="font-weight: bold; font-size: 16px;">'.$total.'</td>   
	        </tr>
	        ';

	        $arrayData['detalle'] = $detalleTabla;
	        $arrayData['totales'] = $detalleTotales;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);

        } else {
			redirect("/Inicio");
		}
	}

	function ingresogeneral(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = '2018-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

	        $arr = $this->Listado_model->traerOfrendasIngresoGeneral($inicio, $fin);
	        $result = $arr;

	        $detalleTabla   = '';
	        $detalleTotales = '';
	        $tl_sniva     = 0;
	        $subtotal        = 0;
	        $arrayData    = array();

	        if ($result > 0) {
	          foreach ($arr as $a) {
	        
	        $tl_sniva = round(($a['valor'] * $a['cantidad']), 2);
	        $subtotal = round($tl_sniva + $subtotal, 2);
	        $total 	  = number_format($subtotal,2);
	      
	          $detalleTabla .=  "<tr>
	              <td>".$a['descripcion']."</td>
	              <td class='text-center'>Q. ".$a['valor']."</td>
	              <td class='text-center'>".$a['cantidad']."</td>
	              <td class='text-end' >Q. ".$a['ofrenda']."</td>
	          </tr>";
	          }
	        }
	       
	        $detalleTotales = '
	        <tr>
	          <td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">TOTAL Q.</td> 
	          <td class="text-end" style="font-weight: bold; font-size: 16px;">'.$total.'</td>   
	        </tr>
	        ';

	        $arrayData['detalle'] = $detalleTabla;
	        $arrayData['totales'] = $detalleTotales;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);

        } else {
			redirect("/Inicio");
		}
	}


	function egresogeneral(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = '2018-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

	        $arr = $this->Listado_model->traerOfrendasEgresoGeneral($inicio, $fin);
	        $result = $arr;

	        $detalleTabla   = '';
	        $detalleTotales = '';
	        $tl_sniva     = 0;
	        $subtotal        = 0;
	        $arrayData    = array();

	        if ($result > 0) {
	          foreach ($arr as $a) {
	        
	        $tl_sniva = round(($a['valor'] * $a['cantidad']), 2);
	        $subtotal = round($tl_sniva + $subtotal, 2);
	        $total 	  = number_format($subtotal,2);
	      
	          $detalleTabla .=  "<tr>
	              <td>".$a['descripcion']."</td>
	              <td class='text-center'>Q. ".$a['valor']."</td>
	              <td class='text-center'>".$a['cantidad']."</td>
	              <td class='text-end' >Q. ".$a['ofrenda']."</td>
	          </tr>";
	          }
	        }
	       
	        $detalleTotales = '
	        <tr>
	          <td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">TOTAL Q.</td> 
	          <td class="text-end" style="font-weight: bold; font-size: 16px;">'.$total.'</td>   
	        </tr>
	        ';

	        $arrayData['detalle'] = $detalleTabla;
	        $arrayData['totales'] = $detalleTotales;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);

        } else {
			redirect("/Inicio");
		}
	}



	function ingresoofrendass(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
  			$inicio = '2018-01-05 00:00:00';
  			$fin = $año.'-12-30 23:59:59';

  			$arr1 = $this->Listado_model->traerOfrendasCargadores1($inicio, $fin);
  			$arr2 = $this->Listado_model->traerOfrendasColaboradores1($inicio, $fin);
  			$arr3 = $this->Listado_model->traerOfrendasCeladores1($inicio, $fin);
	        $arr4 = $this->Listado_model->traerOfrendasCoordinadores1($inicio, $fin);
	        $arr5 = $this->Listado_model->traerOfrendasIncensario1($inicio, $fin);
	        $arr6 = $this->Listado_model->traerOfrendasEstandartes1($inicio, $fin);
	        $arr7 = $this->Listado_model->traerOfrendasIngresoGeneral1($inicio, $fin);
	        $arr8 = $this->Listado_model->traerOfrendasEgresoGeneral1($inicio, $fin);

	        $result = $arr1;
	        
	        $detalleTotales = '';
	        $detalleIngresos = '';
	        $detalleEgresos = '';
	        $detalleFinal = '';

	        $totalPersonas = 0;
	        $totalG = 0;
	        //cantidad ofrenda por cargador
	        if ($result > 0) {
	          	foreach ($arr1 as $a) {
		        $ofren1 = $a['ofren'];
		        $canti1 = $a['cantidad'];
	          }
	        }

	        //cantidad ofrenda por colaborador
	        if ($result > 0) {
	          	foreach ($arr2 as $b) {
		        $ofren2 = $b['ofren'];
		        $canti2 = $b['cantidad'];
	          }
	        }

	        //cantidad ofrenda por celador
	        if ($result > 0) {
	          	foreach ($arr3 as $c) {
		        $ofren3 = $c['ofren'];
		        $canti3 = $c['cantidad'];
	          }
	        }

	        //cantidad ofrenda por coordinador
	        if ($result > 0) {
	          	foreach ($arr4 as $d) {
		        $ofren4 = $d['ofren'];
		        $canti4 = $d['cantidad'];
	          }
	        }

	        //cantidad ofrenda por insensario
	        if ($result > 0) {
	          	foreach ($arr5 as $d) {
		        $ofren5 = $d['ofren'];
		        $canti5 = $d['cantidad'];
	          }
	        }

	        //cantidad ofrenda por estandarte
	        if ($result > 0) {
	          	foreach ($arr6 as $d) {
		        $ofren6 = $d['ofren'];
		        $canti6 = $d['cantidad'];
	          }
	        }

	        //cantidad ofrenda ingreso general
	        if ($result > 0) {
	          	foreach ($arr7 as $j) {
		        $ofren7 = $j['ofren'];
		        $canti7 = $j['cantidad'];
	          }
	        }

	        $totalIngresos = ($ofren7);
	        $totalGen = $canti7;

	        //cantidad ofrenda egreso general
	        $totalEgresos = '';
	        $totalGeEgre = '';

	        if ($result > 0) {
	          	foreach ($arr8 as $p) {
		        $ofren8 = $p['ofren'];
		        $canti8 = $p['cantidad'];
	          }
	        }

	     	$totalEgresos = $ofren8;
	        $totalGeEgre = $canti8;

	        $totalPersonas = ($canti1 + $canti2 + $canti3 + $canti4 + $canti5 + $canti6);
	        $totalG =  ($ofren1 + $ofren2 + $ofren3 + $ofren4 + $ofren5 + $ofren6 );

	        $detalleTotales = '
	        <tr>
	        	<td class="" style="font-weight: bold; font-size: 18px;">Ofrenda Recaudada Hermandad Vígen de Dolores '.date('Y').'</td>
	          	<td class="text-center" style="font-weight: bold; font-size: 18px;">'.$totalPersonas.'</td> 
	          	<td class="text-end" style="font-weight: bold; font-size: 18px;">Q. '.number_format($totalG,2).'</td>   
	        </tr>';

	        $detalleIngresos = '    
	        	<tr>
	        	<td class="" style="font-weight: bold; font-size: 18px;">Ofrenda Recaudada Donación '.date('Y').'</td>
	          	<td class="text-center" style="font-weight: bold; font-size: 18px;">'.$totalGen.'</td> 
	          	<td class="text-end" style="font-weight: bold; font-size: 18px;">Q. '.number_format($totalIngresos,2).'</td>   
	        </tr> ';

	        $detalleEgresos = '    
	        	<tr>
	        	<td class="" style="font-weight: bold; font-size: 18px; background-color: #FF8787;">Egresos '.date('Y').'</td>
	        	<td class="text-center" style="font-weight: bold; font-size: 18px; background-color: #FF8787;">'.$totalGeEgre.'</td>
	          	<td class="text-end" style="font-weight: bold; font-size: 18px; background-color: #FF8787;">Q. '.number_format($totalEgresos,2).'</td> 
	        </tr> ';

	        $totalGan = ($totalPersonas + $totalGen) - $totalGeEgre;
	        $totalEfect = ($totalG + $totalIngresos) - $totalEgresos;

	        $detalleFinal = '
			<tr>
	        	<td class="text-end" style="font-weight: bold; font-size: 18px;">Total Gan:</td>
	        	<td class="text-center" style="font-weight: bold; font-size: 18px;"> -- </td>
	          	<td class="text-end" style="font-weight: bold; font-size: 18px;">Q. '.number_format($totalEfect,2).'</td> 
	        </tr> ';

	        $arrayData['totales'] = $detalleTotales;
	        $arrayData['ingresos'] = $detalleIngresos;
	        $arrayData['egresos'] = $detalleEgresos;
	        $arrayData['final'] = $detalleFinal;
	        echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
        } else {
			redirect("/Inicio");
		}
	}

	//ingresoso y egresos finanzas
	function ingreso_e() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {
			$this->load->view('finanza_ingreso', $data);
		} else {
			redirect("/Inicio");
		}
	}

	function egreso_e() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {
			$this->load->view('finanza_egreso', $data);
		} else {
			redirect("/Inicio");
		}
	}


	function registrarIngreso(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
	
		$a['fecha'] = $_POST['fecha'];
		$a['descripcion'] = $_POST['descripcion'];
		$a['cantidad'] = $_POST['cantidad'];
		$a['categoria'] = $_POST['categoria'];
		$a['usuario_id_ingreso'] = ($this->session->IDUSUARIO);

		$data = $this->Listado_model->registrarIngreso($a['fecha'],$a['descripcion'],$a['cantidad'],$a['categoria'],$a['usuario_id_ingreso']);
		if($data > 0){
		  echo json_encode($data, JSON_UNESCAPED_UNICODE);
		}
	}

	//litar los ingresos registrado
	function listar_ingreso(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$ingresos = $this->Listado_model->listarIngresoRegistrado();
		echo json_encode($ingresos, JSON_UNESCAPED_UNICODE);
	}

	function buscarRegistro(){
		$this->restringirAcceso();
		if(!empty($_POST['id_ingreso'])){
	        $data['id_ingreso'] = $_POST['id_ingreso'];
	        $arr = $this->Listado_model->buscarGastoRegistrado($data['id_ingreso']);

	            $result = $arr;
	            $data = '';
	            if($result > 0){
	              $data = $arr;
	            }else{
	              $data = 0;
	            }
	        echo json_encode($data, JSON_UNESCAPED_UNICODE);
	      }
	      exit;
    }

    function buscarRegistroE(){
	    $this->restringirAcceso();
		if(!empty($_POST['id_ingreso'])){
	        $data['id_ingreso'] = $_POST['id_ingreso'];
	        $arr = $this->Listado_model->buscarGastoRegistrado($data['id_ingreso']);

	            $result = $arr;
	            $data = '';
	            if($result > 0){
	              $data = $arr;
	            }else{
	              $data = 0;
	            }
	        echo json_encode($data, JSON_UNESCAPED_UNICODE);
	      }
	      exit;
    }

	function updateRegistroIngreso(){
	  	$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		
	  	if($_POST['action'] == 'actualizar'){
	  		if(!empty($_POST["categoria"])){
	  			$data['id'] = $_POST['id'];
	  			$data['fechan'] = $_POST['fechan'];
				$data['descripcion'] = $_POST['descripcion'];
			    $data['cantidad'] = $_POST['cantidad'];
			    $data['categoria'] = $_POST['categoria'];
			    $data['usuario_id_ingreso'] = ($this->session->IDUSUARIO);

			    $arr = $this->Listado_model->actualizarRegistroIngreso($data['id'], $data['fechan'], $data['descripcion'], $data['cantidad'], $data['categoria'], $data['usuario_id_ingreso']);
				} else {
					echo 'error';
				}
			}
	 }

  //eliminar registro de gasto
  	function ElimRegistro(){
	  	$this->restringirAcceso();
			$data['base_url'] = $this->config->item('base_url');
	  	if($_POST['action'] == 'eliminarRegi'){
		 		if(!empty($_POST['id_r'])){
		        $data['id_ingreso'] = $_POST['id_r'];
		        $arr = $this->Listado_model->eliminarRegistrado($data['id_ingreso']);
		   		}
		   	}
	}

	//seccion de egreso de gastos efectuado por la entidad
	function responsableServicio(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		
		$data['categoria'] =  $this->Listado_model->seleccionarResponsableServicio();
		echo '<option selected disabled value="">Seleccionar Categoría</option>';
			foreach ($data['categoria'] as $key) {
			echo '<option value="'.$key['id_perdida'].'">'.$key['detalle_perdida'].'</option>'."\n";
		}
	}

	function registrarEgreso(){
	 	$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$a['fecha'] = $_POST['fecha'];
		$a['descripcion'] = $_POST['descripcion'];
		$a['cantidad'] = $_POST['cantidad'];
		$a['categoria'] = $_POST['categoria'];
		$a['registro'] = ($this->session->IDUSUARIO);

		$data = $this->Listado_model->registrarEgresoGasto($a['fecha'], $a['descripcion'], $a['cantidad'], $a['categoria'],$a['registro']);

		if($data > 0){
		  echo json_encode($data, JSON_UNESCAPED_UNICODE);
		}
	}

	function listar_egreso(){
	 	$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data = $this->Listado_model->listarEgreso();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	function buscarRegistroEgreso(){
		$this->restringirAcceso();
		if(!empty($_POST['id_egreso'])){
	        $data['id_egreso'] = $_POST['id_egreso'];
	        $arr = $this->Listado_model->buscarGastoRegistradoEgre($data['id_egreso']);

	            $result = $arr;
	            $data = '';
	            if($result > 0){
	              $data = $arr;
	            }else{
	              $data = 0;
	            }
	        echo json_encode($data, JSON_UNESCAPED_UNICODE);
	      }
	      exit;
    }

    function updateRegistroEgreso(){
    	$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

	  	if($_POST['action'] == 'actualizarData'){
	  		if(!empty($_POST['opcion']) & $_POST['descripcionE'] != '' & $_POST['cantidadE'] != ''){
	  		
	  			$data['id'] = $_POST['idE'];
	  			$data['fecha'] = $_POST['fechan'];
				$data['descripcion'] = $_POST['descripcionE'];
			    $data['cantidad'] = $_POST['cantidadE'];
			    $data['categoria'] = $_POST['opcion'];
			    $data['usuario_id_actualiza'] = ($this->session->IDUSUARIO);

			    $arr = $this->Listado_model->actualizarRegistroEgreso($data['id'], $data['fecha'], $data['descripcion'], $data['cantidad'], $data['categoria'], $data['usuario_id_actualiza']);
			    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
			   
			} else {
				echo "error";
			}
		}
    }

    function ElimRegistroEgreso(){
	  	$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
	  	if($_POST['action'] == 'eliminarRegi'){
		 		if(!empty($_POST['id_r'])){
		        $data['id_egreso'] = $_POST['id_r'];
		        $arr = $this->Listado_model->eliminarRegistradoEgresoGasto($data['id_egreso']);
		        echo json_encode($arr, JSON_UNESCAPED_UNICODE);
		   		}
		   	}
	}

	function generalgeneral(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if ($this->session->ROL == 'Directora') {

			$año = date("Y");
	  		$inicio = '2018-01-05 00:00:00';
	  		$fin = $año.'-12-30 23:59:59';

			$data['arr'] = $this->Listado_model->inscripcionCargadoresTurno($inicio, $fin);
			$this->load->view('general', $data);
		} else {
			redirect("/inicio");
		}
	}
}
