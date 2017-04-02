<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 09/12/2016
 * Time: 11:13
 */
class LoginModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function login($email, $password)
    {
        $this->db->select('customerName, customerNumber, email, password');
        $this->db->from('customers');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();


        if ($query->num_rows() == 1)
            return $query->result_array();

        else
            return false;
    }



    public function User_login($email, $password)
    {
        $this->db->select('username, name, email, password, user_cat, userID, Vendor_Representative');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password',$password);
        $this->db->limit(1);
        $query = $this->db->get();


        if ($query->num_rows() == 1)
            return $query->result_array();

        else
            return false;
    }




}