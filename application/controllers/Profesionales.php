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

class Profesionales extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public function index(){
        redirect(base_url('profesionales/listado'));
	}

	public function listado(){
		if($this->require_min_level(ADMIN_LEVEL)){
    		$this->template->set('title', 'Profesionales');
        
            $this->template->set('page_header', 'Profesionales');
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
               'pages/profesionales/listado.js'
                         
                         );
              $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);
             $this->template->load('default_layout', 'contents' , 'profesionales/listado');
    	}
	}

    public function listar_profesionales(){
                 if($this->require_min_level(ADMIN_LEVEL)){
          $inicio = '';
          $fin= '';
          $users;
            if($this->input->post()){

           
                  $this->load->model('datatables/profesionales_model', 'profesionales');
                  $list = $this->profesionales->get_datatables();
                            $data = array();
                            $no = $_POST['start'];
                            foreach ($list as $fila) {
                              //var_dump($tareas);
                                $no++;
                                $row = array();
                                $row[] = $fila->profesional;
                                $row[] = $fila->nombre_agenda;
                                $row[] = $fila->especialidad;

                                if($fila->disabled == 0){
                                  $row[] =  '<span class="label label-success">ACTIVO</span>';
                                }else{
                                     $row[] =  '<span class="label label-danger">INACTIVO</span>';
                                }
                                
                                $row[] = '<div class="btn-group btn-group-xs">
  <button type="button" class="btn btn-warning btn-edit" data-user-id="'.$fila->id.'"><i class="fa fa-edit"></i></button>
</div>';


                     
                     
                                $data[] = $row;
                            }
                     
                            $output = array(
                                            "draw" => $_POST['draw'],
                                            "recordsTotal" => $this->profesionales->count_all(),
                                            "recordsFiltered" => $this->profesionales->count_filtered(),
                                            "data" => $data,
                                    );
                            //output to json format
                            echo json_encode($output);

              }

            }
    }

    public function editProfesional(){
        if($this->require_min_level(ADMIN_LEVEL)){
        $this->load->model('global_model', 'global');
        if($this->input->post()){
            $esp = '';
            $id = $this->input->post('id');
            $prof = $this->global->findProfesionalV2($id);

            $this->load->view('profesionales/edit',array('prof' => $prof, 'espe' => $esp));
        }
    }
    }


    public function editable(){
    header('Content-Type: application/json');
    $response = array('status' => null, 'msg' > null);
   if($this->input->post()){
    $name = $this->input->post('name');
    $value = $this->input->post('value');
    $id = $this->input->post('pk');
    $this->load->model('profesionales_model','profesionales');
    $result = $this->profesionales->update($id, array($name => $value));
     if($result){
          $response['status'] = 'success';
          $response['msg'] = 'Actualizado con exito';
         
     }else{
        $response['status'] = 'error';
          $response['msg'] = 'Error actualizando el registro';
     }

     echo json_encode($response);
   }    
}


public function especialidades(){
    header('Content-Type: application/json');
    $json = [];
        $q = $this->input->get("q");
        $q = ' ';
        if(!empty($q)){
            $this->db->like('especialidad', $q);
            $query = $this->db->select('id,especialidad as text')
                       // ->limit(10)
                        ->get("especialidades");
            $json = $query->result();
            header("HTTP/1.1 200 OK", true, 200);
            echo json_encode($json);
        }else {
        header('HTTP/1.0 400 Bad Request', true, 400);
        echo "This field is required!";
    }      
}


public function nuevo(){
     if($this->require_min_level(ADMIN_LEVEL)){
        $this->load->model('global_model');
       $css = array();
       $scripts = array('pages/profesionales/create.js');   
       $especialidades = $this->global_model->getEspecialidades();    
       $this->template->set('title', 'Profesionales');
       $this->template->set('page_header', 'Nuevo profesional');
       $this->template->set('css', $css);
       $this->template->set('scripts', $scripts);
       $this->template->load('default_layout', 'contents' , 'profesionales/nuevo', array('especialidades' => $especialidades));
     }
}

public function create(){
     header('Content-Type: application/json');
    if($this->require_min_level(ADMIN_LEVEL)){
        if($this->input->post()){
            $this->load->model('profesionales_model', 'profesionales');
            $profesional = $this->input->post('profesional');
            $nombre_agenda = $this->input->post('nombre_agenda');
            $especialidad = $this->input->post('especialidad');
            echo json_encode(array('result' => $this->profesionales->create(array('profesional' => $profesional, 'nombre_agenda' => $nombre_agenda, 'id_especialidad' =>$especialidad ))));
        }
        
    }
}

}