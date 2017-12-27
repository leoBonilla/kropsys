<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sms_model extends Datatables_Model {


protected $table = 'sms_view';
protected $column_order = array('history_log_id','number','doctor','location','time','date','enviado_por','patient','especialidad'); //set column field database for datatable orderable
protected $column_search = array('history_log_id','number','doctor','location','time','date','enviado_por','patient','especialidad'); //set column field database for datatable searchable 
protected $order = array('history_log_id' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
