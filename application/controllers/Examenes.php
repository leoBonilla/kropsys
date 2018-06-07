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

class Examenes extends MY_Controller
{
   public function __construct()
	{
		parent::__construct();
		$this->load->database('kropsys_service');
		$this->load->model('examen_model', 'examen');
	}

	public function create_convenio_next_step(){
		if ($this->input->post()) {
		   $previsiones = $this->input->post('previsiones');
		   $nombre = $this->input->post('nombre');
		    
              
              $previsiones = $this->examen->getPrevIn($previsiones);
              $this->load->view('inmunomedica/mantenedor_convenio_first', array('prevs' =>$previsiones, 'nombre' => $nombre ));
		}
	}

	public function confirm_convenio(){
		if($this->input->post()){
			$data = $this->input->post();
			$nombre = $this->input->post('convenio');
			$x = array();
			$i = 0;
			foreach ($data['id'] as $value) {
				$x[$i]['id'] = $value;
				$x[$i]['digital'] = ($data['digital'][$i] == '1') ? 1 : 0;
				$x[$i]['rut'] = $data['rut'][$i];
				$x[$i]['observaciones'] = $data['observaciones'][$i];
				$i++;
			}

			$this->examen->crearConvenio($x,$nombre);
		}
	}

	public function searching(){
			header('Content-Type: application/json');
	        $keyword = strval($_POST['query']);
	        $this->db->select('*');
	        $this->db->from('kropsys_service.examenes');
	        $this->db->group_start();
	        $this->db->like('examen',$keyword);
	        $this->db->or_like('codigo',$keyword);
	        $this->db->or_like('tipo',$keyword);
	        $this->db->or_like('tipo_examen',$keyword);
	        $this->db->or_like('agenda',$keyword);
            $this->db->or_like('agenda',$keyword);
            $this->db->or_like('piso',$keyword);
            $this->db->or_like('lugar',$keyword);
            $this->db->group_end();

	        //$query = $this->db->get('kropsys_service.examenes');
	        $query = $this->db->get();
	        $resultado =  array();
	        if ($query->num_rows() > 0) {
			     foreach ($query->result() as $row) {
				     //$pacientes[] = $row->patient.'-'.$row->number;
				    $resultado[] = $row;
			     }
		     }
		     echo json_encode($resultado);
	        }

	public function loadresults(){
	
		    $keyword = strval($_POST['query']);
	        //$this->db->select('*');
	        //$this->db->from('kropsys_service.examenes');
           // $this->db->where('id', $keyword);
            $sql = "select e.*, i.archivo from kropsys_service.examenes e left join kropsys_service.instructivos i on e.instructivo = i.instructivo where e.id = ".$keyword;

	        //$query = $this->db->get('kropsys_service.examenes');
	        $query = $this->db->query($sql);
	        $resultado =  array();
	        $convenio = false;
	        if ($query->num_rows() > 0) {
			     $resultado = $query->row();
			     $id_convenio = NULL;
			     if(is_numeric(intval($resultado->id_convenio))){
			     	$id_convenio = $resultado->id_convenio;
			     }
			     $convenio = $this->examen->findConvenio($id_convenio);
			
		     }else{
		     	$resultado = false;
		     }


		    $this->load->view('inmunomedica/resultados',array('data' => $resultado, 'convenios' => $convenio ));
	        }
}