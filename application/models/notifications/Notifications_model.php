<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Notifications_model extends CI_Model {

	private $validUser; 


	 public function __construct()
        {
                parent::__construct();

        }
     public function createNotification($data){
     	  $this->db->insert('notifications', $data);
            if ( $this->db->affected_rows() == '1' ) {
                return TRUE;
              }
              else {
                return FALSE;
            }
     }


     public function getByUser($user, $seen = false){
     		$this->db->select('*');
     		$this->db->from('notifications');
     		$this->db->where('user_id', $user);
     		$this->db->where('seen', $seen);
     		$query = $this->db->get();
     		if($query->num_rows() > 0){
     			return $query->result();
     		}
     		return false;
     }
}