<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Registros_model extends CI_Model {
  private $limit ;
   public function __construct()
        {
                parent::__construct();
                $this->limit = 5000000;

        }

      public function getAgendamientosByUser($id){
            $this->db->select('*');
              $this->db->from('agendamientos_view');
              $this->db->where('id_usuario',$id);
              $this->db->limit($this->limit);
              $query = $this->db->get();

              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }

      public function getAllAgendamientos(){
            $this->db->select('*');
              $this->db->from('agendamientos_view');
              $this->db->order_by('fecha', 'desc');
              $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }

      public function getConfirmacionesByUser($id){
            $this->db->select('*');
              $this->db->from('confirmaciones_view');
              $this->db->where('id_usuario',$id);
              $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }

      public function getAllConfirmaciones(){
            $this->db->select('*');
              $this->db->from('confirmaciones_view');
              $this->db->order_by('fecha', 'desc');
              $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }

      public function getReasignacionesByUser($id){
            $this->db->select('*');
              $this->db->from('reasignaciones_view');
              $this->db->limit($this->limit);
              $this->db->where('id_usuario',$id);
              
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }
      public function getAllReasignaciones(){
            $this->db->select('*');
              $this->db->from('reasignaciones_view');
              $this->db->order_by('fecha', 'desc');
              $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }

      public function getOtrosByUser($id){
            $this->db->select('*');
              $this->db->from('otros_view');
              $this->db->where('id_usuario',$id);
              $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }

     public function getAllOtros(){
            $this->db->select('*');
              $this->db->from('otros_view');
              $this->db->order_by('fecha', 'desc');
              $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }


      public function getSmsByUser($id){
        $this->db->select('*');
              $this->db->from('sms_view');
              $this->db->where('sender_id',$id);
              $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }

    public function getAllSms(){
        $this->db->select('*');
              $this->db->from('sms_view');  
              $this->db->limit($this->limit);            
              $query = $this->db->get();

              if($query->num_rows() > 0){
                return $query->result() ;
              }
      }


    public function findSubtask($id){
        $this->db->select('*');
              $this->db->from('llamadas_view');
              $this->db->where('id_registro',$id);
              $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->row() ;
              }
      }



      public function findAgendamiento($id){
            $this->db->select('*');
              $this->db->from('agendamientos_view');
              $this->db->where('id',$id);
              $this->db->limit($this->limit);
              $query = $this->db->get();

              if($query->num_rows() > 0){
                return $query->row() ;
              }
                 return false;
      }
   

      public function profesionalesByEspecialidad($id){
            $this->db->select('*');
            $this->db->from('profesionales');
            $this->db->where('id_especialidad',$id);
            $this->db->limit($this->limit);
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->result() ;
              }
                 return false;
      }


      public function updateAgendamiento($id,$data){
            $this->db->where('id',$id);
            $this->db->update('agendamientos',$data);
            return (bool)($this->db->affected_rows() > 0);
      }


      public function findRegistro($tipo, $id){
        if($tipo == 'agendamientos' ){
          return $this->findAgendamiento($id);
        }
      }


      public function update($type, $id, $data){
        $this->db->where('id',$id);
            $this->db->update($type,$data);
            return (bool) ($this->db->affected_rows() > 0);
      }


}