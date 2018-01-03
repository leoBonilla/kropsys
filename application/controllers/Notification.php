<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Community Auth - Examples Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2017, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

class Notification extends MY_Controller
{

	public function __construct(){
		parent::__construct();
	}

	public function getNotifications(){
		if($this->require_min_level(1)){
			if($this->input->post()){
				$doc = $this->input->post('doc_id');
				$user = $this->auth_user_id;
				$this->load->model('notifications/notifications_model', 'notification');
				$result = $this->notification->getByUser($user,false);
				header('Content-Type: application/json');
				echo json_encode(array('result' => $result));

			}
		}
	}


	public function seen(){
		if($this->require_min_level(1)){
			if($this->input->post()){
				$doc = $this->input->post('id');
				$user = $this->auth_user_id;
				$this->load->model('notifications/notifications_model', 'notification');
				header('Content-Type: application/json');
				
				if($this->notification->markSeed($doc, $user)){

						echo json_encode(array('result' => TRUE));
				}else{
					echo json_encode(array('result' => FALSE));
				}

			}
		}
	}




}