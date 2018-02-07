<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registros extends MY_Controller {




		public function __construct(){
			parent::__construct();
			$this->load->model('webapi_model');
      $this->load->model('registros_model');
		}

		public function index(){
			if($this->require_min_level(EJECUTIVE_LEVEL)){
				$this->template->set('title', 'Registros');
  			$this->template->set('page_header', 'Mis registros');
  			$this->template->set('css', array());
  			$this->template->set('scripts', array());
  			$this->template->load('default_layout', 'contents' , 'registros/index', null);
			}
		}

		public function confirmaciones(){
			if($this->require_min_level(EJECUTIVE_LEVEL)){
           $this->load->model('global_model');
           $users = $this->global_model->getAllUsers();
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
    					 'pages/registros/confirmaciones.js'
    					 );
			$this->template->set('title', 'Confirmaciones');
      $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('registros/').'"><i class="fa  fa-chevron-left"></i></a>');
			$this->template->set('page_header', 'Mis registros | Confirmaciones');
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'registros/confirmaciones', array('users' => $users));
			}
		}


    public function edit($data = null){
      if($this->require_min_level(EJECUTIVE_LEVEL)){
        if(isset($data)){
          $validEdit = array('agendamientos','reasignaciones','confirmaciones','otros','sms','llamadas','cupos'); 
          $data  = explode('-',$data);
          if(in_array($data[0], $validEdit)){
            //$tipo = array_search($data[0],$validEdit);
            //echo $validEdit[$tipo];
            $id = $data[1];
            $this->load->model('registros_model');
            $registro = $this->registros_model->findRegistro($data[0],$id);
            if($registro != false){
              $this->load->model('global_model');
               $especialidades = $this->global_model->getEspecialidades();
               $profesionales = $this->registros_model->profesionalesByEspecialidad($registro->id_especialidad);
               $prestaciones = $this->global_model->getPrestaciones();

               $css = array();
               $scripts = array('pages/registros/edit.js');
               $params = array('especialidades' => $especialidades, 'registro' => $registro, 'profesionales' => $profesionales, 'prestaciones' => $prestaciones);
               $this->template->set('title', 'Editar '.$data[0]);
               $this->template->set('page_header', 'Editar '.$data[0]);
               $this->template->set('css', $css);
               $this->template->set('scripts', $scripts);
               $this->template->load('default_layout', 'contents' , 'registros/edit_'.$data[0], $params);
            }
        
          }                 


        }else{
          echo 'no parametros';
        }
      }
    }


    public function editarAgendamiento($id){
        if($this->require_min_level(EJECUTIVE_LEVEL)){
            $this->load->model('global_model');
            $especialidades = $this->global_model->getEspecialidades();
            $registro = $this->registros_model->findAgendamiento($id);
            $profesionales = $this->registros_model->profesionalesByEspecialidad($registro->id_especialidad);
            $prestaciones = $this->global_model->getPrestaciones();
              if($registro == false){
                redirect(base_url());
              }
            $css = array();
            $scripts = array('pages/registros/agendamientos_edit.js');
            $data = array('especialidades' => $especialidades, 'registro' => $registro, 'profesionales' => $profesionales, 'prestaciones' => $prestaciones);
           $this->template->set('title', 'Detalle agendamiento');
           $this->template->set('page_header', 'Mis registros | agendamiento');
           $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);
            $this->template->load('default_layout', 'contents' , 'registros/agendamiento_edit', $data);

        }
    }

	   public function reasignaciones(){
        if($this->require_min_level(EJECUTIVE_LEVEL)){
           $this->load->model('global_model');
           $users = $this->global_model->getAllUsers();

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
               'pages/registros/reasignaciones.js'
               );
      $this->template->set('title', 'Reasignaciones');
      $this->template->set('page_header', 'Mis registros | Reasignaciones');
      $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('registros/').'"><i class="fa  fa-chevron-left"></i></a>');
      $this->template->set('css', $css);
      $this->template->set('scripts', $scripts);
      $this->template->load('default_layout', 'contents' , 'registros/reasignaciones', array('users' => $users));
      }
    }



		public function agendamientos(){
				if($this->require_min_level(EJECUTIVE_LEVEL)){
           $this->load->model('global_model');
           $users = $this->global_model->getAllUsers();
			 $css =  array(
       					'vendor/datatables-plugins/dataTables.bootstrap.css',
       					'vendor/datatables-responsive/dataTables.responsive.css',
                'vendor/bootstrap-daterangepicker/daterangepicker.css',
                'custom.css'

       				);

             $scripts = array( 
       					 'vendor/datatables/js/jquery.dataTables.min.js',
    					 'vendor/datatables-plugins/dataTables.bootstrap.min.js',
    					 'vendor/datatables-responsive/dataTables.responsive.min.js',
    					 'vendor/datatables-responsive/responsive.bootstrap.min.js',
               'vendor/bootstrap-daterangepicker/moment.js',
               'vendor/bootstrap-daterangepicker/daterangepicker.js',
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
    					 
    					 'pages/registros/agendamientos.js'
    					 );
			$this->template->set('title', 'Agendamientos');
			$this->template->set('page_header', 'Mis registros | Agendamientos');
      $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('registros/').'"><i class="fa  fa-chevron-left"></i></a>');
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'registros/agendamientos', array('users'=> $users));
			}
		}
		public function otros(){
			if($this->require_min_level(EJECUTIVE_LEVEL)){
         $this->load->model('global_model');
           $users = $this->global_model->getAllUsers();
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
    					 'pages/registros/otros.js'
    					 );
			$this->template->set('title', 'Otros');
			$this->template->set('page_header', 'Mis registros | otros');
      $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('registros/').'"><i class="fa  fa-chevron-left"></i></a>');
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'registros/otros', array('users' => $users));
			}
		}

		public function sms(){
			if($this->require_min_level(EJECUTIVE_LEVEL)){
           $this->load->model('global_model');
           $users = $this->global_model->getAllUsers();
			 $css =  array(
       					'vendor/datatables-plugins/dataTables.bootstrap.css',
       					'vendor/datatables-responsive/dataTables.responsive.css',
                'custom.css');

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
    					 'pages/registros/sms.js'
    					 );
			$this->template->set('title', 'SMS ENVIADOS');
			$this->template->set('page_header', 'Mis registros | SMS');
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
      $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('registros/').'"><i class="fa  fa-chevron-left"></i></a>');
			$this->template->load('default_layout', 'contents' , 'registros/sms', array('users' => $users));
			}
		}


 public function listar_mis_llamadas(){
  if($this->require_min_level(EJECUTIVE_LEVEL)){
      $this->load->model('datatables/llamadas_model', 'llamadas');
       $inicio = '';
          $fin= '';
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
                           
               $this->load->model('datatables/reasignaciones_model', 'reasignaciones');

              }
      // if($this->auth_level < 9){
      //    $where = 'id_responsable = '. $this->auth_user_id ;
      // }else{
      //   $where = false;
      // }

                 if($this->auth_level < ADMIN_LEVEL){
         $where = "id_responsable = ". $this->auth_user_id;
          if($inicio != '' and $fin != ''){
            $where .= " AND ((date(fecha_llamada) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " AND ((date(fecha_llamada) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " AND ((date(fecha_llamada) <= '".$fin."')) ";
          }
          
      }else{
        $where = "";
        if($inicio != '' and $fin != ''){
            $where .= " ((date(fecha_llamada) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " ((date(fecha_llamada) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " ((date(fecha_llamada) <= '".$fin."')) ";
          }
      }
     
        $list = $this->llamadas->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $llamadas) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $llamadas->id_registro;
             $row[] = $llamadas->id_subtarea;
            $row[] = $llamadas->fecha_llamada;
            $row[] = $llamadas->nombre_paciente;
            $row[] = $llamadas->rut_paciente . '-'.$llamadas->digito_verif_paciente;
            $row[] = $llamadas->problema_salud;
             $row[] = $llamadas->profesional;
              $row[] = $llamadas->especialidad;
               $row[] = $llamadas->lugar;
            $row[] = $llamadas->numero;
            $row[] = $llamadas->estado;
            $row[] = $llamadas->fecha_cita;
            $row[] = $llamadas->hora_cita;
             $row[] = $llamadas->observaciones_llamada;
            $row[] = $llamadas->responsable;
            $row[] = $llamadas->call_unique_id;

            $row[] = "<a class='btn btn-warning btn-xs' href='editarcita/".$llamadas->id_subtarea."'>Editar</a>";

 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->llamadas->count_all($where),
                        "recordsFiltered" => $this->llamadas->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
  }
    
 }




    public function listar_reasignaciones(){
         if($this->require_min_level(EJECUTIVE_LEVEL)){
          $inicio = '';
          $fin= '';
          $users = null;
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
               // $userId = ($this->input->post('userId') != '') ? $this->input->post('userId') : '';
                $users = ($this->input->post('userId') != null) ? $this->input->post('userId') : ''; 
                           
               $this->load->model('datatables/reasignaciones_model', 'reasignaciones');

              }
      if($this->auth_level < ADMIN_LEVEL){
         $where = "id_usuario = ". $this->auth_user_id;
          if($inicio != '' and $fin != ''){
            $where .= " AND ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " AND ((date(fecha) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " AND ((date(fecha) <= '".$fin."')) ";
          }
          
      }else{
        $where = "";
        if($inicio != '' and $fin != ''){
            $where .= " ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " ((date(fecha) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " ((date(fecha) <= '".$fin."')) ";
          }

         
          if(is_array($users)){
              $in = '';
              foreach ($users as $id) {
                if($id != '')
                $in = $in .' '.$id.',';
              }
              $in = substr($in, 0, -1);

                         if($where != ''){
                         $where = $where. " AND id_usuario IN (".$in.")"; 
                       }else{
                       $where = $where. " id_usuario IN (".$in.")"; 
                       }
               }
      }
     
        $list = $this->reasignaciones->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fila) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $fila->especialidad;
            $row[] = $fila->profesional;
            $row[] = $fila->prestacion;

             $row[] = $fila->fecha;
             $row[] = $fila->pacientes_agendados;
             $row[] = $fila->no_contestaron;
             $row[] = $fila->rechazo_anulaciones;
             $row[] = $fila->hora_ya_asignada;
             $row[] = $fila->n_erroneo;
             $row[] = $fila->sin_cupo;
             $row[] = $fila->pacientes;
             $row[] = $fila->observaciones;
             $row[] = $fila->usuario;
             $row[] = "<a class='btn btn-warning btn-xs' href='".base_url('registros/edit/reasignaciones-'.$fila->id)."'>Editar</a>";
 
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->reasignaciones->count_all($where),
                        "recordsFiltered" => $this->reasignaciones->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
            }
          }


    public function listar_agendamientos(){
         if($this->require_min_level(EJECUTIVE_LEVEL)){
          $inicio = '';
          $fin= '';
          $users = null;
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
                //$userId = ($this->input->post('userId') != '') ? $this->input->post('userId') : '';    
                $users = ($this->input->post('userId') != null) ? $this->input->post('userId') : '';           
               $this->load->model('datatables/agendamientos_model', 'agendamientos');

              }
      if($this->auth_level < ADMIN_LEVEL){
         $where = "id_usuario = ". $this->auth_user_id;
          if($inicio != '' and $fin != ''){
            $where .= " AND ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " AND ((date(fecha) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " AND ((date(fecha) <= '".$fin."')) ";
          }
          
      }else{
        $where = "";
        if($inicio != '' and $fin != ''){
            $where .= " ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " ((date(fecha) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " ((date(fecha) <= '".$fin."')) ";
          }

               if(is_array($users)){
              $in = '';
              foreach ($users as $id) {
                if($id != '')
                $in = $in .' '.$id.',';
              }
              $in = substr($in, 0, -1);

                         if($where != ''){
                         $where = $where. " AND id_usuario IN (".$in.")"; 
                       }else{
                       $where = $where. " id_usuario IN (".$in.")"; 
                       }
               }
      }
     
        $list = $this->agendamientos->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fila) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $fila->especialidad;
            $row[] = $fila->profesional;
            $row[] = $fila->prestacion;

             $row[] = $fila->fecha;
             $row[] = $fila->pacientes_agendados;
             $row[] = $fila->no_contestaron;
             $row[] = $fila->rechazo_anulaciones;
             $row[] = $fila->hora_ya_asignada;
             $row[] = $fila->n_erroneo;
             $row[] = $fila->observaciones;
             $row[] = $fila->usuario;
             $row[] = "<a class='btn btn-warning btn-xs' href='".base_url('registros/edit/agendamientos-'.$fila->id)."'>Editar</a>";
 
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->agendamientos->count_all($where),
                        "recordsFiltered" => $this->agendamientos->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
            }
          }


public function listar_confirmaciones(){
         if($this->require_min_level(EJECUTIVE_LEVEL)){
          $inicio = '';
          $fin= '';
          $userId = '';
          $users= null;

          $this->load->model('datatables/confirmaciones_model', 'confirmaciones');
            //si es post activar filtros 
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
                //$userId = ($this->input->post('userId') != '') ? $this->input->post('userId') : '';
                $users = ($this->input->post('userId') != null) ? $this->input->post('userId') : '';   
            }
      if($this->auth_level < ADMIN_LEVEL){
         $where = "id_usuario = ". $this->auth_user_id;
          if($inicio != '' and $fin != ''){
            $where .= " AND ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " AND ((date(fecha) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " AND ((date(fecha) <= '".$fin."')) ";
          }
          
      }else{
        $where = "";
        if($inicio != '' and $fin != ''){
            $where .= " ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
           
          }elseif($inicio != ''){
            $where .= " ((date(fecha) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " ((date(fecha) <= '".$fin."')) ";
          }

           if(is_array($users)){
              $in = '';
              foreach ($users as $id) {
                if($id != '')
                $in = $in .' '.$id.',';
              }
              $in = substr($in, 0, -1);

                         if($where != ''){
                         $where = $where. " AND id_usuario IN (".$in.")"; 
                       }else{
                       $where = $where. " id_usuario IN (".$in.")"; 
                       }
               }

      }
     
        $list = $this->confirmaciones->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fila) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $fila->especialidad;
            $row[] = $fila->profesional;
            $row[] = $fila->prestacion;

             $row[] = $fila->fecha;
             $row[] = $fila->pacientes;
             $row[] = $fila->no_contestaron;
             $row[] = $fila->rechazo_anulaciones;
             $row[] = $fila->confirmadas;
             $row[] = $fila->reasignadas;
             $row[] = $fila->n_erroneo;
             $row[] = $fila->observaciones;
             $row[] = $fila->usuario;
              $row[] = "<a class='btn btn-warning btn-xs' href='".base_url('registros/edit/confirmaciones-'.$fila->id)."'>Editar</a>";
 
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->confirmaciones->count_all($where),
                        "recordsFiltered" => $this->confirmaciones->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
            }
          }




  public function listar_otros(){
         if($this->require_min_level(EJECUTIVE_LEVEL)){
          $inicio = '';
          $fin= '';
          $users = null;
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
                $users = ($this->input->post('userId') != null) ? $this->input->post('userId') : '';
                
               $this->load->model('datatables/otros_model', 'otros');

              }
      if($this->auth_level < ADMIN_LEVEL){
         $where = "id_usuario = ". $this->auth_user_id;
          if($inicio != '' and $fin != ''){
            $where .= " AND ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " AND ((date(fecha) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " AND ((date(fecha) <= '".$fin."')) ";
          }
          
      }else{
        $where = "";
        if($inicio != '' and $fin != ''){
            $where .= " ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " ((date(fecha) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " ((date(fecha) <= '".$fin."')) ";
          }
          
         if(is_array($users)){
              $in = '';
              foreach ($users as $id) {
                if($id != '')
                $in = $in .' '.$id.',';
              }
              $in = substr($in, 0, -1);

                         if($where != ''){
                         $where = $where. " AND id_usuario IN (".$in.")"; 
                       }else{
                       $where = $where. " id_usuario IN (".$in.")"; 
                       }
               }



      }
     
        $list = $this->otros->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fila) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $fila->especialidad;
            $row[] = $fila->profesional;
            $row[] = $fila->prestacion;

             $row[] = $fila->fecha;
             $row[] = $fila->pacientes;
             $row[] = $fila->no_contestaron;
             $row[] = $fila->rechazo_anulaciones;
             $row[] = $fila->confirmadas;
             $row[] = $fila->reasignadas;
             $row[] = $fila->n_erroneo;
             $row[] = $fila->observaciones;
             $row[] = $fila->usuario;
             $row[] = "<a class='btn btn-warning btn-xs' href='".base_url('registros/edit/otros-'.$fila->id)."'>Editar</a>";
 
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->otros->count_all($where),
                        "recordsFiltered" => $this->otros->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
            }
          }

     public function listar_cupos(){
         if($this->require_min_level(EJECUTIVE_LEVEL)){
          $inicio = '';
          $fin= '';
          $users = null;
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
                $users = ($this->input->post('userId') != null) ? $this->input->post('userId') : '';
                
               $this->load->model('datatables/cupos_model', 'cupos');

              }
      if($this->auth_level < ADMIN_LEVEL){
         $where = "id_usuario = ". $this->auth_user_id;
          if($inicio != '' and $fin != ''){
            $where .= " AND ((date(fecha_registro) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " AND ((date(fecha_registro) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " AND ((date(fecha_registro) <= '".$fin."')) ";
          }
          
      }else{
        $where = "";
        if($inicio != '' and $fin != ''){
            $where .= " ((date(fecha_registro) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " ((date(fecha_registro) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " ((date(fecha_registro) <= '".$fin."')) ";
          }
          
         if(is_array($users)){
              $in = '';
              foreach ($users as $id) {
                if($id != '')
                $in = $in .' '.$id.',';
              }
              $in = substr($in, 0, -1);

                         if($where != ''){
                         $where = $where. " AND user_id IN (".$in.")"; 
                       }else{
                       $where = $where. " user_id IN (".$in.")"; 
                       }
               }



      }
     
        $list = $this->cupos->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fila) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $fila->especialidad;
            $row[] = $fila->profesional;
            $row[] = $fila->fecha;
            $row[] = $fila->cupos;
            $row[] = $fila->observaciones;
            $row[] = $fila->fecha_registro;

             $row[] = "<a class='btn btn-warning btn-xs' href='".base_url('registros/edit/cupos-'.$fila->id)."'>Editar</a>";
 
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->cupos->count_all($where),
                        "recordsFiltered" => $this->cupos->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
            }
          }



    public function listar_sms(){
         if($this->require_min_level(EJECUTIVE_LEVEL)){
          $inicio = '';
          $fin= '';
          $users;
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
                  $users = ($this->input->post('userId') != null) ? $this->input->post('userId') : '';         
               $this->load->model('datatables/sms_model', 'sms');

              }
      if($this->auth_level < ADMIN_LEVEL){
         $where = "sender_id = ". $this->auth_user_id;
          if($inicio != '' and $fin != ''){
            $where .= " AND ((date(created_at) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " AND ((date(created_at) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " AND ((date(created_at) <= '".$fin."')) ";
          }
          
      }else{
        $where = "";
        if($inicio != '' and $fin != ''){
            $where .= " ((date(created_at) BETWEEN '".$inicio."' AND '".$fin."')) ";
          }elseif($inicio != ''){
            $where .= " ((date(created_at) >= '".$inicio."')) ";
          }elseif($fin != ''){
            $where .= " ((date(created_at) <= '".$fin."')) ";
          }

                   if(is_array($users)){
              $in = '';
              foreach ($users as $id) {
                if($id != '')
                $in = $in .' '.$id.',';
              }
              $in = substr($in, 0, -1);

                         if($where != ''){
                         $where = $where. " AND sender_id IN (".$in.")"; 
                       }else{
                       $where = $where. " sender_id IN (".$in.")"; 
                       }
               }
      }
     
        $list = $this->sms->get_datatables($where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fila) {
          //var_dump($tareas);
            $no++;
            $row = array();
            $row[] = $fila->especialidad;
            $row[] = $fila->profesional;
            $row[] = $fila->patient;
            $row[] = $fila->created_at;
            $row[] = $fila->number;
            $row[] = $fila->location;
            $row[] = $fila->date;
            $row[] = $fila->time;
            $row[] = $fila->enviado_por;
            $row[] = $fila->message;

 
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->sms->count_all($where),
                        "recordsFiltered" => $this->sms->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
            }
          }


      public function editarcita($id){
          if($this->require_min_level(EJECUTIVE_LEVEL)){
                $this->load->model('registros_model','registros');
                $this->load->model('global_model','global');
                $this->load->model('locations_model','lugares');

                $data = $this->registros->findSubTask($id);
                $profesional = $this->global->findProfesional($data->id_profesional);
                $estados = $this->global->getStates();
                $lugares = $this->lugares->getAll();
                $especialidades = $this->global->getEspecialidades();
                $profesionales = $this->global->getByEspecialidad($data->id_especialidad);
                $css = array( 'vendor/clockpicker/dist/bootstrap-clockpicker.css');
                $scripts = array(
                   'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                  'pages/registros/editar_llamada.js'
                         );
                $this->template->set('title', 'Editar llamada');
                $this->template->set('page_header', 'Mis registros | Editar registro');
                $this->template->set('css', $css);
                $this->template->set('scripts', $scripts);
                $this->template->load('default_layout', 'contents' , 'registros/cita_edit',
                  array(
                    'data'=> $data, 
                    'estados' => $estados,
                    'especialidades' => $especialidades,
                    'lugares' => $lugares,
                    'profesional'  => $profesional,
                    'profesionales' => $profesionales

                  ));
             }
      }


       public function llamadas(){
              if($this->require_min_level(EJECUTIVE_LEVEL)){
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
                       'pages/registros/llamadas.js'
                       );
              $this->template->set('title', 'LLamadas registrados');
              $this->template->set('page_header', 'Mis registros | LLAMADAS');
              $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('registros/').'"><i class="fa  fa-chevron-left"></i></a>');
              $this->template->set('css', $css);
              $this->template->set('scripts', $scripts);
              $this->template->load('default_layout', 'contents' , 'registros/llamados', null);
              }
    }


  public function updateCalls(){
     header('Content-Type: application/json');
    if($this->require_min_level(EJECUTIVE_LEVEL)){
      if($this->input->post()){
         $id_llamada = $this->input->post('id_llamada');
         $id= $this->input->post('id_llamada');
         $data = array(
                          'id_estado' => $this->input->post('id_estado'),
                          'actualizada' =>  date("Y-m-d H:i:s")
         );
         if($this->input->post('id_estado') == 3){
                  $data['otro'] = $this->input->post('otro');
                 }else{
                  $data['otro'] = null;
                 }
        $this->load->model('tasks/task_model','tareas');
        if($this->tareas->updateCall($id, $data)){
           if($data['id_estado'] == 4){

                $data = array(
                  'hora_cita' => $this->input->post('hora_cita'),
                  'fecha_cita' => $this->input->post('fecha_cita'),
                  'id_profesional' => $this->input->post('profesional'),
                  'id_especialidad' => $this->input->post('especialidad'),
                  'id_lugar' => $this->input->post('lugar'),
                  'observaciones' => $this->input->post('observaciones'),
                  'finalizada' => 1,
                  'actualizada' =>  date("Y-m-d H:i:s"),

                );
               

           }else{
                   $data = array(
                  'hora_cita' => null,
                  'fecha_cita' => null,
                  'id_profesional' => null,
                  'id_especialidad' => null,
                  'id_lugar' => null,
                  'observaciones' => null,
                  'finalizada' => null,
                  'actualizada' =>  date("Y-m-d H:i:s")

                );

                 

           
           }

            if($this->tareas->closeSubtask($id_llamada,$data) ) {
                echo json_encode(array('result' => true));
               }else{
                 echo json_encode(array('result' => false));
               }
          
        }else{
                echo json_encode(array('result' => false));
        }
      }
    }
  }


  public function updateRegistro(){
    if($this->require_min_level(EJECUTIVE_LEVEL)){

    }
  }


public function edit_agendamiento_ajax(){
  if($this->require_min_level(EJECUTIVE_LEVEL)){

      if($this->input->post()){
        header('Content-Type: application/json');
        $id = $this->input->post('id');
        $data = array(
          'id_medico' => $this->input->post('profesional'),
          'id_especialidad' => $this->input->post('especialidad'),
          'id_prestacion' => $this->input->post('prestacion'),
          'pacientes_agendados' => $this->input->post('p_agendados'),
          'no_contestaron' => $this->input->post('no_contestaron'),
          'rechazo_anulaciones' => $this->input->post('rechazos'),
          'hora_ya_asignada' => $this->input->post('ya_asignadas'),
          'n_erroneo' => $this->input->post('erroneo'),
          'actualizada' => date("Y-m-d H:i:s"),
          'observaciones' =>$this->input->post('observaciones')


       );


        $this->load->model('registros_model');
        if( $this->registros_model->updateAgendamiento($id,$data)){
            echo json_encode(true);
        }else{
          echo json_encode(false);
        }
      }
  }
}



public function editarRegistro(){
  header('Content-Type: application/json');
  if($this->require_min_level(EJECUTIVE_LEVEL)){
    if ($this->input->post()) {
            $data = array();
            $data['id_medico'] = $this->input->post('profesional');
            $data['id_especialidad'] = $this->input->post('especialidad');
            $data['id_prestacion'] = $this->input->post('prestacion');
            $data['no_contestaron'] = $this->input->post('no_contestaron');
            $data['rechazo_anulaciones'] = $this->input->post('rechazos');
            $data['n_erroneo'] = $this->input->post('erroneos');
            $data['actualizada'] =  date("Y-m-d H:i:s");
            $data['observaciones'] =$this->input->post('observaciones');
            $id = $this->input->post('registro_id');
            $tipo = $this->input->post('tipo');
            
            if($tipo == 'reasignaciones'){
              $data['sin_cupo'] =  $this->input->post('sin_cupo');
              $data['pacientes'] =  $this->input->post('pacientes');
              $data['hora_ya_asignada'] = $this->input->post('h_y_asignadas');
            }

            if($tipo == 'confirmaciones'){
              $data['pacientes'] =  $this->input->post('pacientes');
              $data['confirmadas'] =  $this->input->post('confirmadas');
              $data['reasignadas'] =  $this->input->post('reasignadas');
            }

            if($tipo == 'otros'){
              $data['pacientes'] =  $this->input->post('pacientes');
              $data['confirmadas'] =  $this->input->post('confirmadas');
              $data['reasignadas'] =  $this->input->post('reasignadas');
            }

               if($tipo == 'agendamientos'){
              $data['pacientes_agendados'] = $this->input->post('agendados');
              $data['hora_ya_asignada'] = $this->input->post('h_y_asignadas');
            }

            if($tipo == 'cupos'){
              $data = array();
              $data['id_especialidad'] = $this->input->post('especialidad');
              $data['id_profesional'] = $this->input->post('profesional');
              $data['cupos'] = $this->input->post('cupos');
              $data['fecha'] = datepicker_to_mysql($this->input->post('fecha'));
              $data['observaciones'] = $this->input->post('observaciones');
              $data['actualizada'] =  date("Y-m-d H:i:s");
            }




            $this->load->model('registros_model');
            if($this->registros_model->update($tipo,$id, $data)){

              echo json_encode(array('result' => true, 'message' => 'DATOS ACTUALIZADOS CORRECTAMENTE'));
            }else{
              echo json_encode(array('result' => false, 'message' => 'HUBO UN ERROR AL INTENTAR ACTUALIZAR LOS DATOS'));
            }
    }
  }
}
		
public function cupos(){
        if($this->require_min_level(EJECUTIVE_LEVEL)){
           $this->load->model('global_model');
           $users = $this->global_model->getAllUsers();
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
               'pages/registros/cupos.js'
               );
      $this->template->set('title', 'Cupos');
      $this->template->set('buttons', '<a class="btn btn-default" href="'.base_url('registros/').'"><i class="fa  fa-chevron-left"></i></a>');
      $this->template->set('page_header', 'Mis registros | Cupos');
      $this->template->set('css', $css);
      $this->template->set('scripts', $scripts);
      $this->template->load('default_layout', 'contents' , 'registros/cupos', array('users' => $users));
      }
}


}