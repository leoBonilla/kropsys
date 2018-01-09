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

class Tareas extends MY_Controller
{

public function __construct(){
	parent::__construct();
}

public function index(){
			if($this->require_min_level(ADMIN_LEVEL)){
			$this->template->set('title', 'Gestionar tareas');
			$this->template->set('page_header', 'Gestionar tareas');
			$this->template->set('css', array());
			$this->template->set('scripts', array());
			$this->template->load('default_layout', 'contents' , 'tareas/index', null);
	}
}

public function asignarUsuarios(){
	if($this->require_min_level(ADMIN_LEVEL)){
		if($this->input->post()){
			$this->load->model('tasks/task_model');
			$tasks = $this->input->post('id[]');
			$userId = $this->input->post('user_selection');
			$this->task_model->asignarUsuarios($userId,$tasks);
			echo json_encode(array('result' => true));
		}
	}
}

public function uploadExcel(){
			if($this->require_min_level(ADMIN_LEVEL)){
								$config['upload_path']          = './uploads/excel_files/';
                $config['allowed_types']        = 'xlsx';
                $config['max_size']             = 100;
               // $config['file_name'] = date("Y_m_d H:i:s");
                $config['file_name']  = 'BASE_GES_'.substr(md5(time()), 0, 12);
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('excel'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());
                    $this->template->set('title', 'Carga Fallida');
					$this->template->set('page_header', 'Carga Fallida');
					$this->template->set('css', array());
					$this->template->set('scripts', array());
					$this->template->load('default_layout', 'contents' , 'tareas/cargar', $error);
                }
                else
                {
                    $upload_data = $this->upload->data();
                    $this->load->model('tasks/task_model');
                    $filename = $upload_data['file_name'];
                    //$file_location = './uploads/excel_files/'.$filename;
                    $file_location = FCPATH. '/uploads/excel_files/'.$filename;
                    if(file_exists($file_location)){
                    	$excel_data = $this->getExcelData($file_location);
                    	$fecha = 
                    	$task_data = array(
                    	'filename' => $filename,
                    	'fecha'  => $this->input->post('fecha'),
                    	'descripcion' => $this->input->post('descripcion'),
                    	'hora' => $this->input->post('hora'),
                    	'tipo' => $this->input->post('tipo'),
                    	'cargada_por' => $this->auth_user_id
                    	);
                    	$cargados = $this->task_model->newTask($task_data,$excel_data);
                    	if($cargados != false){
                    		//todo ok
                    		
		                    $this->template->set('title', 'Cargado con exito');
							$this->template->set('page_header', 'Tarea cargada exitosamente');
							$this->template->set('css', array());
							$this->template->set('scripts', array());
							$this->template->load('default_layout', 'contents' , 'tareas/carga_exitosa', array('cargados' => $cargados));
                    	}
                    }


                }
			}
}


