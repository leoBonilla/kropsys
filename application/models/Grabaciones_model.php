<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Grabaciones_model extends CI_Model {

		 public function __construct()
        {
                parent::__construct();

        }

        public function find($id){
        	    $cdr = $this->load->database('cdr', TRUE);

        		$cdr->select('*');
        		$cdr->from('cdr');
        		$cdr->where("uniqueid",$id);
    			$query = $cdr->get();
    			return $query->result();
        }

}
