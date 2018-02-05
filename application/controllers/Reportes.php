<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpWord\Shared\Converter;

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

class Reportes extends My_Controller
{

	public function __construct()
	{
		parent::__construct();
        
	}

	public function index(){
	 $this->informe_de_operaciones();
	}


	public function informe_de_operaciones(){
			if($this->require_min_level(ADMIN_LEVEL)){
				 $css =  array(
       					'custom.css'

       				);

			             $css =  array(
       					'custom.css',
       					'vendor/bootstrap-daterangepicker/daterangepicker.css'

       				);

		             $scripts = array( 
	
    	    					 'vendor/jsdocx/dist/vendor/FileSaver.js',
		    					 'vendor/jsdocx/dist/html-docx.js',
		    					 'pages/reportes/index.js'
		    					 );
					$this->template->set('title', 'Informe de Operaciones');
					$this->template->set('page_header', 'Informe de Operaciones');
					$this->template->set('css', $css);
					$this->template->set('scripts', $scripts);
					$this->template->load('default_layout', 'contents' , 'reportes/informe_de_operaciones', null);
					}
	}

	public function load(){
		
			$inicio = datepicker_to_mysql($this->input->post('inicio'));
			$fin = datepicker_to_mysql($this->input->post('fin'));
			$this->load->model('reportes/reportes_model', 'reportes');

			//datos de agendamientos
			$ag_no_contestaron = $this->reportes->fetchSumNoContestan('agendamientos',$inicio, $fin);
			$ag_rechazos_anulaciones = $this->reportes->fetchSumRechazosAnulaciones('agendamientos',$inicio, $fin);
			$ag_n_erroneo = $this->reportes->fetchSumErroneos('agendamientos',$inicio, $fin);
			$ag_horas_ya_asignadas = $this->reportes->fetchSumHorasYaAsignadas('agendamientos',$inicio, $fin);
			$ag_pacientes_agendados = $this->reportes->fetchSumPacientesAgendados('agendamientos',$inicio, $fin);

			//segunda instancia

					$ag_no_contestaron_2 = $this->reportes->fetchSumNoContestan('agendamientos',$inicio, $fin, 2);
					$ag_rechazos_anulaciones_2 = $this->reportes->fetchSumRechazosAnulaciones('agendamientos',$inicio, $fin, 2);
					$ag_n_erroneo_2 = $this->reportes->fetchSumErroneos('agendamientos',$inicio, $fin, 2);
					$ag_horas_ya_asignadas_2 = $this->reportes->fetchSumHorasYaAsignadas('agendamientos',$inicio, $fin, 2);
					$ag_pacientes_agendados_2 = $this->reportes->fetchSumPacientesAgendados('agendamientos',$inicio, $fin, 2);

			//tercera instancia

					$ag_no_contestaron_3 = $this->reportes->fetchSumNoContestan('agendamientos',$inicio, $fin, 3);
					$ag_rechazos_anulaciones_3 = $this->reportes->fetchSumRechazosAnulaciones('agendamientos',$inicio, $fin, 3);
					$ag_n_erroneo_3 = $this->reportes->fetchSumErroneos('agendamientos',$inicio, $fin, 3);
					$ag_horas_ya_asignadas_3 = $this->reportes->fetchSumHorasYaAsignadas('agendamientos',$inicio, $fin, 3);
					$ag_pacientes_agendados_3 = $this->reportes->fetchSumPacientesAgendados('agendamientos',$inicio, $fin, 3);

			//datos de reasignaciones
			$re_no_contestaron = $this->reportes->fetchSumNoContestan('reasignaciones',$inicio, $fin);
			$re_rechazos_anulaciones = $this->reportes->fetchSumRechazosAnulaciones('reasignaciones',$inicio, $fin);
			$re_n_erroneo = $this->reportes->fetchSumErroneos('reasignaciones',$inicio, $fin);
			$re_horas_ya_asignadas = $this->reportes->fetchSumHorasYaAsignadas('reasignaciones',$inicio, $fin);
			$re_pacientes_agendados = $this->reportes->fetchSumPacientesAgendados('reasignaciones',$inicio, $fin);
			$re_sin_cupo = $this->reportes->fetchSumSinCupo('reasignaciones',$inicio, $fin);

		             //segunda instancia
					$re_no_contestaron_2 = $this->reportes->fetchSumNoContestan('reasignaciones',$inicio, $fin,2);
					$re_rechazos_anulaciones_2 = $this->reportes->fetchSumRechazosAnulaciones('reasignaciones',$inicio, $fin,2);
					$re_n_erroneo_2 = $this->reportes->fetchSumErroneos('reasignaciones',$inicio, $fin,2);
					$re_horas_ya_asignadas_2 = $this->reportes->fetchSumHorasYaAsignadas('reasignaciones',$inicio, $fin,2);
					$re_pacientes_agendados_2 = $this->reportes->fetchSumPacientesAgendados('reasignaciones',$inicio, $fin,2);
					$re_sin_cupo_2 = $this->reportes->fetchSumSinCupo('reasignaciones',$inicio, $fin,2);

					//tercera instancia

					$re_no_contestaron_3 = $this->reportes->fetchSumNoContestan('reasignaciones',$inicio, $fin,3);
					$re_rechazos_anulaciones_3 = $this->reportes->fetchSumRechazosAnulaciones('reasignaciones',$inicio, $fin,3);
					$re_n_erroneo_3 = $this->reportes->fetchSumErroneos('reasignaciones',$inicio, $fin,3);
					$re_horas_ya_asignadas_3 = $this->reportes->fetchSumHorasYaAsignadas('reasignaciones',$inicio, $fin,3);
					$re_pacientes_agendados_3 = $this->reportes->fetchSumPacientesAgendados('reasignaciones',$inicio, $fin,3);
					$re_sin_cupo_3 = $this->reportes->fetchSumSinCupo('reasignaciones',$inicio, $fin,3);

			//datos de confirmaciones
			$conf_no_contestaron = $this->reportes->fetchSumNoContestan('confirmaciones',$inicio, $fin);
			$conf_rechazos_anulaciones = $this->reportes->fetchSumRechazosAnulaciones('confirmaciones',$inicio, $fin);
			$conf_n_erroneo = $this->reportes->fetchSumErroneos('confirmaciones',$inicio, $fin);
			$conf_horas_ya_asignadas = $this->reportes->fetchSumHorasYaAsignadas('confirmaciones',$inicio, $fin);
			$conf_confirmadas = $this->reportes->fetchSumConfirmadas('confirmaciones',$inicio, $fin);
			$conf_reasignadas = $this->reportes->fetchSumReasignadas('confirmaciones',$inicio, $fin);

					//segunda instancia
					$conf_no_contestaron_2 = $this->reportes->fetchSumNoContestan('confirmaciones',$inicio, $fin, 2);
					$conf_rechazos_anulaciones_2 = $this->reportes->fetchSumRechazosAnulaciones('confirmaciones',$inicio, $fin, 2);
					$conf_n_erroneo_2 = $this->reportes->fetchSumErroneos('confirmaciones',$inicio, $fin, 2);
					$conf_horas_ya_asignadas_2 = $this->reportes->fetchSumHorasYaAsignadas('confirmaciones',$inicio, $fin, 2);
					$conf_confirmadas_2 = $this->reportes->fetchSumConfirmadas('confirmaciones',$inicio, $fin, 2);
					$conf_reasignadas_2 = $this->reportes->fetchSumReasignadas('confirmaciones',$inicio, $fin, 2);

					//tercera instancia
					$conf_no_contestaron_3 = $this->reportes->fetchSumNoContestan('confirmaciones',$inicio, $fin, 3);
					$conf_rechazos_anulaciones_3 = $this->reportes->fetchSumRechazosAnulaciones('confirmaciones',$inicio, $fin, 3);
					$conf_n_erroneo_3 = $this->reportes->fetchSumErroneos('confirmaciones',$inicio, $fin, 3);
					$conf_horas_ya_asignadas_3 = $this->reportes->fetchSumHorasYaAsignadas('confirmaciones',$inicio, $fin, 3);
					$conf_confirmadas_3 = $this->reportes->fetchSumConfirmadas('confirmaciones',$inicio, $fin, 3);
					$conf_reasignadas_3 = $this->reportes->fetchSumReasignadas('confirmaciones',$inicio, $fin, 3);




			//datos de otros
			$otros_no_contestaron = $this->reportes->fetchSumNoContestan('otros',$inicio, $fin);
			$otros_rechazos_anulaciones = $this->reportes->fetchSumRechazosAnulaciones('otros',$inicio, $fin);
			$otros_n_erroneo = $this->reportes->fetchSumErroneos('otros',$inicio, $fin);
			$otros_horas_ya_asignadas = $this->reportes->fetchSumHorasYaAsignadas('otros',$inicio, $fin);
			$otros_confirmadas = $this->reportes->fetchSumConfirmadas('otros',$inicio, $fin);
			$otros_reasignadas = $this->reportes->fetchSumReasignadas('otros',$inicio, $fin);

					//segunda instancia
					$otros_no_contestaron_2 = $this->reportes->fetchSumNoContestan('otros',$inicio, $fin, 2);
					$otros_rechazos_anulaciones_2 = $this->reportes->fetchSumRechazosAnulaciones('otros',$inicio, $fin, 2);
					$otros_n_erroneo_2 = $this->reportes->fetchSumErroneos('otros',$inicio, $fin, 2);
					$otros_horas_ya_asignadas_2 = $this->reportes->fetchSumHorasYaAsignadas('otros',$inicio, $fin, 2);
					$otros_confirmadas_2 = $this->reportes->fetchSumConfirmadas('otros',$inicio, $fin, 2);
					$otros_reasignadas_2 = $this->reportes->fetchSumReasignadas('otros',$inicio, $fin, 2);

					//tercera instancia
					$otros_no_contestaron_3 = $this->reportes->fetchSumNoContestan('otros',$inicio, $fin,3);
					$otros_rechazos_anulaciones_3 = $this->reportes->fetchSumRechazosAnulaciones('otros',$inicio, $fin,3);
					$otros_n_erroneo_3 = $this->reportes->fetchSumErroneos('otros',$inicio, $fin,3);
					$otros_horas_ya_asignadas_3 = $this->reportes->fetchSumHorasYaAsignadas('otros',$inicio, $fin,3);
					$otros_confirmadas_3 = $this->reportes->fetchSumConfirmadas('otros',$inicio, $fin,3);
					$otros_reasignadas_3 = $this->reportes->fetchSumReasignadas('otros',$inicio, $fin,3);


			//distribucion de reasignaciones
			$dist_reasignaciones = $this->reportes->fetchByDistribucion('reasignaciones',$inicio,$fin);
		 	$dist_agendamientos = $this->reportes->fetchByDistribucion('agendamientos',$inicio,$fin);


			$dist_reasignaciones_bar = $this->reportes->fetchReasignacionesDistribucion($inicio,$fin);
			$dist_confirmaciones_bar = $this->reportes->fetchConfirmacionesDistribucion($inicio,$fin);
			$dist_agendamientos_bar = $this->reportes->fetchAgendamientosDistribucion($inicio,$fin);
			$dist_otros_bar = $this->reportes->fetchOtrosDistribucion($inicio,$fin);
			$top_p_rea =$this->reportes->topProfesionales('reasignaciones_view',$inicio,$fin);
			$top_p_conf =$this->reportes->topProfesionales('confirmaciones_view',$inicio,$fin);
			$top_p_ag =$this->reportes->topProfesionales('agendamientos_view',$inicio,$fin);
			$top_p_otros =$this->reportes->topProfesionales('otros_view',$inicio,$fin);
			$reasignacionesPorProfesional = $this->reportes->reasignacionesPorProfesional($inicio,$fin);


			$rea_por_especialidad = $this->reportes->reasignacionPorEspecialidad($inicio,$fin);

			$fecha = "" .$this->input->post('inicio') . " - " . $this->input->post('fin');

			$this->load->view('reportes/load',array('ag_no_contestaron' => $ag_no_contestaron,
													'ag_rechazos_anulaciones' => $ag_rechazos_anulaciones,
													'ag_n_erroneos' => $ag_n_erroneo,
													'ag_horas_ya_asignadas' =>$ag_horas_ya_asignadas,
													'ag_pacientes_agendados' => $ag_pacientes_agendados,
													//segunda instancia
													'ag_no_contestaron_2' => $ag_no_contestaron_2,
													'ag_rechazos_anulaciones_2' => $ag_rechazos_anulaciones_2,
													'ag_n_erroneos_2' => $ag_n_erroneo_2,
													'ag_horas_ya_asignadas_2' =>$ag_horas_ya_asignadas_2,
													'ag_pacientes_agendados_2' => $ag_pacientes_agendados_2,
													//tercera instancia
													'ag_no_contestaron_3' => $ag_no_contestaron_3,
													'ag_rechazos_anulaciones_3' => $ag_rechazos_anulaciones_3,
													'ag_n_erroneos_3' => $ag_n_erroneo_3,
													'ag_horas_ya_asignadas_3' =>$ag_horas_ya_asignadas_3,
													'ag_pacientes_agendados_3' => $ag_pacientes_agendados_3,


													're_no_contestaron' => $re_no_contestaron,
													're_rechazos_anulaciones' => $re_rechazos_anulaciones,
													're_n_erroneos' => $re_n_erroneo,
													're_horas_ya_asignadas' =>$re_horas_ya_asignadas,
													're_pacientes_agendados' => $re_pacientes_agendados,
													're_sin_cupo' => $re_sin_cupo,

													're_no_contestaron_2' => $re_no_contestaron_2,
													're_rechazos_anulaciones_2' => $re_rechazos_anulaciones_2,
													're_n_erroneos_2' => $re_n_erroneo_2,
													're_horas_ya_asignadas_2' =>$re_horas_ya_asignadas_2,
													're_pacientes_agendados_2' => $re_pacientes_agendados_2,
													're_sin_cupo_2' => $re_sin_cupo_2,


													're_no_contestaron_3' => $re_no_contestaron_3,
													're_rechazos_anulaciones_3' => $re_rechazos_anulaciones_3,
													're_n_erroneos_3' => $re_n_erroneo_3,
													're_horas_ya_asignadas_3' =>$re_horas_ya_asignadas_3,
													're_pacientes_agendados_3' => $re_pacientes_agendados_3,
													're_sin_cupo_3' => $re_sin_cupo_3,

													'conf_no_contestaron' => $conf_no_contestaron,
													'conf_rechazos_anulaciones' => $conf_rechazos_anulaciones,
													'conf_n_erroneo' => $conf_n_erroneo,
													'conf_horas_ya_asignadas' => $conf_horas_ya_asignadas,
													'conf_confirmadas' => $conf_confirmadas,
													'conf_reasignadas' => $conf_reasignadas,

													'conf_no_contestaron_2' => $conf_no_contestaron_2,
													'conf_rechazos_anulaciones_2' => $conf_rechazos_anulaciones_2,
													'conf_n_erroneo_2' => $conf_n_erroneo_2,
													'conf_horas_ya_asignadas_2' => $conf_horas_ya_asignadas_2,
													'conf_confirmadas_2' => $conf_confirmadas_2,
													'conf_reasignadas_2' => $conf_reasignadas_2,

													'conf_no_contestaron_3' => $conf_no_contestaron_3,
													'conf_rechazos_anulaciones_3' => $conf_rechazos_anulaciones_3,
													'conf_n_erroneo_3' => $conf_n_erroneo_3,
													'conf_horas_ya_asignadas_3' => $conf_horas_ya_asignadas_3,
													'conf_confirmadas_3' => $conf_confirmadas_3,
													'conf_reasignadas_3' => $conf_reasignadas_3,



													'otros_no_contestaron' => $otros_no_contestaron,
													'otros_rechazos_anulaciones' => $otros_rechazos_anulaciones,
													'otros_n_erroneo' => $otros_n_erroneo,
													'otros_horas_ya_asignadas' => $otros_horas_ya_asignadas,
													'otros_confirmadas' => $otros_confirmadas,
													'otros_reasignadas' => $otros_reasignadas,

													'otros_no_contestaron_2' => $otros_no_contestaron_2,
													'otros_rechazos_anulaciones_2' => $otros_rechazos_anulaciones_2,
													'otros_n_erroneo_2' => $otros_n_erroneo_2,
													'otros_horas_ya_asignadas_2' => $otros_horas_ya_asignadas_2,
													'otros_confirmadas_2' => $otros_confirmadas_2,
													'otros_reasignadas_2' => $otros_reasignadas_2,

													'otros_no_contestaron_3' => $otros_no_contestaron_3,
													'otros_rechazos_anulaciones_3' => $otros_rechazos_anulaciones_3,
													'otros_n_erroneo_3' => $otros_n_erroneo_3,
													'otros_horas_ya_asignadas_3' => $otros_horas_ya_asignadas_3,
													'otros_confirmadas_3' => $otros_confirmadas_3,
													'otros_reasignadas_3' => $otros_reasignadas_3,




													'dist_reasignaciones' => $dist_reasignaciones,
													'dist_agendamientos' => $dist_agendamientos,
													'dist_reasignaciones_bar' => $dist_reasignaciones_bar,
													'dist_confirmaciones_bar' => $dist_confirmaciones_bar,
													'dist_agendamientos_bar' => $dist_agendamientos_bar,
													'dist_otros_bar' => $dist_otros_bar,
													'top_p_rea' => $top_p_rea,
													'top_p_ag' => $top_p_ag,
													'top_p_conf' => $top_p_conf,
													'top_p_otros' => $top_p_otros,
													'rea_por_especialidad' => $rea_por_especialidad,
													'rea_por_profesional'  => $reasignacionesPorProfesional,
													'periodo' => $fecha


		));
		
	}



	public function sms(){
		if($this->require_min_level(ADMIN_LEVEL)){
			 $css =  array(
       					'custom.css'

       				);

			             $css =  array(
       					'custom.css',
       					'vendor/bootstrap-daterangepicker/daterangepicker.css'

       				);

		             $scripts = array( 
	
		    					 
		    					 'vendor/moments/moment.js',
		    					 'vendor/bootstrap-daterangepicker/daterangepicker.js',
		    					 //'vendor/jsdocx/dist/vendor/FileSaver.js',
		    					 //'vendor/jsdocx/dist/html-docx.js',
		    					 'pages/reportes/sms.js'
		    					 );
					$this->template->set('title', 'Reporte de sms ');
					$this->template->set('page_header', 'Reporte de sms');
					$this->template->set('css', $css);
					$this->template->set('scripts', $scripts);
					$this->template->load('default_layout', 'contents' , 'reportes/sms', null);
					}

	}






}