public function cargar(){
	if($this->require_min_level(ADMIN_LEVEL)){
			$this->template->set('title', 'Tareas');
			$this->template->set('page_header', 'Tareas');
			$this->template->set('css', array( 'vendor/clockpicker/dist/bootstrap-clockpicker.css'));
			$this->template->set('scripts', array(
                'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                'pages/tareas/cargar.js'));
			$this->template->load('default_layout', 'contents' , 'tareas/cargar', null);
	}
}


public function cargarPorEmail(){
        
            if($this->require_min_level(ADMIN_LEVEL)){
            $this->load->library('mailreader');
            $mail = new MailReader('imap.gmail.com','leobonillab@gmail.com','993','leonardo84');
            $mail->connect();
            $attachments = $mail->searchStructure('FROM leobonillab@gmail.com');
            $body = $mail->getPart(4777, "1",0);
            var_dump($body);
            $mail->close();
           
            $this->template->set('title', 'Cargar por email');
            $this->template->set('page_header', 'Archivos en email ');
            $this->template->set('css', array( 'vendor/clockpicker/dist/bootstrap-clockpicker.css'));
            $this->template->set('scripts', array(
                'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                'pages/tareas/cargar.js'));
            $this->template->load('default_layout', 'contents' , 'tareas/listado_email', array('attachments' => $attachments));
    }

}


private function getExcelData($file){
	$this->load->library('excel');
 
//read file from path
$objPHPExcel = PHPExcel_IOFactory::load($file);
 
//get only the Cell Collection
$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
 
//extract to a PHP readable array format
foreach ($cell_collection as $cell) {
    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getFormattedValue();
 
    //header will/should be in row 1 only. of course this can be modified to suit your need.
    if ($row == 1) {
        $header[$row][$column] = $data_value;
    } else {
        $arr_data[$row][$column] = $data_value;
    }
}
 
//send the data in an array format
$data['header'] = $header;
$data['values'] = $arr_data;

return $data;
}

public function listado(){
	if($this->require_min_level(ADMIN_LEVEL)){
			$this->template->set('title', 'Listado de tareas');
			$this->template->set('page_header', 'Listado de tareas');
			 $css =  array(
       					'vendor/datatables-plugins/dataTables.bootstrap.css',
       					'vendor/datatables-responsive/dataTables.responsive.css'

       				);

             $scripts = array( 
       					'vendor/datatables/js/jquery.dataTables.min.js',
    					 'vendor/datatables-plugins/dataTables.bootstrap.min.js',
    					 'vendor/datatables-responsive/dataTables.responsive.min.js',
    					 'vendor/datatables-responsive/responsive.bootstrap.min.js',
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
    					 'pages/tareas/listado.js'
    					 );
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'tareas/listado', null);
	}
}


public function detalle($id){
		//echo $id;

		if($this->require_min_level(ADMIN_LEVEL)){
			$this->template->set('title', 'Detalle de tarea');
			$this->template->set('page_header', 'Detalle de tarea');
			 $css =  array(
       					'vendor/datatables-plugins/dataTables.bootstrap.css',
       					'vendor/datatables-responsive/dataTables.responsive.css',
       					'vendor/datatables-plugins/select.dataTables.min.css',
       					'custom.css'


       				);

             $scripts = array( 
       					'vendor/datatables/js/jquery.dataTables.min.js',
    					 'vendor/datatables-plugins/dataTables.bootstrap.min.js',
    					 'vendor/datatables-responsive/dataTables.responsive.min.js',
    					 'vendor/datatables-responsive/responsive.bootstrap.min.js',
    					 //buttons js
    					 'vendor/datatables-plugins/dataTables.buttons.min.js',
               'vendor/datatables-plugins/buttons.bootstrap.min.js',
    					 'vendor/datatables-plugins/buttons.flash.min.js',
    					 'vendor/datatables-plugins/jszip.min.js',
    					 'vendor/datatables-plugins/pdfmake.min.js',
    					 'vendor/datatables-plugins/vfs_fonts.js',
    					 'vendor/datatables-plugins/buttons.html5.min.js',
    					 'vendor/datatables-plugins/buttons.print.min.js',
    					 'vendor/datatables-plugins/dataTables.select.js',
    					 'vendor/datatables-plugins/dataTables.checkboxes.min.js',
               //'../init_tables.js',
    					 'pages/tareas/detalle.js'
    					 );
            $this->load->model('webapi_model');
            $this->load->model('global_model');

            $data = $this->webapi_model->detalleTarea($id);
            $users = $this->global_model->getAllUsers();
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'tareas/detalle',array('data' => $data, 'users' => $users));
	}
}


public function misTareas(){
		if($this->require_min_level(EJECUTIVE_LEVEL)){
			$this->template->set('title', 'Mis tareas');
			$this->template->set('page_header', 'Mis tareas');
			 $css =  array(
       					'vendor/datatables-plugins/dataTables.bootstrap.css',
       					'vendor/datatables-responsive/dataTables.responsive.css'

       				);

             $scripts = array( 
       					'vendor/datatables/js/jquery.dataTables.min.js',
    					 'vendor/datatables-plugins/dataTables.bootstrap.min.js',
    					 'vendor/datatables-responsive/dataTables.responsive.min.js',
    					 'vendor/datatables-responsive/responsive.bootstrap.min.js',
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
    					 'pages/tareas/mistareas.js'
    					 );
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'tareas/mistareas', null);
	}
}


 public function listar_tareas()
    {
    	$this->load->model('datatables/tareas_model', 'tareas');
        $list = $this->tareas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tareas) {
            $no++;
            $row = array();
            $row[] = $tareas->id;
            $row[] = "<a href=".base_url('tareas/detalle/').$tareas->id.">". $tareas->filename. "</a>";
            $row[] = $tareas->tipo;
            $row[] = $tareas->fecha;
            $row[] = $tareas->hora;
            $row[] = $tareas->descripcion;
            $row[] = $tareas->usuario;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->tareas->count_all(),
                        "recordsFiltered" => $this->tareas->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

 public function listar_mis_tareas(){
 	if($this->require_min_level(EJECUTIVE_LEVEL)){
 			$this->load->model('datatables/subtareas_model', 'subtareas');
 			$where = 'id_responsable = '. $this->auth_user_id. ' and finalizada is null' ;
        $list = $this->subtareas->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tareas) {
        	//var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $tareas->id;
            $row[] = $tareas->problema_salud;
            $row[] = $tareas->fecha_inicio;
            $row[] = $tareas->fecha_limite;
            $row[] = "<a class='btn btn-warning btn-xs' href='procesartarea/".$tareas->id."'>Completar</a>";
           // $row[] = $tareas->fecha;
           // $row[] = $tareas->descripcion;
           // $row[] = $tareas->created_at;
          //  $row[] = $tareas->usuario;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->subtareas->count_all($where),
                        "recordsFiltered" => $this->subtareas->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
 	}
    
 }


 public function tareasSettings(){
 		$this->load->view('tareas/tareas_settings');
 }

 public function procesartarea($id){
 	if($this->require_min_level(EJECUTIVE_LEVEL)){
 		   $this->load->model('tasks/task_model','tareas');
 		   $this->load->model('global_model','global');
           $this->load->model('locations_model');
 		   $data = $this->tareas->findTask($id);
 		   $user = $this->global->findUser($this->auth_user_id);
 		   $history = $this->tareas->getHistory($id);
 		   $states = $this->global->getStates();
           $locations = $this->locations_model->getAll();
            $specialties = $this->global->getEspecialidades();
 		   $anexo = $this->global->findAnexo($user->extension_id);
 		   if($data == false || $data->finalizada == 1){
 		   	redirect(base_url('tareas/mistareas'));
 		   }
			$this->template->set('title', 'Completar tarea');
			$this->template->set('page_header', 'Completar tarea');
			 $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css'

                    );


             $scripts = array( 
                        'vendor/datatables/js/jquery.dataTables.min.js',
                         'vendor/datatables-plugins/dataTables.bootstrap.min.js',
                         'vendor/datatables-responsive/dataTables.responsive.min.js',
                         'vendor/datatables-responsive/responsive.bootstrap.min.js',
                         'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                         'vendor/confirmation/bootstrap-confirmation.js',
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
                         'pages/tareas/procesar.js'
                         );
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'tareas/procesar',array('data' => $data, 
				'anexo' => $anexo,
				'history' => $history,
				'states' => $states,
                'locations'=> $locations, 
                'specialties' => $specialties

				));
	}
 }



 public function email(){
  if($this->require_min_level(ADMIN_LEVEL)){
        $this->template->set('title', 'Email');
        $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('tareas/emailsdescartados').'"><i class="fa fa-envelope-o"></i></a>');
            $this->template->set('page_header', 'Email');
             $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css',
                        'custom.css'

                    );


             $scripts = array( 
                        'vendor/datatables/js/jquery.dataTables.min.js',
                         'vendor/datatables-plugins/dataTables.bootstrap.min.js',
                         'vendor/datatables-responsive/dataTables.responsive.min.js',
                         'vendor/datatables-responsive/responsive.bootstrap.min.js',
                         'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                         'vendor/confirmation/bootstrap-confirmation.js',
                         //buttons js
                         'vendor/datatables-plugins/dataTables.buttons.min.js',
               'vendor/datatables-plugins/buttons.bootstrap.min.js',
                         'vendor/datatables-plugins/buttons.flash.min.js',
                         'vendor/datatables-plugins/jszip.min.js',
                         'vendor/datatables-plugins/pdfmake.min.js',
                         'vendor/datatables-plugins/vfs_fonts.js',
                         'vendor/datatables-plugins/buttons.html5.min.js',
                         'vendor/datatables-plugins/buttons.print.min.js',
                         'vendor/moments/moments.js',
               '../init_tables.js',
               'pages/tareas/email.js'
                         
                         );
            $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);
            $this->load->model('global_model');
             $users = $this->global_model->getAllUsers();
    $this->load->library('mailreader');
    $email = new MailReader('crm@kropsys.cl','kropsys!2018',$this->auth_user_id);
    $email->sincronizar();
    $email->close();
    $this->load->model('documents/documents_model');
    $list = $this->documents_model->getMails();
    $this->template->load('default_layout', 'contents' , 'tareas/email',array('list' => $list, 'users' => $users));
  }





 }


