<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listado_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function traerOfrendasCargadores($inicio, $fin){
		$sql = "SELECT f.descripcion, f.ofrenda as valor, count(f.id_inscripcion) as cantidad, FORMAT(sum(f.ofrenda),2) as ofrenda, sum(f.ofrenda) as ofren
				FROM 	cargador a
				JOIN    persona b on a.id_cargador = b.car_id_cargador
				JOIN    inscripcion f on f.car_id_cargador = a.id_cargador
				WHERE 	a.estado = 'A' AND b.car_id_cargador != '1' AND f.fecha_registro BETWEEN '$inicio' AND '$fin'
				GROUP BY valor
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function traerOfrendasColaboradores($inicio, $fin){
		$sql = "SELECT a.descripcion, a.ofrenda as valor, count(a.id_colaborador) as cantidad, FORMAT(sum(a.ofrenda),2) as ofrenda, sum(a.ofrenda) as ofren
				FROM 	colaborador a
				JOIN    persona b on a.id_colaborador = b.col_id_colaborador
				WHERE 	a.estado = 'A' AND b.col_id_colaborador != '1' AND a.tipo = 'Colaboradora' AND a.fecha_registro BETWEEN '$inicio' AND '$fin'
				GROUP BY valor
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function traerOfrendasCeladores($inicio, $fin){
		$sql = "SELECT a.descripcion, a.ofrenda as valor, count(a.id_colaborador) as cantidad, FORMAT(sum(a.ofrenda),2) as ofrenda, sum(a.ofrenda) as ofren
				FROM 	colaborador a
				JOIN    persona b on a.id_colaborador = b.col_id_colaborador
				WHERE 	a.estado = 'A' AND b.col_id_colaborador != '1' AND a.tipo = 'Celadora' AND a.fecha_registro BETWEEN '$inicio' AND '$fin'
				GROUP BY valor
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function traerOfrendasCoordinadores($inicio, $fin){
		$sql = "SELECT a.descripcion, a.ofrenda as valor, count(a.id_colaborador) as cantidad, FORMAT(sum(a.ofrenda),2) as ofrenda, sum(a.ofrenda) as ofren
				FROM 	colaborador a
				JOIN    persona b on a.id_colaborador = b.col_id_colaborador
				WHERE 	a.estado = 'A' AND b.col_id_colaborador != '1' AND a.tipo = 'Coordinadora' AND a.fecha_registro BETWEEN '$inicio' AND '$fin'
				GROUP BY valor
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	///ofrenda estandartes
	function traerOfrendasEstandartes($inicio, $fin){
		$sql = "SELECT f.descripcion, f.ofrenda as valor, count(a.id_incensario) as cantidad, FORMAT(sum(f.ofrenda),2) as ofrenda, sum(f.ofrenda) as ofren
				FROM 	incensario a
				JOIN    persona b on a.id_incensario = b.incen_id_incen
				JOIN    inscripcion f on f.incen_id_incen = a.id_incensario
				WHERE 	a.estado = 'A' AND (f.vestimenta = '4' or f.vestimenta = '5') AND f.fecha_registro BETWEEN '$inicio' AND '$fin'
				GROUP BY valor
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	///ofrenda incensario
	function traerOfrendasIncensario($inicio, $fin){
		$sql = "SELECT f.descripcion, f.ofrenda as valor, count(a.id_incensario) as cantidad, FORMAT(sum(f.ofrenda),2) as ofrenda, sum(f.ofrenda) as ofren
				FROM 	incensario a
				JOIN    persona b on a.id_incensario = b.incen_id_incen
				JOIN    inscripcion f on f.incen_id_incen = a.id_incensario
				WHERE 	a.estado = 'A' AND (f.vestimenta = '2' or f.vestimenta = '3') AND f.fecha_registro BETWEEN '$inicio' AND '$fin'
				GROUP BY valor
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function traerOfrendasIngresoGeneral($inicio, $fin){
		$sql = "SELECT descripcion, cantidad as valor, count(id_ingreso) as cantidad, FORMAT(sum(cantidad),2) as ofrenda, FORMAT(sum(cantidad),2) as ofren
            FROM 	conta_ingreso   
            WHERE   estado = 'A' AND fecha BETWEEN '$inicio' AND '$fin'
            GROUP BY descripcion  ";

        $dbres = $this->db->query($sql);
        $rows = $dbres->result_array();
        return $rows;
	}

	function traerOfrendasEgresoGeneral($inicio, $fin){
		$sql = "SELECT descripcion, cantidad as valor, count(id_egreso) as cantidad, FORMAT(sum(cantidad),2) as ofrenda, FORMAT(sum(cantidad),2) as ofren
            FROM 	egreso a
            JOIN   	perdida b on a.id_perdida_categoria = b.id_perdida
            WHERE   a.estado = 'A' AND a.fecha BETWEEN '$inicio' AND '$fin'
            GROUP BY descripcion  ";

        $dbres = $this->db->query($sql);
        $rows = $dbres->result_array();
        return $rows;
	}

	//para realizar las finanzas
	function traerOfrendasCargadores1($inicio, $fin){
		$sql = "SELECT  count(f.id_inscripcion) as cantidad, sum(f.ofrenda) as ofren
				FROM 	cargador a
				JOIN    persona b on a.id_cargador = b.car_id_cargador
				JOIN    inscripcion f on f.car_id_cargador = a.id_cargador
				WHERE 	a.estado = 'A' AND b.car_id_cargador != '1' AND f.fecha_registro BETWEEN '$inicio' AND '$fin'
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function traerOfrendasColaboradores1($inicio, $fin){
		$sql = "SELECT  count(a.id_colaborador) as cantidad, sum(a.ofrenda) as ofren
				FROM 	colaborador a
				JOIN    persona b on a.id_colaborador = b.col_id_colaborador
				WHERE 	a.estado = 'A' AND b.col_id_colaborador != '1' AND a.tipo = 'Colaboradora' AND a.fecha_registro BETWEEN '$inicio' AND '$fin'
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function traerOfrendasCeladores1($inicio, $fin){
		$sql = "SELECT  count(a.id_colaborador) as cantidad, sum(a.ofrenda) as ofren
				FROM 	colaborador a
				JOIN    persona b on a.id_colaborador = b.col_id_colaborador
				WHERE 	a.estado = 'A' AND b.col_id_colaborador != '1' AND a.tipo = 'Celadora' AND a.fecha_registro BETWEEN '$inicio' AND '$fin'
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function traerOfrendasCoordinadores1($inicio, $fin){
		$sql = "SELECT  count(a.id_colaborador) as cantidad, sum(a.ofrenda) as ofren
				FROM 	colaborador a
				JOIN    persona b on a.id_colaborador = b.col_id_colaborador
				WHERE 	a.estado = 'A' AND b.col_id_colaborador != '1' AND a.tipo = 'Coordinadora' AND a.fecha_registro BETWEEN '$inicio' AND '$fin'
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	///ofrenda estandartes
	function traerOfrendasEstandartes1($inicio, $fin){
		$sql = "SELECT  count(a.id_incensario) as cantidad, sum(f.ofrenda) as ofren
				FROM 	incensario a
				JOIN    persona b on a.id_incensario = b.incen_id_incen
				JOIN    inscripcion f on f.incen_id_incen = a.id_incensario
				WHERE 	a.estado = 'A' AND (f.vestimenta = '4' or f.vestimenta = '5') AND f.fecha_registro BETWEEN '$inicio' AND '$fin'
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	///ofrenda incensario
	function traerOfrendasIncensario1($inicio, $fin){
		$sql = "SELECT  count(a.id_incensario) as cantidad, sum(f.ofrenda) as ofren
				FROM 	incensario a
				JOIN    persona b on a.id_incensario = b.incen_id_incen
				JOIN    inscripcion f on f.incen_id_incen = a.id_incensario
				WHERE 	a.estado = 'A' AND (f.vestimenta = '2' or f.vestimenta = '3') AND f.fecha_registro BETWEEN '$inicio' AND '$fin'
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	///seccion de ingresos y egresos
	function registrarIngreso($fecha, $descripcion, $cantidad, $categoria, $usuario_id_ingreso){
		$sql = "INSERT INTO conta_ingreso(fecha, descripcion, cantidad, categoria, usuario_id_ingreso, estado)
                VALUES (?, ?, ?, ?, ?, ?)";
                
        $estado = "A";
        $valores = array($fecha, $descripcion, $cantidad, $categoria, $usuario_id_ingreso, $estado);
        $dbres = $this->db->query($sql, $valores);
        return $dbres;
    }

	function listarIngresoRegistrado(){
		$sql = "SELECT 	id_ingreso, DATE_FORMAT(fecha, '%d-%m-%Y') as fecha, descripcion, FORMAT(cantidad,2) as cantidad, categoria
				FROM	conta_ingreso
				WHERE estado = 'A'
				ORDER BY id_ingreso DESC
				LIMIT 200
				";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;	
	}

	function buscarGastoRegistrado($id_ingreso){
		$sql = "SELECT id_ingreso, fecha, descripcion, cantidad, categoria
				FROM	conta_ingreso
                WHERE   id_ingreso = ?
                ";

        $dbres = $this->db->query($sql, array($id_ingreso));
        $rows = $dbres->result_array();
        return $rows;
	}

	function actualizarRegistroIngreso($id, $fechan, $descripcion, $cantidad, $categoria, $usuario_id_ingreso) {
		$sql = "UPDATE conta_ingreso
				SET Fechan = '$fechan', Descripcion = '$descripcion', Cantidad = '$cantidad', Categoria = '$categoria', Usuario_id_actualiza = '$usuario_id_ingreso'
				WHERE id_ingreso = '$id' "; 

		$dbres = $this->db->query($sql);
		return $dbres;
	}

	function eliminarRegistrado($id_ingreso){
		is_numeric($id_ingreso) or exit("Número esperado!");

		$sql = "UPDATE 	conta_ingreso
				SET 	estado = ?
				WHERE 	id_ingreso = ?
				LIMIT 	1;";

		$valores = array('B', $id_ingreso);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function seleccionarResponsableServicio(){
		$sql = "SELECT 	id_perdida, detalle_perdida
				FROM 	perdida
				ORDER BY id_perdida ASC
				LIMIT 	100;";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function registrarEgresoGasto($fecha, $descripcion, $cantidad, $categoria, $registro){
	$sql = "INSERT INTO egreso(fecha, descripcion, cantidad, id_perdida_categoria, id_usuario_registro, estado)
                VALUES (?, ?, ?, ?, ?, ?)";
       
        $estado = "A";
        $valores = array($fecha, $descripcion, $cantidad, $categoria, $registro, $estado);
        $dbres = $this->db->query($sql, $valores);
        return $dbres;
	}

	function listarEgreso(){
		$sql = "SELECT 	a.id_egreso as id_egreso, DATE_FORMAT(a.fecha, '%d-%m-%Y') as fecha, a.descripcion as descripcion, FORMAT(a.cantidad,2) as cantidad, b.detalle_perdida as categoria
				FROM	egreso a
				JOIN	perdida b on a.id_perdida_categoria = b.id_perdida
				WHERE a.estado = 'A'
				ORDER BY a.id_egreso DESC
				LIMIT 	200
				 ";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;	
	}

	function actualizarRegistroEgreso($id, $fecha, $descripcion, $cantidad, $categoria, $usuario_id_actualiza) {
		$sql = "UPDATE 	egreso
				SET 	fecha_actuali = '$fecha', descripcion = '$descripcion', cantidad = '$cantidad', id_perdida_categoria = '$categoria', id_usuario_actuali = '$usuario_id_actualiza'
				WHERE 	id_egreso = '$id' "; 

		$dbres = $this->db->query($sql);
		return $dbres;
	}

	function eliminarRegistradoEgresoGasto($id_egreso){
		is_numeric($id_egreso) or exit("Número esperado!");

		$sql = "UPDATE 	egreso
				SET 	estado = ?
				WHERE 	id_egreso = ?
				LIMIT 	1;";

		$valores = array('B', $id_egreso);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function buscarGastoRegistradoEgre($id_egreso){
		$sql = "SELECT 	a.id_egreso, DATE_FORMAT(a.fecha, '%Y-%m-%d') as fecha, a.descripcion as descripcion, a.cantidad, b.detalle_perdida as categoria
				FROM	egreso a
				JOIN	perdida b on a.id_perdida_categoria = b.id_perdida
                WHERE   id_egreso = ?
                ";

        $dbres = $this->db->query($sql, array($id_egreso));
        $rows = $dbres->result_array();
        return $rows;
	}

	function traerOfrendasIngresoGeneral1($inicio, $fin){
		$sql = "SELECT count(id_ingreso) as cantidad, sum(cantidad) as ofren
            FROM 	conta_ingreso   
            WHERE   estado = 'A' AND fecha BETWEEN '$inicio' AND '$fin'
           	 ";

        $dbres = $this->db->query($sql);
        $rows = $dbres->result_array();
        return $rows;
	}

	function traerOfrendasEgresoGeneral1($inicio, $fin){
		$sql = "SELECT count(id_egreso) as cantidad, sum(cantidad) as ofren
            FROM 	egreso a
            JOIN   	perdida b on a.id_perdida_categoria = b.id_perdida
            WHERE   a.estado = 'A' AND a.fecha BETWEEN '$inicio' AND '$fin'
            ";

        $dbres = $this->db->query($sql);
        $rows = $dbres->result_array();
        return $rows;
	}
//listados generales
	//traer datos de cargadores para la inscripcion
	function inscripcionCargadoresTurno($inicio, $fin){
		$sql = 	"
			SELECT  CONCAT(b.apellido,' ',b.nombre) as nombre, a.cui, n.fecha, n.edad, a.altura, b.direccion, t.numero1, t.numero2, m.nombre_mun as muni, r.nombre_depto as depto, f.anios as años, a.carga, a.vacuna
			FROM 	cargador a
			JOIN    persona b on a.id_cargador = b.car_id_cargador
			JOIN    inscripcion f on f.car_id_cargador = a.id_cargador
			JOIN    telefono t on t.car_id_cargador = a.id_cargador
			JOIN    nacimiento n on n.car_id_cargador = a.id_cargador
			JOIN    municipio m on m.id_municipio = a.muni_id_muni
			JOIN    departamento r on m.depto_id_depto = r.id_departamento
			WHERE 	a.estado = 'A' and b.car_id_cargador != '1' AND f.fecha_registro BETWEEN '$inicio' AND '$fin'
			ORDER BY nombre ASC
			LIMIT 	2500";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}



}
