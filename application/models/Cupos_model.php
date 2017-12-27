<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cupos_model extends CI_Model {

	 private $validUser; 
   private $table = 'cupos';

	 public function __construct()
        {
                parent::__construct();
                
        }

    public function save($data){
       $this->db->insert($this->table, $data);
        if ( $this->db->affected_rows() == '1' ) {
                     return TRUE;
                  }
                return FALSE;
}

   public function detalleCupo($fecha,$id_especialidad){
    $query =  $this->db->query("select e.especialidad, c.fecha,p.profesional, IFNULL(sum(c.cupos),0) as cupos, c.observaciones from especialidades e join cupos c on e.id = c.id_especialidad and c.fecha = '".$fecha."' and c.id_especialidad = ".$id_especialidad." join profesionales p on c.id_profesional = p.id group by c.id, c.fecha order by e.especialidad asc");
            if($query->num_rows() > 0){
                return $query->result();
              }
          return false;
   }

  

}
