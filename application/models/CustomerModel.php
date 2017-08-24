<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model {

    function getCustomer($limit = null, $offset = null,$conditions=null) {     
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        } else {
            $offset = 0;
        }
        
        if(empty($conditions)){
           $this->db->limit($limit, $offset); 
        }else{
           $this->db->limit($limit, 0); 
        }
        
        $query['result']=$this->db->get_where('customers', $conditions)->result_array();
        $query['count']= count($query['result']);
        
        return $query;
    }

    public function save($data) {
        $this->db->insert("customers", $data);
    }
}
