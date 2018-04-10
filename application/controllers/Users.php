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
    	if( $this->require_min_level(ADMIN_LEVEL) )
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
    	if( $this->require_min_level(ADMIN_LEVEL) )
		{
			if($this->input->post()){
         $nac = ($this->input->post('nacimiento') !== NULL) ? datepicker_to_mysql($this->input->post('nacimiento')) : NULL;

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
	    'fecha_nac' => $nac

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
				'rules' => 'required|integer|in_list[1,2,3,4,,5,6,,7,8,9,,11,12]'
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


    public function listado(){
    	if($this->require_min_level(ADMIN_LEVEL)){
    		$this->template->set('title', 'Usuarios');
        
            $this->template->set('page_header', 'Usuarios');
             $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css',
                         'vendor/switch/bootstrap-switch.min.css',
                         'custom.css'

                    );


             $scripts = array( 
                        'vendor/datatables/js/jquery.dataTables.min.js',
                         'vendor/datatables-plugins/dataTables.bootstrap.min.js',
                         'vendor/datatables-responsive/dataTables.responsive.min.js',
                         'vendor/datatables-responsive/responsive.bootstrap.min.js',
                         'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                         'vendor/confirmation/bootstrap-confirmation.js',
                         'vendor/switch/bootstrap-switch.min.js',
                         //buttons js
                         'vendor/datatables-plugins/dataTables.buttons.min.js',
               'vendor/datatables-plugins/buttons.bootstrap.min.js',
                         'vendor/datatables-plugins/buttons.flash.min.js',
                         'vendor/datatables-plugins/jszip.min.js',
                         'vendor/datatables-plugins/pdfmake.min.js',
                         'vendor/datatables-plugins/vfs_fonts.js',
                         'vendor/datatables-plugins/buttons.html5.min.js',
                         'vendor/datatables-plugins/buttons.print.min.js',
               '../init_tables.js',
               'pages/users/listado.js'
                         
                         );
              $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);
             $this->template->load('default_layout', 'contents' , 'users/listado');
    	}
    }


        public function listar_usuarios(){
         if($this->require_min_level(EJECUTIVE_LEVEL)){
          $inicio = '';
          $fin= '';
          $users;
            if($this->input->post()){

           
                  $this->load->model('datatables/users_model', 'users');
                  $list = $this->users->get_datatables();
					        $data = array();
					        $no = $_POST['start'];
					        foreach ($list as $fila) {
					          //var_dump($tareas);
					            $no++;
					            $row = array();
					            $row[] = $fila->nombre;
					            $row[] = $fila->apellido;
					            $row[] = $fila->rut;
					            $row[] = '<span class="label label-default">'.$fila->anexo.'</span>';
					            $row[] = $fila->email;
					           // $row[] = $fila->banned;
					            if($fila->banned == 1){
					            	$estado = '<span class="label label-danger">ACTIVO</span>';
					            }else{
					            	$estado = '<span class="label label-success">INACTIVO</span>';
					            }
					            
					            $row[] = $estado;
					            $row[] = '<div class="btn-group btn-group-xs">
  <button type="button" class="btn btn-warning btn-edit" data-user-id="'.$fila->user_id.'"><i class="fa fa-edit"></i></button>
</div>';


					 
					 
					            $data[] = $row;
					        }
					 
					        $output = array(
					                        "draw" => $_POST['draw'],
					                        "recordsTotal" => $this->users->count_all(),
					                        "recordsFiltered" => $this->users->count_filtered(),
					                        "data" => $data,
					                );
					        //output to json format
					        echo json_encode($output);

              }

            }
          }


public function editUserHtml(){
	if($this->require_min_level(ADMIN_LEVEL)){
		$this->load->model('global_model', 'global');
		if($this->input->post()){
			$id = $this->input->post('user_id');
		}
	}
}


public function perfil(){
		if($this->require_min_level(EJECUTIVE_LEVEL)){
		   $this->template->set('title', 'Perfil');
		   $this->template->set('page_header', 'Perfil');
		   // $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('registros/').'"><i class="fa  fa-chevron-left"></i></a>');
		    $this->template->set('css', array());
            $this->template->set('scripts', array());
            $sql = $this->db->query("select * from users_anexos_view where user_id = ".$this->auth_user_id);
            $result = $sql->row();
             $this->template->load('default_layout', 'contents' , 'users/perfil', array('user' => $result));
	}
}

}