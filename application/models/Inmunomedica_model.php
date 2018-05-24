<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inmunomedica_model extends CI_Model {
	private $table = 'inmunomedica_confirmaciones_view';
	public function __construct(){
		parent::__construct();

	}

    public function exists($folio){
    		$this->db->select('*');
    		$this->db->from($this->table);
    		$this->db->where('folio',$folio);
    		$result = $this->db->get();
    		if($result->num_rows()>0){
    			return true;
    		}
    		return false;
    }

    public function confirmar($data){
    	$this->db->insert('inmunomedica_confirmaciones', $data);
    	return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function listarConfirmados($fecha){
    	$result = $this->db->get_where($this->table,array('fecha' => $fecha));
    	if($result->num_rows() > 0){
    		return $result->result();
    	}
    	return false;
    }

    public function isBlocked($folio){
    			$this->db->select('*');
    		$this->db->from('inmunomedica_bloqueos_llamadas');
    		$this->db->where('folio',$folio);
    		$result = $this->db->get();
    		if($result->num_rows()>0){
    			return true;
    		}
    		return false;			
    }


    public function guardarLLamada($data){
    	$this->db->insert('inmunomedica_historial_llamada', $data);
            if ( $this->db->affected_rows() == '1' ) {
                 return TRUE;
              }
            return FALSE;
    }




}
