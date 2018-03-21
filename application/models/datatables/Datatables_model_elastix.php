<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Datatables_model_elastix extends CI_Model {


protected $table = '';
protected $column_order = array(); //set column field database for datatable orderable
protected $column_search = array(); //set column field database for datatable searchable 
protected $order = array('calldate' => 'desc'); // default order 
protected $cdr = false;
  
  public function __construct(){
    $this->cdr = $this->load->database('cdr', true);
  }
   

  private function _get_datatables_query($where = false) 
    {
         
        $this->cdr->from($this->table);
        if($where != false){
            $this->cdr->where($where);
           // echo $where;
        }
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->cdr->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->cdr->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->cdr->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->cdr->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->cdr->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->cdr->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($where = false)
    {
        $this->_get_datatables_query($where);
        if($_POST['length'] != -1)
        $this->cdr->limit($_POST['length'], $_POST['start']);
        $query = $this->cdr->get();
        return $query->result();
    }
 
    function count_filtered($where = false)
    {

          $this->_get_datatables_query($where);
        $query = $this->cdr->get();
        return $query->num_rows();
    }
 
    public function count_all($where = false)
    {
        $this->cdr->from($this->table);
        if($where != false){
            $this->cdr->where($where);
        }
        return $this->cdr->count_all_results();
    }

 

}
