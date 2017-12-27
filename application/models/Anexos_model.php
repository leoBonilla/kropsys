<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Anexos_model extends CI_Model {

	 private $validUser; 
   private $table = 'extension_phones';

	 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->validUser = array('auth_level <=' => 9 );
        }

    public function getAll(){
       return $this->db->get($this->table)->result(); 
    }

    public function find($id){
              $this->db->select('*');
              $this->db->from($this->table);
              $this->db->where('id',$id);
              
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->row() ;
              }
              return false;
      }
  

}
