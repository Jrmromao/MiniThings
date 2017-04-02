<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 12/12/2016
 * Time: 23:19
 */
class RegisterModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function register($data)
    {

        $this->db->insert('customers', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else
            return false;

    }

}