public function emailsdescartados(){
  if($this->require_min_level(ADMIN_LEVEL)){
        $this->template->set('title', 'Emails descartados');
        $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('tareas/email').'"><i class="fa fa-envelope-o"></i></a>');
        $this->template->set('page_header', 'Emails descartados');
          //           $this->template->set('page_header', 'Email');
             $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css',
                        'custom.css'

                    );


             $scripts = array( 
                        'vendor/datatables/js/jquery.dataTables.min.js',
                         'vendor/datatables-plugins/dataTables.bootstrap.min.js',
                         'vendor/datatables-responsive/dataTables.responsive.min.js',
                         'vendor/datatables-responsive/responsive.bootstrap.min.js',
                         'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                         'vendor/confirmation/bootstrap-confirmation.js',
                         //buttons js
                         'vendor/datatables-plugins/dataTables.buttons.min.js',
               'vendor/datatables-plugins/buttons.bootstrap.min.js',
                         'vendor/datatables-plugins/buttons.flash.min.js',
                         'vendor/datatables-plugins/jszip.min.js',
                         'vendor/datatables-plugins/pdfmake.min.js',
                         'vendor/datatables-plugins/vfs_fonts.js',
                         'vendor/datatables-plugins/buttons.html5.min.js',
                         'vendor/datatables-plugins/buttons.print.min.js',
                         'vendor/moments/moments.js',
               '../init_tables.js',
               'pages/tareas/descartados.js'
                         
                         );
         $this->template->set('css', $css);
         $this->template->set('scripts', $scripts);
        $this->template->load('default_layout', 'contents' , 'tareas/descartados');
    }
}



 public function ajaxmodal(){
    if($this->require_min_level(EJECUTIVE_LEVEL)){
         $this->load->model('global_model');
         $this->load->model('documents/documents_model');
         $idmail = $this->input->post('id');
         $users = $this->global_model->getAllUsers();

         $adjuntos = $this->documents_model->tieneAdjuntos($idmail);
         $documentos = null;
         
         if($adjuntos){
            $documentos = $this->documents_model->getDocumentsByEmail($idmail, true, true);
         }else{
            $documentos = $this->documents_model->getNoDocument($idmail, true);
         }
         $this->load->view('tareas/popup', array('users' => $users, 'documentos' => $documentos, 'id_email' => $idmail, 'adjuntos' => $adjuntos));

    }
 }


  public function ajaxInfo(){
    if($this->require_min_level(EJECUTIVE_LEVEL)){
         $this->load->model('global_model');
         $this->load->model('documents/documents_model');
         $id = $this->input->post('id');
         $email = $this->documents_model->getEmailById($id);
         $this->load->view('tareas/info_email', array('email' => $email));

    }
 }




 public function asignar(){
     if($this->require_min_level(ADMIN_LEVEL)){
        $usuario = $this->input->post('usuario');
        $observaciones = $this->input->post('observaciones');
        $this->load->model('documents/documents_model');
        $archivos = $this->input->post('archivos');
        $idmail = $this->input->post('id_email');
        $result = false;  
        header('Content-Type: application/json');
        if(!empty($archivos)){
            foreach ($archivos as $file) {
                 $data = array(
                'id_documento' => $file,
                'avance' => $observaciones,
                'responsable' => $usuario,
                'estado' => 1,
                'fecha' => date('Y-m-d H:i:s'),
                'observaciones' => $observaciones,
                'asignado_por'  => $this->auth_user_id,
                'id_email' => $idmail

            );
            
            
           if( $this->documents_model->asignar($data, $file)){ 
                $this->sendNotification($usuario,'notification', array('message' => 'Nueva Tarea asignada'));
                $result = true;
           }else{
                $result  = false;
           }
             
            }
            echo json_encode(array('result' => $result));
        }


       
    }
 }

