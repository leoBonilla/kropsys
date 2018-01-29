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
	
		    					 
		    					 'vendor/moments/moment.js',
		    					 'vendor/bootstrap-daterangepicker/daterangepicker.js',
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

			//datos de reasignaciones
			$re_no_contestaron = $this->reportes->fetchSumNoContestan('reasignaciones',$inicio, $fin);
			$re_rechazos_anulaciones = $this->reportes->fetchSumRechazosAnulaciones('reasignaciones',$inicio, $fin);
			$re_n_erroneo = $this->reportes->fetchSumErroneos('reasignaciones',$inicio, $fin);
			$re_horas_ya_asignadas = $this->reportes->fetchSumHorasYaAsignadas('reasignaciones',$inicio, $fin);
			$re_pacientes_agendados = $this->reportes->fetchSumPacientesAgendados('reasignaciones',$inicio, $fin);
			$re_sin_cupo = $this->reportes->fetchSumSinCupo('reasignaciones',$inicio, $fin);

			//datos de confirmaciones
			$conf_no_contestaron = $this->reportes->fetchSumNoContestan('confirmaciones',$inicio, $fin);
			$conf_rechazos_anulaciones = $this->reportes->fetchSumRechazosAnulaciones('confirmaciones',$inicio, $fin);
			$conf_n_erroneo = $this->reportes->fetchSumErroneos('confirmaciones',$inicio, $fin);
			$conf_horas_ya_asignadas = $this->reportes->fetchSumHorasYaAsignadas('confirmaciones',$inicio, $fin);
			$conf_confirmadas = $this->reportes->fetchSumConfirmadas('confirmaciones',$inicio, $fin);
			$conf_reasignadas = $this->reportes->fetchSumReasignadas('confirmaciones',$inicio, $fin);



			//datos de otros
			$otros_no_contestaron = $this->reportes->fetchSumNoContestan('otros',$inicio, $fin);
			$otros_rechazos_anulaciones = $this->reportes->fetchSumRechazosAnulaciones('otros',$inicio, $fin);
			$otros_n_erroneo = $this->reportes->fetchSumErroneos('otros',$inicio, $fin);
			$otros_horas_ya_asignadas = $this->reportes->fetchSumHorasYaAsignadas('otros',$inicio, $fin);
			$otros_confirmadas = $this->reportes->fetchSumConfirmadas('otros',$inicio, $fin);
			$otros_reasignadas = $this->reportes->fetchSumReasignadas('otros',$inicio, $fin);


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

			$this->load->view('reportes/load',array('ag_no_contestaron' => $ag_no_contestaron,
													'ag_rechazos_anulaciones' => $ag_rechazos_anulaciones,
													'ag_n_erroneos' => $ag_n_erroneo,
													'ag_horas_ya_asignadas' =>$ag_horas_ya_asignadas,
													'ag_pacientes_agendados' => $ag_pacientes_agendados,
													're_no_contestaron' => $re_no_contestaron,
													're_rechazos_anulaciones' => $re_rechazos_anulaciones,
													're_n_erroneos' => $re_n_erroneo,
													're_horas_ya_asignadas' =>$re_horas_ya_asignadas,
													're_pacientes_agendados' => $re_pacientes_agendados,
													're_sin_cupo' => $re_sin_cupo,
													'conf_no_contestaron' => $conf_no_contestaron,
													'conf_rechazos_anulaciones' => $conf_rechazos_anulaciones,
													'conf_n_erroneo' => $conf_n_erroneo,
													'conf_horas_ya_asignadas' => $conf_horas_ya_asignadas,
													'conf_confirmadas' => $conf_confirmadas,
													'conf_reasignadas' => $conf_reasignadas,
													'otros_no_contestaron' => $otros_no_contestaron,
													'otros_rechazos_anulaciones' => $otros_rechazos_anulaciones,
													'otros_n_erroneo' => $otros_n_erroneo,
													'otros_horas_ya_asignadas' => $otros_horas_ya_asignadas,
													'otros_confirmadas' => $otros_confirmadas,
													'otros_reasignadas' => $otros_reasignadas,
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
													'rea_por_profesional'  => $reasignacionesPorProfesional

		));
		
	}


	public function generateDoc(){
		if($this->input->post()){
			$inicio = $this->input->post('inicio');
			$fin = $this->input->post('fin');
		}

	}

	public function test(){
		$agend = array(
				'agendados' => 12,
				'no_contestaron' => 3,
				'sin_cupo' => 4,
				'erroneos' => 3,
				'rechazados' => 5,
				'hora_ya_asignada' => 8,
				'confirmados' => 0,
				'reasignados' => 0
			);
		$reasig = array(
				'agendados' => 12,
				'no_contestaron' => 3,
				'sin_cupo' => 4,
				'erroneos' => 3,
				'rechazados' => 5,
				'hora_ya_asignada' => 8,
				'confirmados' => 0,
				'reasignados' => 0
			);


		$t = new TemplateProcessor('templates/docx/informe_operacional.docx');
		$t->setValue('fecha', 'Diciembre 2017');

		//Agendamientos
		$t->setValue('agen-p-agendados', $agend['agendados']);
		$t->setValue('agen-no-contestaron', $agend['no_contestaron']);
		$t->setValue('agen-rechazados', $agend['rechazados']);
		$t->setValue('agen-sin-cupo', $agend['sin_cupo']);
		$t->setValue('agen-h-asignada', $agend['hora_ya_asignada']);
		$t->setValue('agen-erroneos',$agend['erroneos']);



		//reasignaciones


		$t->saveAs('result.docx');
	}

