<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Locations_model extends CI_Model {

	 private $validUser; 
   private $table = 'locations';

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
              $this->db->select('id, location, address');
              $this->db->from($this->table);
              $this->db->where('id',$id);
              
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->row() ;
              }
              return false;
      }
  

}
