<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inmuno_examenes_model extends Datatables_Model {


protected $table = 'kropsys_service.examenes';
protected $column_order = array('id','codigo','examen','preparacion','instructivo','muestra','plazo_entrega', 'tipo', 'indicaciones','observaciones','tipo_examen', 'valor_particular', 'valor_bono_fonasa', 'agenda', 'piso', 'lugar', 'telefono', 'id_convenio'); //set column field database for datatable orderable
protected $column_search = array('id','codigo','examen','preparacion','instructivo','muestra','plazo_entrega', 'tipo', 'indicaciones','observaciones','tipo_examen', 'valor_particular', 'valor_bono_fonasa', 'agenda', 'piso', 'lugar', 'telefono', 'id_convenio'); //set column field database for datatable searchable 
protected $order = array('id' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
