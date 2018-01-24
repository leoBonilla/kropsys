<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reportes_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}


	public function fetchSumPacientesAgendados($tabla,$inicio, $fin){
		$sql = "select COALESCE(sum(t.total),0) as total from (
		
					select pacientes_agendados as total from ".$tabla." where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."' 
		
					) t";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function fetchSumNoContestan($tabla,$inicio,$fin){
		$sql = "select COALESCE(sum(t.total),0) as total from (
		
					select no_contestaron as total from ".$tabla." where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."' 
		
					) t";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function fetchSumRechazosAnulaciones($tabla,$inicio,$fin){
		$sql = "select COALESCE(sum(t.total),0) as total from (

					select rechazo_anulaciones as total from ".$tabla." where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."' 

					) t";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function fetchSumErroneos($tabla,$inicio,$fin){
		$sql = "select COALESCE(sum(t.total),0) as total from (

					select n_erroneo as total from ".$tabla." where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."'
	
					) t";
		$query = $this->db->query($sql);
		return $query->row();
	}

		public function fetchSumHorasYaAsignadas($tabla,$inicio,$fin){
		// $sql = "select COALESCE(sum(t.total),0) as total from (
		// 			select hora_ya_asignada as total from confirmaciones where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."'  union all 
		// 			select hora_ya_asignada as total from reasignaciones where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."' union all
		// 			select hora_ya_asignada as total from agendamientos where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."' union all
		// 			select hora_ya_asignada as total from otros  where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."'
		// 			) t";
		// 			
		$sql = "select COALESCE(sum(t.total),0) as total from (
					select hora_ya_asignada as total from ".$tabla." where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."'

					) t";
		$query = $this->db->query($sql);
		return $query->row();
	}


		public function fetchSumSinCupo($tabla,$inicio,$fin){
		$sql = "select COALESCE(sum(t.total),0) as total from (

					select sin_cupo as total from ".$tabla." where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."'
	
					) t";
		$query = $this->db->query($sql);
		return $query->row();
	}  

	  public function fetchSumConfirmadas($tabla, $inicio, $fin){
	  	$sql = "select COALESCE(sum(t.total),0) as total from (

					select confirmadas as total from ".$tabla." where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."'
	
					) t";
		$query = $this->db->query($sql);
		return $query->row();
	  }


	 public function fetchSumReasignadas($tabla, $inicio, $fin){
	  	$sql = "select COALESCE(sum(t.total),0) as total from (

					select reasignadas  as total from ".$tabla." where date(fecha) BETWEEN  '".$inicio."' AND '".$fin."'
	
					) t";
		$query = $this->db->query($sql);
		return $query->row();
	  }



	public function fetchByDistribucion($tabla, $inicio, $fin){

		if($tabla != 'agendamientos'){
					$sql = "select COALESCE(sum(r.pacientes),0) as total, p.prestacion, p.id from ".$tabla." r right join prestaciones p on (p.id = r.id_prestacion)  and date(r.fecha) between '".$inicio."' and '".$fin."' 
							group by p.id;";
		}else{
					$sql = "select COALESCE(sum(r.pacientes_agendados),0) as total, p.prestacion, p.id from ".$tabla." r right join prestaciones p on (p.id = r.id_prestacion)  and date(r.fecha) between '".$inicio."' and '".$fin."' 
group by p.id;";
		}

		$query = $this->db->query($sql);
		return $query->result();
	}


	public function fetchAgendamientosDistribucion($inicio, $fin){
		$sql = "select 
				    p.prestacion,
				    COALESCE(sum(hora_ya_asignada), 0) as hora_ya_asignada,
				    COALESCE(sum(n_erroneo), 0) as n_erroneo,
				    COALESCE(sum(rechazo_anulaciones), 0) as rechazo_anulaciones,
				    COALESCE(sum(no_contestaron), 0) as no_contestaron,
				    COALESCE(sum(pacientes_agendados), 0) as pacientes_agendados
				from
				    agendamientos r
				        right join
				    prestaciones p ON (r.id_prestacion = p.id) and
					date(fecha) between '".$inicio."' and '".$fin."'
				group by p.id;";
		$query = $this->db->query($sql);
		return $query->result();
	}


	public function fetchReasignacionesDistribucion($inicio, $fin){
		$sql = "select 
				    p.prestacion,
				    COALESCE(sum(sin_cupo), 0) as sin_cupo,
				    COALESCE(sum(hora_ya_asignada), 0) as hora_ya_asignada,
				    COALESCE(sum(n_erroneo), 0) as n_erroneo,
				    COALESCE(sum(rechazo_anulaciones), 0) as rechazo_anulaciones,
				    COALESCE(sum(no_contestaron), 0) as no_contestaron,
				    COALESCE(sum(pacientes_agendados), 0) as pacientes_agendados,
				    COALESCE(sum(pacientes), 0) as pacientes
				from
				    reasignaciones r
				        right join
				    prestaciones p ON (r.id_prestacion = p.id)
				        and date(fecha) between '".$inicio."' and '".$fin."'
				group by p.id";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function fetchConfirmacionesDistribucion($inicio, $fin){
		$sql = "select 
				    p.prestacion,
				    COALESCE(sum(hora_ya_asignada), 0) as hora_ya_asignada,
				    COALESCE(sum(n_erroneo), 0) as n_erroneo,
				    COALESCE(sum(rechazo_anulaciones), 0) as rechazo_anulaciones,
				    COALESCE(sum(no_contestaron), 0) as no_contestaron,
				    COALESCE(sum(confirmadas), 0) as confirmadas,
				    COALESCE(sum(pacientes), 0) as pacientes
				from
				    confirmaciones r
				        right join
				    prestaciones p ON (r.id_prestacion = p.id)
				and 
				    date(fecha) between '".$inicio."' and '".$fin."'
				group by p.id;";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function fetchOtrosDistribucion($inicio, $fin){
		$sql = "select 
				    p.prestacion,
				    COALESCE(sum(hora_ya_asignada), 0) as hora_ya_asignada,
				    COALESCE(sum(n_erroneo), 0) as n_erroneo,
				    COALESCE(sum(rechazo_anulaciones), 0) as rechazo_anulaciones,
				    COALESCE(sum(no_contestaron), 0) as no_contestaron,
				    COALESCE(sum(confirmadas), 0) as confirmadas,
				    COALESCE(sum(pacientes), 0) as pacientes
				from
				    otros r
				        right join
				    prestaciones p ON (r.id_prestacion = p.id)
				and 
				    date(fecha) between '".$inicio."' and '".$fin."'
				group by p.id;";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function topProfesionales($tabla, $inicio, $fin){
		if($tabla !='agendamientos_view'){
			$sql = "select COALESCE(sum(pacientes),0) as total, profesional from ".$tabla." where date(fecha) between '".$inicio."'  and '".$fin."' group by id_medico order by 1 desc limit 10;";
		}else{
			$sql = "select COALESCE(sum(pacientes_agendados),0) as total, profesional from ".$tabla." where date(fecha) between '".$inicio."'  and '".$fin."' group by id_medico order by 1 desc limit 10;";
		}
		
		$query = $this->db->query($sql);
		return $query->result();
	}


	public function reasignacionPorEspecialidad($inicio,$fin){
		$sql ="select id_especialidad, COALESCE(sum(pacientes_agendados),0) as total , e.especialidad from reasignaciones r join especialidades e on r.id_especialidad = e.id
 where date(fecha) between '".$inicio."'  and '".$fin."' group by 1 order by 2 asc";
 	$query = $this->db->query($sql);
		return $query->result();
	}




	
}
