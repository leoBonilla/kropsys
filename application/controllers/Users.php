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

class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public function index(){

	}

    public function nuevo(){
    	if( $this->require_min_level(9) )
		{

			 $this->load->model('anexos_model');
			 $anexos = $this->anexos_model->getAll();
			 //$this->load->view('create_user', array('anexos' => $anexos));
	   $css = array();
	   $scripts = array('pages/users/create.js');		
	   $this->template->set('title', 'Usuarios');
       $this->template->set('page_header', 'Usuarios');
       $this->template->set('css', $css);
       $this->template->set('scripts', $scripts);
       $this->template->load('default_layout', 'contents' , 'users/index',  array('anexos' => $anexos));
			

		}


    }

    public function createUser(){
    	header('Content-Type: application/json');
    	$result = array('error' => false, 'data' => array());
    	$this->load->helper('auth');
		$this->load->model('examples/examples_model');
		$this->load->model('examples/validation_callables');
    	if( $this->require_min_level(9) )
		{
			if($this->input->post()){


	    $user_data = array(
	    'username' => $this->input->post('username'),
	    'nombre' => $this->input->post('nombre'),
	    'apellido' => $this->input->post('apellido'),
	    'email' => $this->input->post('email'),
	    'auth_level' => $this->input->post('tipo'),
	    'passwd' => $this->input->post('password'),
	    'extension_id' => $this->input->post('anexo'),
	    'number' => $this->input->post('number'),
	    'rut' => $this->input->post('rut'),

	    );			
        
		$this->form_validation->set_data( $user_data );

		$validation_rules = [
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.username]',
				'errors' => [
					'is_unique' => 'El nombre de usuario ya se utilizó'
				]
			],
			[
				'field' => 'passwd',
				'label' => 'password',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'La contraseña es necesaria'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'email',
				'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'El email ya está utilizado.'
				]
			],
			[
				'field' => 'auth_level',
				'label' => 'tipo',
				'rules' => 'required|integer|in_list[1,2,6,9,12]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );


				

         if ($this->form_validation->run() )
                {
					$user_data['rut'] = str_replace(".", "", $user_data['rut']);
                	$user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
					$user_data['user_id']    = $this->examples_model->get_unused_id();
					$user_data['created_at'] = date('Y-m-d H:i:s');


			// If username is not used, it must be entered into the record as NULL
					if( empty( $user_data['username'] ) )
					{
						$user_data['username'] = NULL;
					}


					$this->db->set($user_data)
						->insert(db_table('user_table'));

					if( $this->db->affected_rows() == 1 )
						 echo json_encode($result);

		                }
		                else
		                {
		                   

 	                        $result['error'] = true;
		                	$result['data'] = array('errors' => validation_errors());
		                    echo json_encode($result);

		                }
			}
		}
    }

}