<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Global_model extends CI_Model {

	private $validUser; 


	 public function __construct()
        {
                parent::__construct();

        }

  	public function getEspecialidades(){
             $this->db->select('*');
            $this->db->from('especialidades');
            $this->db->where('disabled', 0 );
            return $this->db->get()->result();
            
           //return $this->db->get('especialidades',200)->result(); 
  		}
		
		  public function getByEspecialidad($id){
            
          // return $this->db->get_where('profesionales',array('id_especialidad =' => $id))->result(); 
        return $this->db->get_where('profesionales',array('id_especialidad =' => $id, 'disabled' => 0))->result();
      }

      public function getPrestaciones(){
        return $this->db->get('prestaciones')->result(); 
      }


      
      public function findProfesional($id){
             $this->db->select('*');
              $this->db->from('profesionales');
              $this->db->where('id',$id);
              
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->row() ;
              }
    }


     public function getAllUsers(){
            $this->db->select('CONCAT(u.nombre," ",u.apellido) as nombre, u.email, u.user_id, u.username, a.anexo');
            $this->db->join('extension_phones a','u.extension_id = a.id','left');
            $this->db->from('users u');
            $query = $this->db->get();
           if($query->num_rows() > 0){
                return $query->result() ;
              }
          return false; 
      }

      public function findUser($id){
        $this->db->select('*');
              $this->db->from('users');
              $this->db->where('user_id',$id);
              
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->row() ;
              }
      }


      public function findAnexo($id){
        $this->db->select('*');
              $this->db->from('extension_phones');
              $this->db->where('id',$id);
              
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->row() ;
              }
      }

      public function findAnexoByUser($userid){
              $this->db->select('anexo');
              $this->db->from('users_anexos_view');
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->row() ;
              }
      }

      public function getStates(){
              $this->db->select('*');
              $this->db->from('estados_llamada');              
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }
    




 

}
