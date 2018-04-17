<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profesionales_model extends CI_Model {

	 private $validUser; 
   private $table = 'profesionales';

	 public function __construct()
        {
                parent::__construct();

        }

  		public function getAll(){
            
           return $this->db->get($this->table); 
  		}

        public function update($id, $data){
        	$this->db->where('id', $id);
        	$this->db->update($this->table , $data);
        	if($this->db->affected_rows() > 0){
        		return TRUE;
        	}
        	return FALSE;
        }

      public function create($data){
           $this->db->insert($this->table, $data);
        if ( $this->db->affected_rows() == '1' ) {
                     return TRUE;
                  }
                return FALSE;
      }
   

 

}
