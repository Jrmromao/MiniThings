<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 18/01/2017
 * Time: 11:24
 */
class Add_ItemModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function addProduct($data)
    {
        $this->db->insert('products', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else
            return false;

    }


}