<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Examen_model extends CI_Model {
	private $table = 'kropsys_service.examenes';
	public function __construct(){
		parent::__construct();

	}

	public function getAllExamenes(){
		$this->db->select('*');
    		$this->db->from($this->table);
    		$result = $this->db->get();
    		if($result->num_rows()>0){
    			return $result->result();
    		}
    		return false;
	}

	public function getAllPrevisiones(){
		$this->db->select('*');
    		$this->db->from('kropsys_service.previsiones');
    		$result = $this->db->get();
    		if($result->num_rows()>0){
    			return $result->result();
    		}
    		return false;
	}

	public function getPrevIn($in){
		$this->db->select('*');
    		$this->db->from('kropsys_service.previsiones');
    		$result = $this->db->where_in('id', $in);
    		$result = $this->db->get();
    		if($result->num_rows()>0){
    			return $result->result();
    		}
    		return false;
	}

	public function findConvenio($id=NULL){
				if(is_null($id)){
			$id = '0';
		}
           
		$sql = "SELECT p.*, c.* FROM kropsys_service.previsiones p join kropsys_service.convenios c on c.id_prevision = p.id and c.id_convenio = ".$id;
		 $query = $this->db->query($sql);
           if($query->num_rows() > 0){
                return $query->result() ;
              }
          return false; 
	}



	public function crearConvenio($data,$nombre){
		 $this->db->select_max('id_convenio');
		  $result = $this->db->get('kropsys_service.convenios');
		  $max = $result->row();
		  $max = $max->id_convenio + 1;
		 
		  foreach ($data as $row) {
		            $this->db->insert('kropsys_service.convenios', array('id_prevision' => $row['id'], 'digital' => $row['digital'], 'rut_bono' => $row['rut'], 'observaciones' => $row['observaciones'], 'id_convenio' => $max, 'convenio' => $nombre));
        if ( $this->db->affected_rows() == '1' ) {
                    // return TRUE;
                  }
		  }
	}
}