public function test2(){


}


	private function createDoc($data){



// New Word document
//echo date('H:i:s'), ' Create new PhpWord object', EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();


		$fecha_inicio = $data['fecha_inicio'];
		$fecha_fin = $data['fecha_fin'];

		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$img_path = base_url('assets/word');
		$mes = 'Diciembre';
		$ano = "2107";


		//agregando el header
		$section = $phpWord->addSection(array('marginTop' => 100));
		$header = $section->addHeader();
		$header->addImage($img_path.'/header_img_kropsys.png', array(
			'align' => 'right',
    	));

		$section->addText('Informe operación call center Hospital Clínico Metropolitano La Florida '. $mes. ' '.$ano , 
			array('name' => 'Arial Black', 
				'size' => 22,
				'color' => '#002060'
			));



		//agregar imagen de portada
		$section->addImage(
	    $img_path. '/img_portada.jpg',
	    array(
	        'width'         => 500,
	        'height'        => 400,
	        'marginTop'     => -1,
	        'marginLeft'    => -1,
	        'wrappingStyle' => 'behind'
	    	));

		//agregar tabla
        $section->addTextBreak(5);
        $table = $section->addTable(array('alignment' => 'right'));
		$table->addRow();
		$table->addCell()->addText('Sergio Ulloa Valdevenito', array('size' => 12, 'name' => 'Arial'));
		$table->addRow();
		$table->addCell()->addText('Gerente General', array('size' => 12, 'name' => 'Arial'));

       	//distribucion de llmados gestionados
       	//
         

         /* PACIENTES AGENDADOS */
         
        $categories = array('A', 'B', 'C', 'D', 'E');
        $series = array(1, 3, 2, 5, 4);
        $chart = $section->addChart('line', $categories, $series);


		$section->addTitle(ucfirst('Pacientes agendados'), 2);

		$section = $phpWord->addSection();
		$section->addImage(
			    'http://via.placeholder.com/350x350',
			    array(
			        'width'         => 100,
			        'height'        => 100,
			        'marginTop'     => -1,
			        'marginLeft'    => -1,
			        'wrappingStyle' => 'behind'
			    )
			);

         $section->addText('Durante el periodo comprendido entre '.$data['fecha_inicio'].' y '.$data['fecha_fin'].', se agendaron un total de '.$data['agend_agendados'].' pacientes, mientras que '.$data['agend_no_contestaron'].' pacientes no contestaron el llamado telefónico, pese a que a lo menos se realizaron 3 llamados a cada número disponible, '.$data['agend_r_anul'].' personas rechazaron o anularon su hora y '.$data['agend_ya_asig'].' personas señalaron que ya tenían  hora asignada. En el período hubo '.$data['agend_erroneos'].' números erróneos.');


		// Saving the document as OOXML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save('helloWorld.docx');

	}


}





/// subclase
/// 
class TemplateProcessor extends \PhpOffice\PhpWord\TemplateProcessor
{
    /**
     * Content of document rels (in XML format) of the temporary document.
     *
     * @var string
     */
    private $temporaryDocumentRels;

    public function __construct($documentTemplate)
    {
        parent::__construct($documentTemplate);
        $this->temporaryDocumentRels = $this->zipClass->getFromName('word/_rels/document.xml.rels');
    }

    /**
     * Set a new image
     *
     * @param string $search
     * @param string $replace
     */
    public function setImageValue($search, $replace){
        // Sanity check
        if (!file_exists($replace)) {
            throw new \Exception("Image not found at:'$replace'");
        }

        // Delete current image
        $this->zipClass->deleteName('word/media/' . $search);

        // Add a new one
        $this->zipClass->addFile($replace, 'word/media/' . $search);
    }

    /**
     * Search for the labeled image's rId
     *
     * @param string $search
     */
    public function seachImagerId($search){
        if (substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
            $search = '${' . $search . '}';
        }
        $tagPos = strpos($this->temporaryDocumentRels, $search);
        $rIdStart = strpos($this->temporaryDocumentRels, 'r:embed="',$tagPos)+9;
        $rId=strstr(substr($this->temporaryDocumentRels, $rIdStart),'"', true);
        return $rId;
    }

    /**
     * Get img filename with it's rId
     *
     * @param string $rId
     */
    public function getImgFileName($rId){
        $tagPos = strpos($this->temporaryDocumentRels, $rId);
        $fileNameStart = strpos($this->temporaryDocumentRels, 'Target="media/',$tagPos)+14;
        $fileName=strstr(substr($this->temporaryDocumentRels, $fileNameStart),'"', true);
        return $fileName;
    }

    public function setImageValueAlt($searchAlt, $replace)
    {
        $this->setImageValue($this->getImgFileName($this->seachImagerId($searchAlt)),$replace);
    }
}