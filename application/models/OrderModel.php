<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 26/01/2017
 * Time: 21:45
 */
class OrderModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }



    public function getOrder($data){


        $this->db->select('*');
        $this->db->from('orderDetails');
        $this->db->join('products', 'products.productCode = orderDetails.productCode');
        $this->db->where('orderNumber', $data['orderNumber']);
        $query = $this->db->get();


        return $query->result_array();

    }




}