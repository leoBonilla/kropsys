<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tareas_model extends CI_Model {

	 private $validUser; 
   private $table = 'sms_history_log';

	 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->validUser = array('auth_level <=' => 9 );
        }

  		public function getAll(){
            
           return $this->db->get($this->table); 
  		}

   public function createLog($data){
    $this->db->insert($this->table, $data);
    if ( $this->db->affected_rows() == '1' ) {
                 return TRUE;
              }
            return FALSE;
   }
   

 

}
