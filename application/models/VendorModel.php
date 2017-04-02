<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 18/01/2017
 * Time: 14:28
 */
class VendorModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    public function getProductVendor($productVendor){

        $this->db->select('*');
        $this->db->from('products');
         $this->db->where('productVendor', $productVendor);
       // $this->db->like('productVendor', $productVendor);

        $query = $this->db->get();
        return $query->result_array();

    }

}