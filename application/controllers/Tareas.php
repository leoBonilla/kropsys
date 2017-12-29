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
			if($this->require_min_level(9)){
			$this->template->set('title', 'Gestionar tareas');
			$this->template->set('page_header', 'Gestionar tareas');
			$this->template->set('css', array());
			$this->template->set('scripts', array());
			$this->template->load('default_layout', 'contents' , 'tareas/index', null);
	}
}

public function asignarUsuarios(){
	if($this->require_min_level(9)){
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
			if($this->require_min_level(9)){
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
	if($this->require_min_level(9)){
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
        
            if($this->require_min_level(9)){
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
	if($this->require_min_level(9)){
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

		if($this->require_min_level(9)){
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
		if($this->require_min_level(1)){
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
 	if($this->require_min_level(1)){
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
 	if($this->require_min_level(1)){
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
  if($this->require_min_level(6)){
        $this->template->set('title', 'Email');
        
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


 public function ajaxmodal(){
    if($this->require_min_level(1)){
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
         //
         // if($documentos == false){
         //    $documentos = $this->documents_model->getNoDocument($idmail);
         // }
        

         //si no tiene archivos asociados
        // $doc = $this->documents_model->getDocument()
         $this->load->view('tareas/popup', array('users' => $users, 'documentos' => $documentos, 'id_email' => $idmail, 'adjuntos' => $adjuntos));

    }
 }


  public function ajaxInfo(){
    if($this->require_min_level(1)){
         $this->load->model('global_model');
         $this->load->model('documents/documents_model');
         $id = $this->input->post('id');
         $email = $this->documents_model->getEmailById($id);
         $this->load->view('tareas/info_email', array('email' => $email));

    }
 }




 public function asignar(){
     if($this->require_min_level(9)){
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
    if($this->require_min_level(9)){
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
    if($this->require_min_level(1)){
         $this->load->model('global_model');
         $this->load->model('documents/documents_model');
         $id = $this->input->post('id');
         $users = $this->global_model->getAllUsers();
         $llamadas= $this->documents_model->getHistoryCalls($id);
       

         //$model = $this->documents_model;
         $this->load->view('tareas/calls', array('llamadas' => $llamadas));   


       
    }
}


public function adjuntos($id){
    if($this->require_min_level(9)){
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
    if($this->require_min_level(6)){
        if($this->input->post()){
            $id = $this->input->post('id');
            $this->load->model('documents/documents_model', 'doc');
            $id = $this->doc->getState($id);
        }
    }
}

public function getEmailState($email_id){
    if($this->require_min_level(6)){
        $this->load->model('documents/documents_model', 'doc');
        $data = $this->doc->test();

    }
}

public function test(){
    if($this->require_min_level(1)){
    //    // $this->load->model('global_model');
    // // $users = $this->global_model->getAllUsers();
     $this->load->library('gmail');
     $email = Gmail::getInstance(array('appName' => 'Kropsys ltda', 'secretPath' => APPPATH.'key\client_secret_838788612370-d5dn673ou160hbi0tgsjfid4lch32j8c.apps.googleusercontent.com.json','redirectUrl' => 'http://' . $_SERVER['HTTP_HOST'] . '/kropsysv2/tareas/test'));
     $email->autenticate();
     $email->listMails();
  
   
    }
   
}


public function validar(){
    if($this->require_min_level(9)){
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


}