public function ajaxhistory(){
    if($this->require_min_level(ADMIN_LEVEL)){
         $this->load->model('global_model');
         $this->load->model('documents/documents_model');
         $id = $this->input->post('id');
         $users = $this->global_model->getAllUsers();
         $historial= $this->documents_model->getHistory($id);
         $model = $this->documents_model;
         $this->load->view('tareas/history', array('history' => $historial, 'model' => $model, 'id' => $id));   


       
    }
}

public function ajaxCalls(){
    if($this->require_min_level(EJECUTIVE_LEVEL)){
         $this->load->model('global_model');
         $this->load->model('documents/documents_model');
         $id = $this->input->post('id');
         $users = $this->global_model->getAllUsers();
         $llamadas= $this->documents_model->getHistoryCalls($id);
       

         //$model = $this->documents_model;
         $this->load->view('tareas/calls', array('llamadas' => $llamadas));   


       
    }
}


public function ajaxDespachar(){
    if($this->require_min_level(ADMIN_LEVEL)){
         $this->load->model('global_model');
         $this->load->model('documents/documents_model');
         $id = $this->input->post('id');
         $original = $this->documents_model->getDocumentsById($id);
         $email_id = $original->id_email;
         $email = $this->documents_model->getEmailById($email_id);
         $documento = $this->documents_model->findDocumentoAprobado($id);
         $this->load->view('tareas/despachar', array('documento' => $documento,'email' => $email, 'original' => $original));   
    }
}


