<?php
defined('BASEPATH') OR exit('No direct script access allowed');
set_time_limit(0); 
use Cocur\BackgroundProcess\BackgroundProcess;
class Gestor extends MY_Controller { 
   public function __construct(){
   	parent::__construct();
   }

   public function index(){
   	   if($this->require_min_level(ADMIN_LEVEL)){
        $this->template->set('title', 'Gestor ');
       
        $this->template->set('page_header', 'Gestor');
          //           $this->template->set('page_header', 'Email');
             $css =  array(
             	'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
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

               '../init_tables.js',   
               'pages/gestor/index.js'
                         
                         );
         $this->template->set('css', $css);
         $this->template->set('scripts', $scripts);
         $this->load->model('documents/documents_model');
    	 $list = $this->documents_model->getMails();
        $this->template->load('default_layout', 'contents' , 'gestor/index',array('list' => $list));
        $this->load->library('Background');
       //$this->background->do_in_background(base_url().'gestor/lookNewEmails',array());
    }
   }



   public function ajax(){
   	 header('Content-Type: application/json');
   	 $this->load->model('documents/documents_model');
   	 $list = $this->documents_model->getMails();
   	 $data = array();
    	 foreach ($list as $row) {
    	 	$email = $row['email'];
    	 	$adjuntos = $row['adjuntos'];
    	 	if($adjuntos== false){
    	 		$adjuntos = 'SIN ADJUNTOS';
    	 	}else{
    	 		$tmp = '';
    	 		foreach ($adjuntos as $ad) {
    	 		$tmp = $tmp .'<a href=""><span class="label label-warning">'. $ad->nombre.'</span></a><br>';
    	 		}
    	 		$adjuntos= $tmp;
    	 	}

    	 		//$data[] = array($email->id_email,$email->fecha, $email->id_user, $email->estado, $email->asunto, $email->enviado_por,$email->fecha_envio, $email->mensaje );
    	 	$data[] = array($email->fecha_envio, $email->asunto, $email->enviado_por,$adjuntos, $email->estado, '');
   	 }

   	 //var_dump($data);

   	  echo json_encode(array('data' => $data));
   	 //echo json_encode(array('data' => array(array(1,2,3,4,5,6))));
   }


   public function listar_emails(){
   	header('Content-Type: application/json');
   	         if($this->require_min_level(EJECUTIVE_LEVEL)){
          $inicio = '';
          $fin= '';
          $users;
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
                 // $users = ($this->input->post('userId') != null) ? $this->input->post('userId') : '';         
               $this->load->model('datatables/emails_model', 'emails');

              }
  
        $where = "";
        if($inicio != '' and $fin != ''){
            $where .= " ((date(created_at) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " ((date(created_at) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " ((date(created_at) <= '".$fin."')) ";
          }

     
     
        $list = $this->emails->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
       
        
        foreach ($list as $fila) {
          //var_dump($tareas);
        	$this->db->where('id_email', $fila->id_email);
            $this->db->where('es_archivo', 1);
            $adjuntos = $this->db->get('documents_view')->result();
            $temp = '';
            foreach ($adjuntos as $ad) {
            	$temp = $temp .'<span class="label label-default">'.$ad->nombre.'</span><br>'; 
            }
            $no++;

            $row = array();
            $row[] = $fila->fecha_envio;
            $row[] = $fila->asunto;
            $row[] = $fila->enviado_por;
            $row[] = $temp;
            $row[] = $fila->estado_email;

            $acciones = '<div class="btn-group btn-group-xs">
 <button class="btn btn-xs btn-info btn-modal" data-idmail="'.$fila->id_email.'" data-toggle="modal" data-sender="'.$fila->enviado_por.'" data-subject="'.$fila->asunto.'" >&nbsp;<i class="fa fa-info">&nbsp;</i></button> <button class="btn btn-warning btn-xs btn-asignar" data-idmail="'. $fila->id_email .'" >&nbsp;<i class="fa fa-user"></i>&nbsp;</button>
                    <a class="btn btn-xs btn-success btn-files" href="'. base_url().'tareas/adjuntos/'.$fila->id_email.'"><i class="fa fa-files-o"></i></a>

                    <button class="btn btn-danger btn-xs btn-discard" data-toggle="confirmation" data-title="Está seguro?" data-btn-ok-label="Si" data-btn-cancel-label="No" data-btn-ok-class="btn-success" data-btn-cancel-class="btn-danger" data-placement="left" data-idmail="'.$fila->id_email.'" >&nbsp;<i class="fa fa-ban"></i>&nbsp;</button>
  </div>';
            $row[] = $acciones;

 
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->emails->count_all($where),
                        "recordsFiltered" => $this->emails->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
            }
   }




public function lookNewEmails(){
	
	 $options = array(
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
        CURLOPT_ENCODING       => "",     // handle compressed
        CURLOPT_USERAGENT      => "test", // name of client
        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        CURLOPT_TIMEOUT        => 120,    // time-out on response
    ); 
    	   	$ch = curl_init(base_url('gestor/respuesta'));
curl_setopt_array($ch, $options);

 
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

    if($output === "1"){
     $this->sendNotification('new-msg','nuevo-correo',array('message' => 'Nuevo elemento en bandeja de entrada', ));
    }else{
    	$this->sendNotification('new-msg','no-correos',array('message' => 'No hay correos  nuevos', ));
    }
       



}

public function respuesta(){
	$this->load->library('mailreader');
    $email = new MailReader('crm@kropsys.cl','kropsys!2018',$this->auth_user_id);
    $result = $email->sincronizar();
    $email->close();
    echo $result;
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

public function test(){

	$task = new Async();

	$task->start() && $task->join();

	var_dump($task->response); // string(6) "Google"
}
}

class Async extends Thread {
    private $response;

    public function run()
    {
        $content = file_get_contents("http://google.com");
        preg_match("~<title>(.+)</title>~", $content, $matches);
        $this->response = $matches[1];
    }
}


