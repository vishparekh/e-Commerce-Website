<?php
class Products_model extends CI_Model
{
    function get_all()
    {
        $results = $this->db->get('products')->result();

        return $results; 
    }
    function get($id)
    {
        $this->db->get_where('products',array('product_id' => $id))->result();
        $result = $results[0];
        return $result;
    }
    
}