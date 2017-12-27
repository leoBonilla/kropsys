<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Agendamientos_model extends CI_Model {

	private $validUser; 


	 public function __construct()
        {
                parent::__construct();

        }

  	   public function saveAgendamientos($data){
            
            $this->db->insert('agendamientos', $data);
            if ( $this->db->affected_rows() == '1' ) {
                return TRUE;
              }
              else {
                return FALSE;
            }
  		}


      public function saveReasignaciones($data){
            
            $this->db->insert('reasignaciones', $data);
            if ( $this->db->affected_rows() == '1' ) {
                return TRUE;
              }
              else {
                return FALSE;
            }
      }


      public function saveConfirmaciones($data){
            
            $this->db->insert('confirmaciones', $data);
            if ( $this->db->affected_rows() == '1' ) {
                return TRUE;
              }
              else {
                return FALSE;
            }
      }



      public function saveOtros($data){
            
            $this->db->insert('otros', $data);
            if ( $this->db->affected_rows() == '1' ) {
                return TRUE;
              }
              else {
                return FALSE;
            }
      }
    
    
    
		
		  



 

}
