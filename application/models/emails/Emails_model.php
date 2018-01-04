<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Emails_model extends CI_Model {

	public function discard($id,$data){
		$this->db->trans_begin();
		$flag = false;


		$this->db->select('*');
		$this->db->from('emails');
		$this->db->where('id_email', $id);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$row = $query->row();
			$toIsert = array(
				'id_email' => $id,
				'fecha' => $row->fecha, 
				'id_user' => $row->id_user,
				'estado' => $row->estado,
				'asunto' => $row->asunto,
				'enviado_por' => $row->enviado_por,
				'fecha_envio' => $row->fecha_envio,
				'mensaje' => $row->mensaje,
				'numero_email' => $row->numero_email,
				'fecha_cambio_estado' => $row->fecha_cambio_estado,
				'descartado_por' => $data['descartado_por'],
				'fecha_descarte' => $data['fecha_descarte'],
				'motivo' => $data['motivo']
			);

			$this->db->insert('emails_dismiss',$toIsert);
			//se realizo la insercion
			//actulizar el estado del email a descartado
			if($this->db->affected_rows() == 1){
				$this->db->where('id_email', $id);
		    	$this->db->update('emails', array('descartado' => 1));
		 	   	if($this->db->affected_rows() > 0){
          			$flag = TRUE;
        			}else{
        				$flag = FALSE;
        			}
        			
			}

			
		}
	
		if ($this->db->trans_status() === FALSE || $flag == FALSE){
       		 $this->db->trans_rollback();
       		 var_dump($this->db->trans_status());
       		 return false;
       		}else
       		{
           $this->db->trans_commit();
           return true;
		}
		
	}

	public function getDescartdos(){
		$this->db->select('*');
		$this->db->from('emails_dismiss');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		return false;
	}
}