public function adjuntos($id){
    if($this->require_min_level(ADMIN_LEVEL)){
        $this->template->set('title', 'Adjuntos');
        
            $this->template->set('page_header', 'Adjuntos');
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
                         'vendor/moments/moment.js',
                         'vendor/countdown/countdown.js',
                         'vendor/kropsys/jquery.KropsysTimer.js',
               '../init_tables.js',
               'pages/tareas/adjuntos.js'
                         
                         );
            $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);
            $this->load->model('global_model');
            $users = $this->global_model->getAllUsers();
            $this->load->model('documents/documents_model');
            $list = $this->documents_model->getDocumentsByEmail($id);
            if(count($list)>1){
                $i = 0;
               foreach($list as $l){
                    if($l->es_archivo == 0){
                        unset($list[$i]);
                    }
                $i++;
               }


            }

            $this->template->load('default_layout', 'contents' , 'tareas/adjuntos',array('list' => $list, 'users' => $users));
  }



}



public function getState(){
    if($this->require_min_level(EJECUTIVE_LEVEL)){
        if($this->input->post()){
            $id = $this->input->post('id');
            $this->load->model('documents/documents_model', 'doc');
            $id = $this->doc->getState($id);
        }
    }
}




public function validar(){
    if($this->require_min_level(ADMIN_LEVEL)){
        $this->load->model('documents/documents_model', 'doc');
        if($this->input->post()){
            $result = false;
            $valido = $this->input->post('btn-validate');
            $id_doc = $this->input->post('id_doc');
            var_dump($valido);
            if($valido === 'on'){
               $result = $this->doc->validarDocumento($id_doc,$this->auth_user_id);
            }else{           
                $obs = $this->input->post('observaciones');
               $result =  $this->doc->documentoObservaciones($id_doc,$this->auth_user_id, $obs);          
            }
             header('Content-Type: application/json');
            echo json_encode(array('result' => $result));
        }
    }
}


