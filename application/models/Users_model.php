<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users_model extends CI_Model {

	 private $validUser; 
   private $table = 'users';

	 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->validUser = array('auth_level <=' => 9 );
        }

  		public function getAll(){
            
           return $this->db->get($this->table); 
  		}

        public function update($id, $data){
        	$this->db->where('user_id', $id);
        	$this->db->update($this->table , $data);
        	if($this->db->affected_rows() > 0){
        		return TRUE;
        	}
        	return FALSE;
        }
   

 

}
