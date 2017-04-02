<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 18/12/2016
 * Time: 20:45
 */

class CartModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    // Updated the shopping cart
    function validate_item_qty($productID){

       // $productID = $data['productID'];


        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('productCode', $productID);

        $query = $this->db->get();
        return $query->result_array();
        }

    }

