<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 30/12/2016
 * Time: 21:14
 */
class ProductVendorModel
{

    public function __construct()
    {
        $this->load->database();
    }


    public function getAllProductVendor()
    {
        $sql = "SELECT DISTINCT productVendor FROM products";
        $query = $this->db->query($sql);
        return $query->result_array();
    }



}



