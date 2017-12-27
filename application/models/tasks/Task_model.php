<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Task_model extends CI_Model {

   private $table = 'tareas';

	 public function __construct()
        {
                parent::__construct();

        }

  public function getAll(){
            
           $query = $this->db->get('tareas_view'); 
           if($query->num_rows() > 0){
                return $query->result();
              }
           return false;
  }

   public function newTask($data,$excel_data){
   // var_dump($excel_data);
   // 
  
    $this->db->trans_begin();
      $data['fecha'] = $this->dateFormat($data['fecha'],true);
      $this->db->insert($this->table, $data);
      $insert_id = $this->db->insert_id();
        //insertar los registros y asociarlos a la tarea
      $cuenta_registros = 0;
      foreach ($excel_data['values'] as $row) {
          $d_data = array(
              'problema_salud' => (isset($row['A'])? $row['A'] : null ),
               'rut' => (isset($row['B']) ? $row['B'] : null),
                'dv' => (isset($row['C']) ? $row['C'] : null),
                  'nombre' => (isset($row['D']) ? $row['D'] : null),
                    'fecha_inicio' => (isset($row['E']) ? $this->dateFormat($row['E']) : null),
                      'fecha_limite' => (isset($row['F']) ? $this->dateFormat($row['F']) : null),
                        'especialidad_agenda' => (isset($row['G']) ? $row['G'] : null),
                            'indicacion_agenda_ges' => (isset($row['H']) ? $row['H'] : null),
                              'llamado_1' => (isset($row['I']) ? $row['I'] : null),
                                'llamado_2' => (isset($row['J']) ? $row['J'] : null),
                                  'llamado_3' => (isset($row['K']) ? $row['K'] : null),
                                    'estado_cita' => (isset($row['L']) ? $row['L'] : null),
                                      'fecha_cita' => (isset($row['M']) ? $row['M'] : null),
                                        'observaciones' => (isset($row['N']) ? $row['N'] : null),
                                          'llamado' => (isset($row['O'])? $row['O'] : null ),
                                           'id_tarea' => $insert_id


            );
        if($this->db->insert('detalle_tarea', $d_data)){
          $cuenta_registros++;
        }
      }

    if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return $cuenta_registros;
    }
}


private function dateFormat($date,$datepicker = false)
  {
    if(is_null($date) || $date ==''){
        return null;
    }
    $date = trim($date);
    $parts = explode('/', $date);
    if($datepicker == true){
      return "$parts[2]-$parts[1]-$parts[0]";
    }
      if(count($parts)>1){
         return "$parts[2]-$parts[0]-$parts[1]";
      }

      return null;
  

  }


  public function getSubtaskByUser($id){
          $this->db->select('*');
          $this->db->from('subtareas_view');
          $this->db->where('id_responsable',$id);
          $query = $this->db->get(); 
           if($query->num_rows() > 0){
                return $query->result();
              }
           return false;

  }

  public function asignarUsuarios($user_id, $tasks){
    foreach ($tasks as $row) {
         $data = array(
               'id_responsable' => $user_id,
            );
         $this->db->where('id', $row);
        $this->db->update('detalle_tarea',$data);
    }
  }


  public function findTask($id){
     $this->db->select('*');
          $this->db->from('subtareas_view');
          $this->db->where('id',$id);
          $query = $this->db->get(); 
           if($query->num_rows() > 0){
                return $query->row();
              }
           return false;
  }


  public function registerCall($data){
    $this->db->insert('history_call', $data);
       return ($this->db->affected_rows() != 1) ? false : true;
  }


  public function getHistory($id){
         $this->db->select('h.*, e.estado');
          $this->db->from('history_call h');
          $this->db->join('estados_llamada e', 'h.id_estado = e.id', 'left');
          $this->db->where('id_subtask',$id);
          $query = $this->db->get(); 
           if($query->num_rows() > 0){
                return $query->result();
              }
           return false;
  }

  public function closeSubtask($id,$data){
        $data['fecha_cita'] = $this->dateFormat($data['fecha_cita'], true);
        $this->db->where('id', $id);
        $this->db->update('detalle_tarea',$data);
        if ($this->db->affected_rows() == '1') {
         return TRUE;
          }
            return FALSE;
  }


  public function updateCall($id,$data){
        $this->db->where('id',$id);
        $this->db->update('history_call',$data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
          }
    return FALSE;
}


 

}
