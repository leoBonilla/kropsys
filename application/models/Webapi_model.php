<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Webapi_model extends CI_Model {


	private $table = 'especialidades';

	 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->table = 'especialidades';
                  $ci = get_instance();
                $ci->load->helper('date');


        }

  		public function getAllEspecialidades(){
           $this->db->from($this->table);
            $this->db->order_by("especialidad", "asc");
           return $this->db->get()->result(); 
  		}

        public function getAllProfesionales(){
            $this->db->select('profesionales.id,profesionales.profesional, profesionales.nombre_agenda,profesionales.regla_prioridad,especialidades.especialidad');
            $this->db->from('profesionales');
            $this->db->join('especialidades', 'profesionales.id_especialidad = especialidades.id', 'left');
            $query = $this->db->get();
           if($query->num_rows() > 0){
                return $query->result() ;
              }
          return false; 
      }

      public function getAllUsers(){
            $this->db->select('CONCAT(u.nombre," ",u.apellido) as nombre, u.email, u.username, a.anexo');
            $this->db->join('extension_phones a','u.extension_id = a.id','left');
            $this->db->from('users u');
            $query = $this->db->get();
           if($query->num_rows() > 0){
                return $query->result() ;
              }
          return false; 
      }
    
    
		
		public function find($id){
			$this->db->select('*');
              $this->db->from($this->table);
              $this->db->where('id',$id);
              
              $query = $this->db->get();
              if($query->num_rows() > 0){
                return $query->row() ;
              }
		}


    public function cuposPorDia($dia){
         $query = $this->db->query("select e.especialidad, c.fecha, IFNULL(sum(c.cupos),0) as cupos from especialidades e left join cupos c on e.id = c.id_especialidad and c.fecha = '".$dia."' group by 1, 2 order by e.especialidad asc");
        if($query->num_rows() > 0){
                return $query->result();
              }
          return false;
    }

   
   public function searchByDate($date){
        //    $query = $this->db->query("select e.especialidad, c.fecha, IFNULL(sum(c.cupos),0) as cupos from especialidades e left join cupos c on e.id = c.id_especialidad and c.fecha = '".$dia."' group by 1, 2 order by e.especialidad asc");
        // if($query->num_rows() > 0){
        //         return $query->result();
        //       }
        //   return false;
   }


   


    public function listarCupos($fecha){

      $fecha= trim($fecha);
      $hoy = date('Y-m-d',strtotime($fecha));
      $fechas = array($hoy);
      $temp = $hoy;
      while(count($fechas) <= 7){
        $temp = date('Y-m-d', strtotime($temp. ' + 1 days'));
        if(isWeekend($temp)){
            $temp = date('Y-m-d', strtotime($temp. ' + 2 days'));
         if(isWeekend($temp)){
            $temp = date('Y-m-d', strtotime($temp. ' + 3 days'));
         }else{
            $fechas[] = $temp;
         }
        }else{
            $fechas[] = $temp;
        }

      }
       //    var_dump($fechas);
       $data = array();
       $especialidades = $this->getAllEspecialidades();
       //var_dump($especialidades);
       foreach($especialidades as $row){
           $data[] = array(
                'especialidad' => $row->especialidad,
                'id_especialidad' => $row->id,
                'fecha_1' => null,
                'fecha_2' => null,
                'fecha_3' => null,
                'fecha_4' => null,
                'fecha_5' => null,
                'fecha_6' => null,
                'fecha_7' => null,
                'cupo_1' => null,
                'cupo_2' => null,
                'cupo_3' => null,
                'cupo_4' => null,
                'cupo_5' => null,
                'cupo_6' => null,
                'cupo_7' => null,
            );
       }

      $fecha1 = $this->cuposPorDia($fechas[0]);
      $fecha2 = $this->cuposPorDia($fechas[1]);
      $fecha3 = $this->cuposPorDia($fechas[2]);
      $fecha4 = $this->cuposPorDia($fechas[3]);
      $fecha5 = $this->cuposPorDia($fechas[4]);
      $fecha6 = $this->cuposPorDia($fechas[5]);
      $fecha7 = $this->cuposPorDia($fechas[6]);
      $i =0 ;
     foreach ($fecha1 as $row) {
       $data[$i]['cupo_1'] = is_null($row->cupos) ? 0 : $row->cupos  ;
       $data[$i]['fecha_1'] = $fechas[0] ;
       $i++;
     }
    
     $i =0 ;
      foreach ($fecha2 as $row) {
       $data[$i]['cupo_2'] = is_null($row->cupos) ? 0 : $row->cupos  ;
        $data[$i]['fecha_2'] = $fechas[1] ;
       $i++;
     }
     $i =0 ;
      foreach ($fecha3 as $row) {
       $data[$i]['cupo_3'] = is_null($row->cupos) ? 0 : $row->cupos  ;
        $data[$i]['fecha_3'] = $fechas[2] ;
       $i++;
     }
     $i =0 ;
      foreach ($fecha4 as $row) {
       $data[$i]['cupo_4'] = is_null($row->cupos) ? 0 : $row->cupos  ;
        $data[$i]['fecha_4'] = $fechas[3] ;
       $i++;
     }
     $i =0 ;
      foreach ($fecha5 as $row) {
       $data[$i]['cupo_5'] = is_null($row->cupos) ? 0 : $row->cupos  ;
        $data[$i]['fecha_5'] = $fechas[4] ;
       $i++;
     }
     $i =0 ;
      foreach ($fecha6 as $row) {
       $data[$i]['cupo_6'] = is_null($row->cupos) ? 0 : $row->cupos  ;
        $data[$i]['fecha_6'] = $fechas[5] ;
       $i++;
     }
    $i =0 ;
      foreach ($fecha7 as $row) {
       $data[$i]['cupo_7'] = is_null($row->cupos) ? 0 : $row->cupos  ;
        $data[$i]['fecha_7'] = $fechas[6] ;
       $i++;
     }
 
    foreach ($data as $key => $value) {
        if($value['cupo_1'] == 0){
          if($value['cupo_2'] == 0){
             if($value['cupo_3'] == 0){
              if($value['cupo_4'] == 0){
                if($value['cupo_5'] == 0){
                  if($value['cupo_6'] == 0){
                    if($value['cupo_7'] == 0){
                      unset($data[$key]);
          
                                }
          
                              }
          
                            }
          
                        }
                      }
                  }
            }

      }


   return $data;

}


public function detalleTarea($id){
    $this->db->select('*');
    $this->db->from('subtareas_view');
    $this->db->where('id_tarea', $id);
    $where = "responsable = 'NO DEFINIDO'";
    $this->db->where($where);
    $query = $this->db->get();
    if($query->num_rows() > 0){
                return $query->result();
              }
          return false;

}

 
//datatables server side

  private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

 

}
