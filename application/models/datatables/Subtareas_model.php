<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Subtareas_model extends Datatables_Model {


protected $table = 'subtareas_view';
protected $column_order = array('filename','fecha','id','problema_salud','rut_completo','nombre','fecha_inicio','fecha_limite','dias_restantes','especialidad_agenda','indicacion_agenda_ges','llamado_1','llamado_2','llamado_3', 'llamado_4', 'llamado_5','estado_cita', 'fecha_cita','observaciones','id_responsable', 'responsable','tarea_creada_por'); //set column field database for datatable orderable
protected $column_search =  array('filename','fecha','id','problema_salud','rut_completo','nombre','fecha_inicio','fecha_limite','dias_restantes','especialidad_agenda','indicacion_agenda_ges','llamado_1','llamado_2','llamado_3', 'llamado_4', 'llamado_5','estado_cita', 'fecha_cita','observaciones','id_responsable', 'responsable','tarea_creada_por'); //set column field database for datatable searchable 
protected $order = array('id' => 'asc'); // default order 


public function __construct(){
    parent::__construct();
}

}
