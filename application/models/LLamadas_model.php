<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LLamadas_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function guardarLLamada($uniqueId,$userId,$numero,$anexo,$id_esp,$id_prof, $id_prest, $pac, $doc_asoc = false){
		$data = array('user_id' => $userId, 'numero' => $numero,'anexo' => $anexo,'unique_id' => $uniqueId, 'fecha' => date('Y-m-d H:i:s'),'id_especialidad' => $id_esp, 'id_profesional' => $id_prof, 'id_prestacion' => $id_prest,'paciente' => $pac);
		if($doc_asoc != false){
			$data['doc_asoc'] = 1;
			$data['id_doc_asoc'] = $doc_asoc;
		}
            $this->db->insert('historial_llamada', $data);
            if ( $this->db->affected_rows() == '1' ) {
                 return TRUE;
              }
            return FALSE;
	}
}
