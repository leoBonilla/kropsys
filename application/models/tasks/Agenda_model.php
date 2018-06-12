<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Agenda_model extends CI_Model {
	  public function __construct()
        {
                parent::__construct();

        }

  	   public function findCitas($idmedico, $inicio,$fin){
            
              $query = $this->db->query('SELECT * FROM `citas` WHERE date(fecha) BETWEEN '2018-06-13' and  '2018-06-13' and id_medico = 551');
              if($query->num_rows()>0){
              	return $query->result();
              }
              return false;

  		}


}