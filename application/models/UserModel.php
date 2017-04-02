<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 17/01/2017
 * Time: 16:53
 */
class UserModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    public function getUser($userID){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userID', $userID);
        $query = $this->db->get();

  return $query->result_array();
    }


    public function getAllCustumers(){

        $this->db->select('*');
        $this->db->from('customers');
        $this->db->order_by("creditLimit", "desc");
        $query = $this->db->get();


        return $query->result_array();
    }



    public function getAllCustumersLimit15(){

        $this->db->select('*');
        $this->db->from('customers');
        $this->db->order_by("creditLimit", "asc");
        $this->db->limit(15);
        $query = $this->db->get();


        return $query->result_array();
    }


    public function getVisitors(){
        $this->db->select('*');
        $this->db->from('sessions');
        $query = $this->db->get();
        return $query->result_array();

}

public function updateCredit($data){



    $customerNumber  = $data['customerNumber'];
    $creditLimit     = $data['creditLimit'];

    $this->db->set('creditLimit', $creditLimit, FALSE);
    $this->db->where('customerNumber', $customerNumber);
    $this->db->update('customers'); // gives UPDATE mytable SET field = field+1 WHERE id = 2

    return true;
}


}