private function sendNotification($channel,$event, $data){
           $options = array(
                    'cluster' => 'us2',
                    'encrypted' => true
                  );
                  $pusher = new Pusher\Pusher(
                    'd2cee8a3e04c9befaf5d',
                    'dfba06368a2378a61987',
                    '451334',
                    $options
                  );
            $pusher->trigger($channel, $event , $data);
}


public function descartarEmail(){
            if($this->require_min_level(ADMIN_LEVEL)){
                if($this->input->post()){
                    $this->load->model('emails/emails_model','emails');
                    $id = $this->input->post('id');
                     header('Content-Type: application/json');
                     $data = array(
                        'descartado_por' => $this->auth_user_id,
                        'fecha_descarte' => date('Y-m-d H:i:s'),
                        'motivo' => null
                    );
                     if($this->emails->discard($id,$data)){
                        echo json_encode(array('result' => true));
                     }else{
                        echo json_encode(array('result' => false));
                     }


                      
                    
                }
            }
}



public function list_descartados(){
   if($this->require_min_level(EJECUTIVE_LEVEL)){
     $this->load->model('datatables/descartados_model', 'emails');
      $list = $this->emails->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $emails) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $emails->fecha_envio;
            $row[] = $emails->asunto;
            $row[] = $emails->enviado_por;
            $row[] = $emails->s_descartado_por;
            $row[] = $emails->fecha_descarte;
            //$row[] = $emails->motivo;
      

            $row[] = "<button class='btn btn-warning btn-xs btn-modal' data-idmail='".$emails->id_email."'><i class='fa fa-info'></i></button>";

 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->emails->count_all(),
                        "recordsFiltered" => $this->emails->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
   }
}



public function test(){
    $this->load->library('MailReader');
   // $email = new MailReader();
     $email = new MailReader('crm@kropsys.cl','kropsys!2018',$this->auth_user_id);
    $email->sincronizar();
    $email->close();
}


public function listar_emails(){
    if($this->require_min_level(EJECUTIVE_LEVEL)){
     $this->load->model('datatables/emails_model', 'emails');
      $list = $this->emails->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $emails) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $emails->fecha_envio;
            $row[] = $emails->asunto;
            $row[] = $emails->enviado_por;
            //$row[] = $emails->s_descartado_por;
            //$row[] = $emails->fecha_descarte;
            //$row[] = $emails->motivo;
      

            $row[] = "<button class='btn btn-warning btn-xs btn-modal' data-idmail='".$emails->id_email."'><i class='fa fa-info'></i></button>";

 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->emails->count_all(),
                        "recordsFiltered" => $this->emails->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
   }
}


public function emailsv2(){
      if($this->require_min_level(ADMIN_LEVEL)){
        $this->template->set('title', 'Emails ');
       
        $this->template->set('page_header', 'Emails');
          //           $this->template->set('page_header', 'Email');
             $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css',
                        'custom.css'

                    );


             $scripts = array( 
                        'vendor/datatables/js/jquery.dataTables.min.js',
                         'vendor/datatables-plugins/dataTables.bootstrap.min.js',
                         'vendor/datatables-responsive/dataTables.responsive.min.js',
                         'vendor/datatables-responsive/responsive.bootstrap.min.js',
                         'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                         'vendor/confirmation/bootstrap-confirmation.js',
                         //buttons js
                         'vendor/datatables-plugins/dataTables.buttons.min.js',
               'vendor/datatables-plugins/buttons.bootstrap.min.js',
                         'vendor/datatables-plugins/buttons.flash.min.js',
                         'vendor/datatables-plugins/jszip.min.js',
                         'vendor/datatables-plugins/pdfmake.min.js',
                         'vendor/datatables-plugins/vfs_fonts.js',
                         'vendor/datatables-plugins/buttons.html5.min.js',
                         'vendor/datatables-plugins/buttons.print.min.js',
                         'vendor/moments/moments.js',
               '../init_tables.js',
               'pages/tareas/emailsv2.js'
                         
                         );
         $this->template->set('css', $css);
         $this->template->set('scripts', $scripts);
        $this->template->load('default_layout', 'contents' , 'tareas/emailsv2');
    }
}


}