<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Llamadas_model extends Datatables_Model {


protected $table = 'llamadas_view';
protected $column_order = array('id_registro', 'nombre_tarea', 'problema_salud','fecha_tarea','hora_tarea', 'descripcion_tarea', 'tarea_cargada_por','fecha_llamada','id_tarea','id_subtarea', 'cargo_tarea', 'responsable','profesional','especialidad','lugar','observaciones_llamada', 'fecha_cita', 'hora_cita', 'call_unique_id', 'id_subtarea', 'nombre_paciente','rut_paciente','dv_paciente'); //set column field database for datatable orderable
protected $column_search =  array('id_registro', 'nombre_tarea', 'problema_salud','fecha_tarea','hora_tarea', 'descripcion_tarea', 'tarea_cargada_por','fecha_llamada','id_tarea','id_subtarea', 'cargo_tarea', 'responsable','profesional','especialidad','lugar','observaciones_llamada', 'fecha_cita', 'hora_cita', 'call_unique_id', 'id_subtarea', 'nombre_paciente','rut_paciente','dv_paciente'); //set column field database for datatable searchable 
protected $order = array('id_registro' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
