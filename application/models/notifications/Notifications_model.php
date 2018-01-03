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
            $this->db->order_by('id', 'DESC');
     		$query = $this->db->get();
     		if($query->num_rows() > 0){
     			return $query->result();
     		}
     		return false;
     }




     public function markSeed($id_documento,$user_id){
        $this->db->where('id_documento', $id_documento );
        $this->db->where('user_id', $user_id);
        $this->db->update('notifications', array('seen' => 1, 'seen_date' => date('Y-m-d H:i:s') ,'updated' =>  date('Y-m-d H:i:s') ));
        if ( $this->db->affected_rows() == '1' ) {
                return TRUE;
              }
              else {
                return FALSE;
            }
     }
}