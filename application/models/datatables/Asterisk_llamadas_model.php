<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Asterisk_llamadas_model extends Datatables_Model_Elastix {


protected $table = 'cdr';
protected $column_order = array('calldate', 'dst', 'duration','uniqueid','recordingfile','disposition', 'src' ); //set column field database for datatable orderable
protected $column_search =  array('calldate', 'dst', 'duration','uniqueid','recordingfile','disposition', 'src' ); //set column field database for datatable searchable 
protected $order = array('calldate' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
