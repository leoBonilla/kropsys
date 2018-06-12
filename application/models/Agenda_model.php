<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Agenda_model extends CI_Model {
	  public function __construct()
        {
                parent::__construct();

        }

  	   public function findCitas($idmedico, $inicio,$fin){
            
              $query = $this->db->query("SELECT * FROM `citas` WHERE date(fecha) BETWEEN '".$inicio."' and  '".$fin."' and id_medico = ".$idmedico);
              if($query->num_rows()>0){
              	return $query->result();
              }
              return false;

  		}


      public function anular($data){
         foreach ($data as $row) {
                   $codigo = $this->update_code();
                   $enlace = $this->acortar_enlace('http://190.208.16.35/reservapaciente/'.$codigo);
                   $this->db->where('id', $row); 
                   $this->db->update('citas', array('codigo_anulacion' => $codigo, 'anulada' => 1, 'enlace_usuario' => $enlace));
         }

        $query = $this->db->select('*');
        $this->db->from('citas');
        $this->db->where_in('id', $data);
        $this->db->where('anulada', 1);
        $result = $this->db->get();
        return $result->result();

      }

      private function update_code(){
         $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

        // Make sure the random user_id isn't already in use
        $query = $this->db->where( 'codigo_anulacion', $random_unique_int )
            ->get( 'citas' );

        if( $query->num_rows() > 0 )
        {
            $query->free_result();

            // If the random user_id is already in use, try again
            return $this->update_code();
        }

        return $random_unique_int;
      }

      private function acortar_enlace($enlace) {
       $usuario = "kropsys";
        $apikey = "R_c65bd74b78c0416c84bc37ab8a9380bd";
        $tempo = "http://api.bit.ly/v3/shorten?login=".$usuario."&apiKey=".$apikey."&uri=".$enlace."&format=txt";
        return file_get_contents($tempo);
     }


}